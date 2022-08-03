<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Pesan;
use Illuminate\Http\Request;
use App\Models\User;

class UserDashboardController extends Controller
{
    public function index(){
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
