<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- CSS Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    {{-- icon --}}
    <link rel="icon" href="/assets/img/icon.png">
    <!-- MDB -->
		<link rel="stylesheet" href="{{ $baseurl }}/assets/mainHome/css/style.css">
        <link rel="stylesheet" href="{{ $baseurl }}/assets/css/mdb.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body::before{
            content: '';
            background-image: linear-gradient(
                rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.5)
            ),
            url(../assets/img/bg2.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            z-index: -1;
        }
        .kotak {
            background-color: rgba(0, 0, 0, 0.459);
            margin: auto;
            width: 40%;
            padding: 20px;
        }

        @media (max-width:700px){
            .kotak {
                width: 90%;
            }
        }
    </style>
    <title>Web Secret Message | {{ $user->username }}</title>
</head>
<body>
    <div class="kotak mt-5 mb-5">
        <div class="img bg-position-center bg-wrap text-center py-4" style="background-image: url({{ $baseurl }}/assets/img/bg2.jpg);">
            <div class="user-logo">
                <div class="img img-thumbnail" style="background-image: url({{ $baseurl }}/assets/img/anime3.jpg)"></div>
                          <h3 style="text-shadow: 0 0 2px black,0 0 2px black,0 0 2px black,0 0 2px black">{{ $user->name }}</h3>
                <h6 style="text-shadow: 0 0 2px black,0 0 2px black,0 0 2px black,0 0 2px black" class="text-light">@<?php;?>{{ $user->username }}</h6>
            </div>
        </div>
        <br>
          </svg>
        <p class="text-light text-center"><span class="fa fa-star text-warning"></span> Kirim Pesan tidak dikenal</p>
        {{-- menghilangkan pesan success setelah beberapa detik --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            setTimeout(function() {
            $('#hide').fadeOut('slow');
            }, 3000); // <-- time in milliseconds
        </script>
        @if(session()->has('success'))
        <div class="alert alert-primary alert-dismissible fade show" id="hide" role="alert">
        {!! session('success') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="/kirimpesan" method="post">
        @csrf
            <input type="hidden" value="{{ mt_rand(10000,99999) }}" name="id">
            <input type="hidden" value="{{ $user->id }}" name="user_id">
            <input type="hidden" value="{{ auth()->user()->id }}" name="reply_id">
            <input type="hidden" value="{{ auth()->user()->name }}" name="name">
            <input type="hidden" value="{{ auth()->user()->username }}" name="username">
            <center>
                <textarea name="pesan" id="pesan" class="form-control px-2" style="padding-bottom: 100px" placeholder="{{ $kataRandom[mt_rand(0,22)]. " | Kirim Pesan apapun ke $user->name" }}" required></textarea><br>
                <button type="submit" class="btn btn-success fw-bold">Kirim Pesan</button>
            </center>
        </form> 
        <br>
        {{-- untuk nanti pas di hosting --}}
        {{-- <a href="/home" class="btn btn-dark" style="position: absolute; bottom:-150px;left:0;right:0;border-radius:0;top:600px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16"> --}}
            
            <a href="/home" class="btn btn-dark" style="position: absolute; top: 0;left:0;right:0;border-radius:0;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">

            <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z"/>
          </svg> My Dashboard</a>
    </div>
</body>

{{-- bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
{{-- MDB javascript --}}
<script src="{{ $baseurl }}/assets/mainHome/js/jquery.min.js"></script>
<script src="{{ $baseurl }}/assets/mainHome/js/popper.js"></script>
<script src="{{ $baseurl }}/assets/mainHome/js/bootstrap.min.js"></script>
<script src="{{ $baseurl }}/assets/mainHome/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>