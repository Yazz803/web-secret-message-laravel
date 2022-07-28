<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Pesan;
use Illuminate\Http\Request;

class ReplyPesanController extends Controller
{
    public function index(Pesan $pesan){
        return view('pesan.reply',[
            'title' => 'Reply',
            'baseurl' => Controller::BASEURL,
            'pesan' => $pesan
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'user_id' => 'required',
            'pesan_id' => 'required',
            'komentar' => 'required|min:2',
            'name' => 'required',
            'username' => 'required',
            'pesan' => 'required'
        ]);

        Komentar::create($validatedData);

        return redirect('/reply/'.$request->pesan_id)->with('success', '<b>Reply/Komentar</b> berhasil dikirim!');
    }
}
