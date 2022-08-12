<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesan;
use App\Models\Komentar;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LihatReplyController extends Controller
{
    public function index(){
        return view('main.lihatreply',[
            'title' => 'Reply',
            'baseurl' => Controller::BASEURL,
            'komentars' => Komentar::where('user_id', auth()->user()->id)->latest()->paginate(10),
        ]);
    }

    public function destroy(Komentar $komentar){
        Alert::toast('Komentar dihapus', 'error');
        Komentar::destroy($komentar->id);

        return redirect('/lihatreply');
    }
}
