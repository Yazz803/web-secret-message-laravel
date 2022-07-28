@extends('main.layouts.main')

@section('container')

<div class="kartu mt-5">
    <div class="card  mb-3" style="background-color: #111">
        <div class="card-body">
            @if(auth()->user()->fitur === 0)
            <h6 class="text-light">??? <small>@<?php;?>???</small></h6>
            @else
            <h6 class="text-light">{{ $pesan->name }} <small><a href="http://127.0.0.1:8000/u/{{ $pesan->username }}">@<?php  ;?>{{ $pesan->username }}</a></small></h6>
            @endif
          <p class="text-light">{{ $pesan->pesan }}</p>
          <p class="m-0">{{ $pesan->created_at->diffForHumans() }}</p>
        </div>
        <form  method="post" action="/kirimreply">
          @csrf
          @php
              $url = url()->current();
              $findurl = substr($url, strrpos($url, '/') + 1);
          @endphp
          <input type="hidden" name="pesan_id" value="{{ $findurl }}">
          <input type="hidden" name="user_id" value="{{ $pesan->reply_id }}">
          <input type="hidden" name="name" value="{{ auth()->user()->name }}">
          <input type="hidden" name="username" value="{{ auth()->user()->username }}">
          <input type="hidden" name="pesan" value="{{ $pesan->pesan }}">
          {{-- menghilangkan pesan success setelah beberapa detik --}}
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
          <script>
              setTimeout(function() {
              $('#hide').fadeOut('slow');
              }, 3000); // <-- time in milliseconds
          </script>
          @if(session()->has('success'))
          <div class="alert alert-dark alert-dismissible fade show" id="hide" role="alert">
          {!! session('success') !!}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <center>
            <textarea name="komentar" id="" cols="25" rows="5" autofocus placeholder="Masukan komentar" class="p-2"></textarea>
            <br>
            <button class="btn btn-light mb-4"><b> Kirim</b></button>
          </center>
        </form>
    </div>
</div>


@endsection