<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
