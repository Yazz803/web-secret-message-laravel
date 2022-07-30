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
            'kataRandom' => [
                'Apakah kamu baik-baik saja?', 
                'Udah makan belom?', 
                'Udah punya pacar belum?',
                'Makanan favorite kamu apa?',
                'Minuman favorite kamu apa?',
                'Film favorite kamu apa?',
                'Kabar kamu gmn sekarang?',
                'Cita-cita kamu mau jadi apa?',
                'Spill lagu kesukaan kamu dong',
                'Spill Movie kesukaan kamu dong',
                'Hobi kamu ngapain?',
                'Kamu sekolah dimana?',
                'Umur kamu berapa?',
                'Kamu suka kucing gk?',
                'Kamu suka anjing gk?',
                'Mata Pelajaran apa yang kamu suka disekolah?',
                'Kamu suka Anime gk?',
                'Kamu biasa main bareng sama siapa?',
                'Siapakah pemegang dokumen asli super semar?',
                'Kamu suka main game apa?',
                'Genre Film/Movie kesukaan kamu apa?',
                'Genre Anime/Manga kesukaan kamu apa?',
                'Suka main game genre apa?'
            ]
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
