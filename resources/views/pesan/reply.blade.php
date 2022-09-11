@extends('main.layouts.main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@section('container')

<div class="kartu mt-5">
    <div class="card  mb-3" style="background-color: #111">
        <div class="card-body">
          @if(auth()->user()->special_feature === 1)
            <script>
              $(document).ready(function(){
                  $('#show').click(function() {
                    $('.username-name').toggle("slide");
                  });
              });
            </script>
            <h6 class="text-light username-name" style="display: block;">??? <small>@???</small></h6>
            <h6 class="text-light username-name" style="display: none;">{{ $pesan->name }} <small><a href="{{ $baseurl }}/u/{{ $pesan->username }}" target="_blank">@<?php  ;?>{{ $pesan->username }}</a></small></h6>
          @else
            <h6 class="text-light">??? <small>@???</small></h6>
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
            <div class="d-flex justify-content-around mx-3 flex-wrap">
              <a href="/pesan" class="btn btn-primary mb-4">Lihat Pesan</a>
              <button class="btn btn-light mb-4"><b> Kirim</b></button>
              @if(auth()->user()->special_feature === 1)
              <p class="btn btn-success mb-4" id="show">SHOW/HIDE</p>
              @endif
            </div>
          </center>
        </form>
    </div>
</div>

@include('sweetalert::alert')


@endsection