<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pesan;

class PesanController extends Controller
{
    public function index(User $user){
        return view('pesan.index',[
            'user' => $user,
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
            'pesan' => 'required|min:2',
            'user_id' => 'required',
            'reply_id' => 'required',
            'name' => 'required',
            'username' => 'required',
        ]);

        Pesan::create($validatedData);

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}
