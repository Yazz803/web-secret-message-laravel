<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditProfileController extends Controller
{
    public function index(){
        return view('main.editprofile',[
            'title' => 'Edit Profile',
            'baseurl' => Controller::BASEURL
        ]);
    }
}
