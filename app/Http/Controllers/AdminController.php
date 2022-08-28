<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesan;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index(){
        return view('main.admin',[
            'baseurl' => Controller::BASEURL,
            'title' => 'ADMIN',
            'users' => User::latest()->filter(request(['adminSearch']))->paginate(6),
            'allusers' => User::all()
        ]);
    }

    public function hapus(User $user){
        Alert::toast('User berhasil dihapus!', 'success');
        Pesan::where('user_id', $user->id)->delete();
        Komentar::where('user_id', $user->id)->delete();
        if(User::where('id', $user->id)){
            // hapus PP user
            File::delete('thumbnails/'.$user->PPuser); // hapus gambar !gif
            File::delete('thumbnails/'.$user->username.$user->PPuser); // hapus gambar gif
            
            // hapus BG PP user
            File::delete('images/'.$user->BgPPuser); // hapus gambar !gif
            File::delete('images/'.$user->username.$user->BgPPuser); // hapus gambar gif
        }
        User::destroy($user->id);
        return back();
    }
}
