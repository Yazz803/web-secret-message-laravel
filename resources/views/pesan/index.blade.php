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
    <style>
        body::before{
            content: '';
            background-image: linear-gradient(
                rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.5)
            ),
            url(../assets/img/bg.jpg);
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
    <div class="kotak mt-5">
        <center>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-envelope-paper-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6.5 9.5 3 7.5v-6A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5v6l-3.5 2L8 8.75l-1.5.75ZM1.059 3.635 2 3.133v3.753L0 5.713V5.4a2 2 0 0 1 1.059-1.765ZM16 5.713l-2 1.173V3.133l.941.502A2 2 0 0 1 16 5.4v.313Zm0 1.16-5.693 3.337L16 13.372v-6.5Zm-8 3.199 7.941 4.412A2 2 0 0 1 14 16H2a2 2 0 0 1-1.941-1.516L8 10.072Zm-8 3.3 5.693-3.162L0 6.873v6.5Z"/>
        </center>
        <br>
          </svg>
        <p class="text-light text-center">Kirim Pesan tidak dikenal ke <strong>{{ $user->name }}</strong></p>
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
        <form action="/kirimpesan" method="post">
        @csrf
            <input type="hidden" value="{{ mt_rand(10000,99999) }}" name="id">
            <input type="hidden" value="{{ $user->id }}" name="user_id">
            <input type="hidden" value="{{ auth()->user()->id }}" name="reply_id">
            <input type="hidden" value="{{ auth()->user()->name }}" name="name">
            <input type="hidden" value="{{ auth()->user()->username }}" name="username">
            <center>
                <textarea name="pesan" id="" cols="30" rows="5" class="p-2" placeholder="Udah makan? Kabarnya gmn? hobinya apa? |  Tanyakan apa pun ke {{ $user->name }}" required></textarea><br>
                <button type="submit" class="btn btn-dark mt-3 fw-bold">Kirim Pesan</button>
            </center>
        </form> 
        <br>
        <a href="/home" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
            <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z"/>
          </svg> My Dashboard</a>
    </div>
</body>

{{-- bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</html>