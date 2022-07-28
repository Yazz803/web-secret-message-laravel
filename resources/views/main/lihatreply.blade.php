@extends('main.layouts.main')

@section('container')

{{-- <h2 class="text-light text-center mt-4 mb-3 h4 lihatpesan"><span class="fa fa-info-circle"></span> Pesan kamu akan ditampilkan di bawah sini</h2> --}}
<div class="kartu mt-5">
  @if ($komentars->count())      
  {{-- {{ dd($komentars) }} --}}
    @foreach ($komentars as $komentar)
    <div class="card mb-3" style="background-color: #111">
        <div class="card-body">
          <form action="/lihatreply/{{ $komentar->id }}" method="post">
            @method('delete')
            @csrf
            <button style="border-radius: 50%; border:0; position: absolute;top:-10px;right:-10px;color:white; background-color:rgba(17, 17, 17, 0)"><span class="fa fa-remove bg-danger p-2" style="border-radius:50%"></span></button>
          </form>
          <p class="text-light"><span class="fa fa-info-circle"></span> Pesan kamu yang dikirim ke <strong>{{ $komentar->name }} <small><a href="http://127.0.0.1:8000/u/{{ $komentar->username }}">@<?php  ;?>{{ $komentar->username }}</a></small> </strong><br><br><strong>Pesan : </strong>{{ $komentar->pesan }}</p>
          <hr class="bg-light">
          {{-- <h6 class="text-light">{{ $komentar->name }} <small><a href="http://127.0.0.1:8000/u/{{ $komentar->username }}">@<?php  ;?>{{ $komentar->username }}</a></small></h6> --}}
          <p class="text-light"><strong>Reply : </strong>{{ $komentar->komentar }}</p>
          <p>{{ $komentar->created_at->diffForHumans() }} (reply)</p>
        </div>
    </div>
    @endforeach
  @else
      <p class="bg-dark px-5 py-2 bg-opacity-75 rounded text-light w-100 fs-4 text-center"><span class="fa fa-info-circle"></span> Belum ada Reply </p>
      <img width="300px" loop="infinite" src="{{ $baseurl }}/assets/img/anime.gif" alt="">
  @endif
</div>

{{ $komentars->links() }}


@endsection