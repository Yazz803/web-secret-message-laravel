<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesan;
use App\Models\Komentar;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserDashboardController extends Controller
{
    public function index(){
        // Alert::toast('Login Berhasil!', 'success');
        return view('main.home',[
            'title' => 'Home',
            'baseurl' => Controller::BASEURL,
            'jmlPesan' => Pesan::where('user_id', auth()->user()->id)->get(),
            'jmlReply' => Komentar::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function about(){
        return view('main.about',[
            'title' => 'About',
            'baseurl' => Controller::BASEURL
        ]);
    }
}
