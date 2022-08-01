<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

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
                'PPuser' => 'image|mimes:jpg,jpeg,png,svg,webp|max:5124',
                'BgPPuser' => 'image|mimes:jpg,jpeg,png,svg,webp|max:5124',
            ];
        }else {
            $rules = [
                'name' => 'required|max:255',
                'PPuser' => 'image|mimes:jpg,jpeg,png,svg,webp|max:5124',
            ];
        }

        $validatedData = $request->validate($rules);

        // kalau ada gambar
        if($request->file('PPuser')){
            $image = $request->file('PPuser');
            // ngambil nama dari gambar yg dikirim user, terus di tambahin username usernya supaya gk ketuker gambar user A dengan user B
            $filenameWithExt = $request->file('PPuser')->getClientOriginalName();
            $input['imagename'] = pathinfo($filenameWithExt, PATHINFO_FILENAME).auth()->user()->username.'.'.$image->extension();
            
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
            if($user->PPuser !== $input['imagename']){
                File::delete('thumbnails/'.$user->PPuser);
            }
            
            $validatedData['PPuser'] = pathinfo($filenameWithExt, PATHINFO_FILENAME).auth()->user()->username.'.'.$image->extension();
        }

        // kalau ada gambar
        if($request->file('BgPPuser')){
            $image = $request->file('BgPPuser');
            // ngambil nama dari gambar yg dikirim user, terus di tambahin username usernya supaya gk ketuker gambar user A dengan user B
            $filenameWithExt = $request->file('BgPPuser')->getClientOriginalName();
            $input['imagename'] = pathinfo($filenameWithExt, PATHINFO_FILENAME).auth()->user()->username.'.'.$image->extension();
            
            // kalau gambarnya gif, jalankan code ini
            if($image->extension() === 'gif'){
                $filePath = public_path('/thumbnails');
                $image->move($filePath, $input['imagename']);

            }else{ // kalau gambarnya bukan gif, jalankan code ini
                $filePath = public_path('/thumbnails');
                $img = Image::make($image->path());
                $img->resize(500, 500, function ($const) {
                    $const->aspectRatio();
                })->save($filePath.'/'.$input['imagename']);   
            }
            

            // kalau user ngupload gambar baru, jalankan code ini, dan hapus gambar lama
            // ini error, fix nanti dirumah // solved
            if($user->BgPPuser !== 'bguser.jpg' ){
                if($user->BgPPuser !== $input['imagename']){
                    File::delete('thumbnails/'.$user->BgPPuser);
                }
            }
            
            $validatedData['BgPPuser'] = pathinfo($filenameWithExt, PATHINFO_FILENAME).auth()->user()->username.'.'.$image->extension();
        }

        User::where('username', $user->username)->update($validatedData);

        // return back()
        //     ->with('success','<b>Berhasil</b> Update Data!')
        //     ->with('fileName',$input['imagename']);

        return redirect('/editp/'.$user->username)->with('success','<b>Berhasil</b> Update Data!');
    }
}