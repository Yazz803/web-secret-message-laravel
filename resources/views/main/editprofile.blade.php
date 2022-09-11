@extends('main.layouts.main')

@section('container')
    <div class="edit bg-dark m-auto p-4 rounded">
        <h2 class="text-light text-center">Edit Profile</h2>
        <hr class="bg-light">
        <form action="/updateuser/{{ auth()->user()->username }}" method="POST" enctype="multipart/form-data">
            @method("put")
            @csrf
            {{-- <div style="max-height: 200px;overflow:hidden">
                <img width="100%" class="mb-4" src="{{ $baseurl }}/assets/img/bg2.jpg" alt="">
            </div> --}}
            @php
                $pp = auth()->user()->PPuser;
                $bgpp = auth()->user()->BgPPuser;
                // tambahin buat BgPPUser
                $PP = substr($pp, strrpos($pp, '.') + 1);
                $BgPP = substr($bgpp, strrpos($bgpp, '.') + 1);
            @endphp
            @if($BgPP === 'gif')
                <div class="img bg-position-center bg-wrap text-center py-4" style="background-image: url({{ $baseurl }}/images/{{ auth()->user()->username.auth()->user()->BgPPuser }});">
            @else
                <div class="img bg-position-center bg-wrap text-center py-4" style="background-image: url({{ $baseurl }}/images/{{ auth()->user()->BgPPuser }});">
            @endif
                <div class="user-logo">
                    @if($PP === "gif")
                    <div class="img img-thumbnail" style="background-image: url({{ $baseurl }}/thumbnails/{{ auth()->user()->username.auth()->user()->PPuser }});"></div>
                    @else
                    <div class="img img-thumbnail" style="background-image: url({{ $baseurl }}/thumbnails/{{ auth()->user()->PPuser }});"></div>
                    @endif
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
            <input type="file" name="PPuser" id="PPuser" class="form-control mb-3" style="border-radius:0;border:0;" onchange="previewImage()"/>
            @error('PPuser')
            <p class="text-danger ">
                {!! $message !!}
            </p>
            @enderror

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
                            @if(auth()->user()->PPuser == 'user.png')
                                <img src="{{ $baseurl.'/thumbnails/user.png' }}" class="img-preview img-fluid">
                            @elseif($PP === 'gif')
                                <img src="{{ $baseurl.'/thumbnails/'.auth()->user()->username.auth()->user()->PPuser }}" width="100%" class="img-preview img-fluid">
                            @else
                                <img src="{{ $baseurl.'/thumbnails/'.auth()->user()->PPuser }}" class="img-preview img-fluid">
                            @endif
                        </center>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-5">
                <p class="lead text-light fw-bold">PP Background </p>
                <button class="bg-primary btn btn-primary" style="border-radius:10px 10px 0 0;" type="button" data-bs-toggle="modal" data-bs-target="#fotobg"><span  class="fa fa-eye text-light fs-5"></span></button>
            </div>
            <input type="file" name="BgPPuser" id="BgPPuser" class="form-control mb-3" style="border-radius:0;border:0;" onchange="previewImageBgPP()" />
            @error('BgPPuser')
                <p class="text-danger">
                    {{ $message }}
                </p>
            @enderror
            <!-- Modal -->
            <div class="modal fade" id="fotobg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content bg-dark bg-opacity-75">
                    <div class="modal-header">
                    <h5 class="modal-title text-light" id="exampleModalLabel">Preview PP Background</h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <center>
                            @if(auth()->user()->BgPPuser == 'bguser.jpg')
                                <img src="{{ $baseurl.'/images/bguser.jpg' }}" class="img-previewBg img-fluid">
                            @elseif($BgPP === 'gif')
                                <img src="{{ $baseurl.'/images/'.auth()->user()->username.auth()->user()->BgPPuser }}" width="100%" class="img-previewBg img-fluid">
                            @else
                                <img src="{{ $baseurl.'/images/'.auth()->user()->BgPPuser }}" width="100%" class="img-previewBg img-fluid">
                            @endif
                        </center>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>

            {{-- Special feature === 1 ? give access Social Media : false --}}
            @can('specialFeature')
            <p class="lead text-light fw-bold mb-0"><span class="fa fa-star text-warning"></span> Social Media</p>
            <p class="mb-2">Sosmed akan ditampilkan di halaman postingan kamu</p>
            <div class="form-outline mb-4">
                <input type="url" name="instagram" autocomplete="off" autofocus id="form1Example13" value="{{ auth()->user()->instagram }}" class="form-control form-control-lg text-light" placeholder="example: https://instagram.com/yazz803" required/>
                <label class="form-label text-light pt-2" for="form1Example13"><i class="fab fa-instagram"></i> Link Instagram</label>
            </div>
            <div class="form-outline mb-4">
                <input type="url" name="tiktok" autocomplete="off" autofocus id="form1Example13"  value="{{ auth()->user()->tiktok }}" class="form-control form-control-lg text-light" placeholder="Wajib pake https://link-blablabla" required/>
                <label class="form-label text-light pt-2" for="form1Example13"><i class="fab fa-tiktok"></i> Link TikTok</label>
            </div>
            <div class="form-outline mb-4">
                <input type="url" name="facebook" autocomplete="off" autofocus id="form1Example13"  value="{{ auth()->user()->facebook }}" class="form-control form-control-lg text-light" placeholder="paste linknya disini" required/>
                <label class="form-label text-light pt-2" for="form1Example13"><i class="fab fa-facebook"></i> Link Facebook</label>
            </div>
            <div class="form-outline mb-4">
                <input type="url" name="discord" autocomplete="off" autofocus id="form1Example13"  value="{{ auth()->user()->discord }}" class="form-control form-control-lg text-light" placeholder="paste linknya disini" required/>
                <label class="form-label text-light pt-2" for="form1Example13"><i class="fab fa-discord"></i> Link Discord</label>
            </div>
            @endcan
            {{-- Delete All Message --}}
            <div class="deleteAllMessage d-flex justify-content-between mb-3" style="align-items: center;">
                <p class="text-danger mb-0"><span class="fa fa-warning text-danger"></span> Hapus Semua Pesan!</p>
                <span class="btn btn-danger" onclick="return deleteAllMessage()">Delete!</span>
            </div>
            {{-- End Delete All Message --}}
            <!-- Submit button -->
            <button type="submit" id="updateProfile" class="btn btn-primary btn-lg btn-block m-auto">Update!</button>
        </form>
    </div>

    <br><br>

    <script>
          function previewImage(){
            const image = document.querySelector('#PPuser')
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block'

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0])

            oFReader.onload = function(oFREvenet){
            imgPreview.src = oFREvenet.target.result
            }
        }
          function previewImageBgPP(){
            const image = document.querySelector('#BgPPuser')
            const imgPreview = document.querySelector('.img-previewBg')

            imgPreview.style.display = 'block'

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0])

            oFReader.onload = function(oFREvenet){
            imgPreview.src = oFREvenet.target.result
            }
        }

        function deleteAllMessage(){
            // swal logout
            Swal.fire({
            title: 'Hapus Semua Pesan?',
            imageUrl: '/assets/img/anime-crying2.gif',
            imageWidth: 250,
            imageHeight: 200,
            backgroundOpacity: .5,
            background: '#333',
            position: 'left-start',
            color: '#FFF',
            // width: 300,
            // icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Enggak'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href= '/deleteallmessage'
            }
            })
        }
    </script>
@endsection