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
            <div class="img bg-position-center bg-wrap text-center py-4" style="background-image: url({{ $baseurl }}/assets/img/anime-sorry2.gif);">
                <div class="user-logo">
                    <div class="img img-thumbnail" style="background-image: url({{ $baseurl }}/assets/img/anime-sorry.gif);"></div>
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

            <div class="d-flex justify-content-between">
                <p class="lead text-light fw-bold">Foto Profile </p>
                <button class="bg-primary btn btn-primary" type="button" style="border-radius:10px 10px 0 0;" data-bs-toggle="modal" data-bs-target="#fotoprofile"><span  class="fa fa-eye text-light fs-4"></span></button>
            </div>
            <input type="file" class="form-control mb-3" style="border-radius:0;border:0;"/>
            <!-- Modal -->
            <div class="modal fade" id="fotoprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content bg-dark bg-opacity-75">
                    <div class="modal-header">
                    <h5 class="modal-title text-light" id="exampleModalLabel">Preview Foto Profile</h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <img class="img-fluid" src="{{ $baseurl }}/assets/img/anime-sorry.gif" alt="">
                        </center>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-5">
                <p class="lead text-light fw-bold">Foto Background </p>
                <button class="bg-primary btn btn-primary" style="border-radius:10px 10px 0 0;" type="button" data-bs-toggle="modal" data-bs-target="#fotobg"><span  class="fa fa-eye text-light fs-5"></span></button>
            </div>
            <input type="file" class="form-control mb-3" style="border-radius:0;border:0;" />
            <!-- Modal -->
            <div class="modal fade" id="fotobg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content bg-dark bg-opacity-75">
                    <div class="modal-header">
                    <h5 class="modal-title text-light" id="exampleModalLabel">Preview Foto Background</h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <img class="img-fluid" src="{{ $baseurl }}/assets/img/anime-sorry2.gif" alt="">
                        </center>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
  
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-lg btn-block m-auto">Update!</button>
          </form>
    </div>
@endsection