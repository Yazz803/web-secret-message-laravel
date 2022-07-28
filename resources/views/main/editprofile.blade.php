@extends('main.layouts.main')

@section('container')
    <div class="edit bg-dark m-auto p-4 rounded">
        <h2 class="text-light text-center">Edit Profile</h2>
        <hr class="bg-light">
        <form action="/login" method="POST">
            @csrf
            {{-- <div style="max-height: 200px;overflow:hidden">
                <img width="100%" class="mb-4" src="{{ $baseurl }}/assets/img/bg2.jpg" alt="">
            </div> --}}
            <div class="img bg-position-center bg-wrap text-center py-4" style="background-image: url({{ $baseurl }}/assets/img/bg2.jpg);">
                <div class="user-logo">
                    <div class="img" style="background-image: url({{ $baseurl }}/assets/img/anime7.webp);"></div>
	  				        <h3 style="text-shadow: 0 0 2px black,0 0 2px black,0 0 2px black,0 0 2px black">{{ auth()->user()->name }}</h3>
                    <h6 style="text-shadow: 0 0 2px black,0 0 2px black,0 0 2px black,0 0 2px black" class="text-light">@<?php;?>{{ auth()->user()->username }}</h6>
                </div>
            </div>
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="name" autocomplete="off" autofocus id="form1Example13" class="form-control @error('name') is-invalid @enderror form-control-lg text-light" value="{{ auth()->user()->name }}" />
              <label class="form-label text-muted" for="form1Example13">Name</label>
            </div>
            @error('name')
            <p style="color:red;margin-top:-20px;margin-bottom:20px;">{{ $message }}</p>
            @enderror
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="username" autocomplete="off" autofocus id="form1Example13" class="form-control @error('username') is-invalid @enderror form-control-lg text-light" value="{{ auth()->user()->username }}" />
              <label class="form-label text-muted" for="form1Example13">Username</label>
            </div>
            @error('username')
            <p style="color:red;margin-top:-20px;margin-bottom:20px;">{{ $message }}</p>
            @enderror
  
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-lg btn-block m-auto">Update!</button>
          </form>
    </div>
@endsection