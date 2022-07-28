@extends('main.layouts.main')

@section('container')
<h2 class="mb-4 text-light"><span class="fa fa-star"></span> Selamat datang {{ auth()->user()->name }}</h2>
<div class="kartu">
    <div class="card kartuini w-50 mb-4" style="background-color: #111">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
          <img src="{{ $baseurl }}/assets/img/wallpaperGame.jpg" class="img-fluid"/>
          <a href="#!">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
          </a>
        </div>
        <div class="card-body">
          <script>
            function copyText(){
              document.getElementById('text').select()
              document.execCommand('copy')
            }
          </script>
        @if(session()->has('janganMasuk'))
        <div class="alert alert-danger alert-dismissible fade show" id="hide" role="alert">
        {!! session('janganMasuk') !!}
        <button type="button" class="btn-close" style="border: 0;border-radius:50%;position: absolute;top:-10px;right:-10px;background-color:rgba(17, 17, 17, 0)" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
          <h5 class="card-title text-center text-light">Salin link postingan kamu dan sebarkan di berbagai macam Media Sosial</h5>
          <input type="text" class="btn-outline-dark bg-light w-100 text-center py-2" id="text" style="font-weight: bold;" value="http://127.0.0.1:8000/u/{{ auth()->user()->username }}" readonly>
          <center>
              <button onclick="copyText()" class="btn btn-primary mt-4 fw-bold">Salin Link</button>
          </center>
        </div>
    </div>
    <div class="cardn">
        {{-- <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
          <img src="{{ $baseurl }}/assets/img/wallpaperGame.jpg" class="img-fluid"/>
          <a href="#!">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
          </a>
        </div> --}}
        <div class="card-body bg-light rounded">
          <h5 class="card-title text-center">Jumlah Pesan</h5>
          <center>
              <a href="/pesan" class="btn btn-dark mb-2 px-5"><b class="fs-5">{{ count($jmlPesan) }}</b> pesan</a>
              <p>Terima kasih sudah mencoba aplikasi web saya :)</p>
          </center>
        </div>
        <BR></BR>
        <div class="card-body bg-light rounded">
          <h5 class="card-title text-center">Jumlah Reply</h5>
          <center>
              <a href="/lihatreply" class="btn btn-dark mb-2 px-5"><b class="fs-5">{{ count($jmlReply) }}</b> Reply</a>
              <p>Terima kasih sudah mencoba aplikasi web saya :)</p>
          </center>
        </div>
    </div>
</div>

@endsection