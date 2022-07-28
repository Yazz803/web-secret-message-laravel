<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use App\Models\User;

class LihatPesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.lihatPesan',[
            'baseurl' => Controller::BASEURL,
            'title' => 'Pesan',
            'pesans' => Pesan::where('user_id', auth()->user()->id)->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesan  $Pesan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesan $Pesan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesan  $Pesan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesan $Pesan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesan  $Pesan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesan $Pesan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesan  $Pesan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesan $Pesan)
    {
        Pesan::destroy($Pesan->id);
        return redirect('/pesan');
    }
}
