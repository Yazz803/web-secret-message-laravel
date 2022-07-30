<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        return view('login.register',[
            'title' => 'Register'
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:4',
            'username' => 'required|alpha_num|max:10|min:4|unique:users',
            'password' => 'required|min:5'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/')->with('success', '<b>Registrasi Berhasil!</b> Silahkan Login');
    }
}
