@extends('login.layouts.main')
@section('container')

    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="/assets/img/draw2.svg"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
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

                @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" id="hide" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <h2 class="text-center text-light mb-3 mt-4">Login Akun</h2>
              <form action="/login" method="POST">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="username" name="username" autocomplete="off" autofocus id="form1Example13" class="form-control @error('username') is-invalid @enderror form-control-lg text-light" value="{{ old('username') }}" />
                  <label class="form-label text-muted" for="form1Example13">Username</label>
                </div>
                @error('username')
                <p style="color:red;margin-top:-20px;margin-bottom:20px;">{{ $message }}</p>
                @enderror
      
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form1Example23" class="form-control @error('password') is-invalid @enderror form-control-lg text-light" />
                  <label class="form-label text-muted" for="form1Example23">Password</label>
                </div>
                @error('password')
                <p style="color:red;margin-top:-20px;margin-bottom:20px;">{{ $message }}</p>
                @enderror
      
                
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-lg btn-block">Masuk</button>
                
                <div class="webhost d-flex justify-content-around align-items-center mt-4">
                  <p class="lead fw-bold">Belum punya akun? <a href="/register">Register!</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
    </section>

@endsection