<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class FileController extends Controller
{
     /**
     * Init view.
     */
    public function index()
    {
        return view('main.testgambar');
    }
  
    /**
     * Image resize
     */
    public function updateProfile(Request $request, User $user)
    {

        // jadi untuk gambar gif ini hanya bisa diupload oleh user yg sudah mengaktifkan special_feature
        if($user->special_feature === 1){
            $rules = [
                'name' => 'required|max:255',
                'facebook' => 'required|max:255',
                'discord' => 'required|max:255',
                'instagram' => 'required|max:255',
                'tiktok' => 'required|max:255',
                'PPuser' => 'image|mimes:jpg,jpeg,png,svg,webp,gif|max:5124',
                'BgPPuser' => 'image|mimes:jpg,jpeg,png,svg,webp,gif|max:5124',
            ];
        }else {
            $rules = [
                'name' => 'required|max:255',
                'PPuser' => 'image|mimes:jpg,jpeg,png,svg,webp|max:5124',
                'BgPPuser' => 'image|mimes:jpg,jpeg,png,svg,webp|max:5124',
            ];
        }

        $validatedData = $request->validate($rules);

        // kalau ada gambar
        if($request->file('PPuser')){
            $image = $request->file('PPuser');
            // ngambil nama dari gambar yg dikirim user, terus di tambahin username usernya supaya gk ketuker gambar user A dengan user B
            $filenameWithExt = str_replace(' ', '', $request->file('PPuser')->getClientOriginalName());

            if($image->extension() !== 'gif'){
                $input['imagename'] = pathinfo($filenameWithExt, PATHINFO_FILENAME).auth()->user()->username.'.'.$image->extension();
            }else{
                $input['imagename'] = auth()->user()->username.$filenameWithExt;
            }
            
            // kalau gambarnya gif, jalankan code ini
            if($image->extension() === 'gif'){
                $filePath = public_path('/thumbnails');
                $image->move($filePath, $input['imagename']);

            }else{ // kalau gambarnya bukan gif, jalankan code ini
                $filePath = public_path('/thumbnails');
                $img = Image::make($image->path());
                $img->resize(250, 250, function ($const) {
                    $const->aspectRatio();
                })->save($filePath.'/'.$input['imagename']);   
            }
            

            // kalau user ngupload gambar baru, jalankan code ini, dan hapus gambar lama
            // ini error, fix nanti dirumah // solved
            if($user->PPuser !== 'user.png'){
                if($user->PPuser !== $input['imagename']){
                    File::delete('thumbnails/'.$user->PPuser);
                }
                if($user->PPuser !== $user->username.$input['imagename']){
                    File::delete('thumbnails/'.$user->username.$user->PPuser);
                }
            }
            
            // $validatedData['PPuser'] = pathinfo($filenameWithExt, PATHINFO_FILENAME).auth()->user()->username.'.'.$image->extension();
            $gif = substr($filenameWithExt, strrpos($filenameWithExt, '.') + 1);
            if($gif === "gif"){ // ini error // solved
                $validatedData['PPuser'] = str_replace(' ', '', $request->file('PPuser')->getClientOriginalName());
            }else{
                $validatedData['PPuser'] = str_replace(' ', '', pathinfo($filenameWithExt, PATHINFO_FILENAME)).auth()->user()->username.'.'.$image->extension();
            }
        }

        if($request->file('BgPPuser')){
            $image = $request->file('BgPPuser');
            // ngambil nama dari gambar yg dikirim user, terus di tambahin username usernya supaya gk ketuker gambar user A dengan user B
            $filenameWithExt = str_replace(' ', '', $request->file('BgPPuser')->getClientOriginalName());

            if($image->extension() !== 'gif'){
                $input['imagename'] = pathinfo($filenameWithExt, PATHINFO_FILENAME).auth()->user()->username.'.'.$image->extension();
            }else{
                $input['imagename'] = auth()->user()->username.$filenameWithExt;
            }
            
            // kalau gambarnya gif, jalankan code ini
            if($image->extension() === 'gif'){
                $filePath = public_path('/images');
                $image->move($filePath, $input['imagename']);

            }else{ // kalau gambarnya bukan gif, jalankan code ini
                $filePath = public_path('/images');
                $img = Image::make($image->path());
                $img->resize(500, 500, function ($const) {
                    $const->aspectRatio();
                })->save($filePath.'/'.$input['imagename']);   
            }
            

            // kalau user ngupload gambar baru, jalankan code ini, dan hapus gambar lama
            // ini error, fix nanti dirumah // solved
            if($user->BgPPuser !== 'bguser.jpg'){
                if($user->BgPPuser !== $input['imagename']){
                    File::delete('images/'.$user->BgPPuser);
                }
                if($user->BgPPuser !== $user->username.$input['imagename']){
                    File::delete('images/'.$user->username.$user->BgPPuser);
                }
            }
            
            // $validatedData['BgPPuser'] = pathinfo($filenameWithExt, PATHINFO_FILENAME).auth()->user()->username.'.'.$image->extension();
            $gif = substr($filenameWithExt, strrpos($filenameWithExt, '.') + 1);
            if($gif === "gif"){ // ini error // solved
                $validatedData['BgPPuser'] = str_replace(' ', '', $request->file('BgPPuser')->getClientOriginalName());
            }else{
                $validatedData['BgPPuser'] = str_replace(' ','', pathinfo($filenameWithExt, PATHINFO_FILENAME)).auth()->user()->username.'.'.$image->extension();
            }
        }

        $dataName = $request->get('name') === $user->name;
        $dataIG = $request->get('instagram') === $user->instagram;
        $dataFB = $request->get('facebook') === $user->facebook;
        $dataDC = $request->get('discord') === $user->discord;
        $dataTT = $request->get('tiktok') === $user->tiktok;
        $dataPPuser = true; // kalau gk ada upload image
        $dataBgPPuser = true; // kalau gk ada upload image
        if($request->file('PPuser')){
            $dataPPuser = $request->file('PPuser')->getClientOriginalName() === $user->PPuser;
        }
        if($request->file('BgPPuser')){
            $dataBgPPuser = $request->file('BgPPuser')->getClientOriginalName() === $user->PPuser;
        }
        // kalau ganti gambar, yg keluar malah "tidak ada yg diubah" -> solving nanti // fixed
        if($dataName && $dataDC && $dataFB && $dataIG && $dataTT && $dataPPuser && $dataBgPPuser){
            Alert::toast('Tidak ada yg di ubah!', 'warning');
        }else{
            Alert::toast('Berhasil di ubah', 'success');
        }

        User::where('username', $user->username)->update($validatedData);

        // return back()
        //     ->with('success','<b>Berhasil</b> Update Data!')
        //     ->with('fileName',$input['imagename']);

        // return redirect('/editp/'.$user->username)->with('success','<b>Berhasil</b> Update Data!');
        return back();
    }
}
