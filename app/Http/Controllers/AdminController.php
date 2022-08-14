<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\User;
use App\Models\Pesan;
use Illuminate\Http\Request;
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
        Alert::toast('User berhasil dibanned!', 'success');
        // User::destroy($user->id);
        return back();
    }
}
