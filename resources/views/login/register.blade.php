@extends('login.layouts.main')
@section('container')

    @if (session()->has('loginError'))
        <p><b>{{ session('loginError') }}</b></p>
    @endif
    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="../assets/img/draw2.svg"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <h2 class="text-center text-light mb-3 mt-4">Daftar Akun!</h2>
              <form action="/register" method="POST">
                @csrf
                <!-- Name input -->
                <div class="form-outline mb-4">
                  <input type="text" name="name" autofocus id="form1Example13" class="form-control form-control-lg @error('name') is-invalid @enderror text-light" value="{{ old('name') }}" />
                  <label class="form-label text-muted" for="form1Example13">Name</label>
                </div>
                @error('name')
                    {{ $message }}
                @enderror
                <!-- Email input -->
                {{-- <p style="margin-bottom: -1px" class="text-primary"><span class="fa fa-info-circle"></span> Username tidak bisa di edit ketika sudah register </p> --}}
                <div class="form-outline mb-4">
                  <input type="text" name="username" id="form1Example13" class="form-control form-control-lg @error('username') is-invalid @enderror text-light" value="{{ old('username') }}" />
                  <label class="form-label text-muted" for="form1Example13">Username</label>
                </div>
                @error('username')
                    <p style="color:red;margin-top:-20px;margin-bottom:20px;">{{ $message }}</p>
                @enderror
      
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form1Example23" class="form-control form-control-lg @error('password') is-invalid @enderror text-light" />
                  <label class="form-label text-muted" for="form1Example23">Password</label>
                </div>
                @error('password')
                    <p style="color:red;margin-top:-20px;margin-bottom:20px;">{{ $message }}</p>
                @enderror
      
                
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-lg btn-block">Register !</button>
                
                <div class="webhost d-flex justify-content-around align-items-center mt-4">
                  <p class="lead fw-bold">Sudah punya akun? <a href="/">Login!</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
    </section>

@endsection