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
          <center>
            <div class="areakomen mx-4">
              <textarea name="komentar" id="" rows="2" autofocus placeholder="Masukan komentar" class="form-control px-2" style="padding-bottom: 100px" required></textarea>
            </div>
            <br>
            <div class="d-flex justify-content-between mx-5">
              <a href="/pesan" class="btn btn-success mb-4">Lihat Pesan</a>
              <button class="btn btn-light mb-4"><b> Kirim</b></button>
            </div>
          </center>
        </form>
    </div>
</div>

@include('sweetalert::alert')


@endsection