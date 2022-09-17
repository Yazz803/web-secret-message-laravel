
<!doctype html>
<html lang="en">
  <head>
  	<title>Web Secret Message | {{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- icon --}}
    <link rel="icon" href="/assets/img/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ $baseurl }}/assets/mainHome/css/style.css">
		<link rel="stylesheet" href="{{ $baseurl }}/assets/mainHome/css/styleUser.css">
        <!-- Font Awesome -->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      />
      <!-- Google Fonts Roboto -->
      <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
      />
      <!-- MDB -->
      <link rel="stylesheet" href="{{ $baseurl }}/assets/css/mdb.min.css" />
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary fa fa-circle">
	        </button>
        </div>            
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
            <h6 style="text-shadow: 0 0 2px black,0 0 2px black,0 0 2px black,0 0 2px black">@<?php;?>{{ auth()->user()->username }}</h6>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          @can('admin')
          <h6 class="sidebar-heading text-center px-3 mt-4 mb-1 text-muted">
            <span>ADMIN</span>
          </h6>
          <li class="{{ Request::is('lihatuser') ? 'active' : '' }} }}">
            <a href="/lihatuser"><span class="fa fa-user mr-3"></span> Lihat User</a>
          </li>
          @endcan
          <li>
            @if(auth()->user()->fitur === 0 && auth()->user()->special_feature === 0)
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-light">
              <span class="fa fa-star text-warning"> SPECIAL FEATURE</span>
              <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#belifitur">OFF</button>
            @endif
          </li>
            <!-- Modal -->
            <div class="modal fade" id="belifitur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content bg-dark bg-opacity-75">
                  <div class="modal-header">
                  <h5 class="modal-title text-light" id="exampleModalLabel"><span class="fa fa-info-circle" style="border-radius: 50%"></span> Fitur Special Tidak Aktif</h5>
                  <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <center>
                      <img src="{{ $baseurl }}/assets/img/anime4.gif" alt="gambar" class="img-fluid w-75">
                    </center>
                    <p class="lead text-center">Kamu harus membeli fitur special dulu...</p>
                    <a href="/about#specialf"><button class="btn btn-success fw-bold">Click here</button></a>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
              </div>
              </div>
          </div>
          @can('specialFeature')
          <li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-light">
              <span class="fa fa-star text-warning"> SPECIAL FEATURE</span>
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#fituron">ON</button>
          </li>
            <!-- Modal -->
            <div class="modal fade" id="fituron" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content bg-dark bg-opacity-75">
                  <div class="modal-header">
                  <h5 class="modal-title text-light" id="exampleModalLabel"><span class="fa fa-info-circle" style="border-radius: 50%"></span> Fitur Spesial Aktif</h5>
                  <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <center>
                      <img src="{{ $baseurl }}/assets/img/anime-happy.gif" alt="gambar" class="img-fluid w-75">
                    </center>
                    <p class="lead text-center">Terima kasih sudah beli Fitur Special-nya</p>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
              </div>
              </div>
          </div>
          @endcan
          <li class="{{ Request::is('home') ? 'active' : '' }}">
            <a href="/home"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li class="{{ Request::is('pesan', 'reply/*') ? 'active' : '' }}">
              <a href="/pesan"><span class="fa fa-eye mr-3 notif"></span> Lihat Pesan</a>
          </li>
          <li class="{{ Request::is('lihatreply') ? 'active' : '' }}">
              <a href="/lihatreply"><span class="fa fa-eye mr-3 notif"></span> Lihat Reply</a>
          </li>
          <li class="{{ Request::is('editp') ? 'active' : '' }} }}">
              <a href="/editp/{{ auth()->user()->username }}"><span class="fa fa-edit mr-3 notif"></span> Edit Profile</a>
          </li>
          <li class="{{ Request::is('about') ? 'active' : '' }} }}">
              <a href="/about"><span class="far fa-question-circle mr-3 notif"></span> About</a>
          </li>
          <li>
              <a href="#" onclick="return Logout()" class="logout-tablet-laptop text-danger"><span class="fa fa-sign-out mr-3"></span> Logout</a>
          </li>
        </ul>
    	</nav>

      {{-- logout buat mobile --}}
      <div class="logout-mobile">
        <span class="fa fa-sign-out fs-3" onclick="return Logout()"></span>
      </div>
      {{-- end logout buat mobile --}}

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        @yield('container')
      </div>
      @include('sweetalert::alert')


    <script src="{{ $baseurl }}/assets/mainHome/js/jquery.min.js"></script>
    <script src="{{ $baseurl }}/assets/mainHome/js/popper.js"></script>
    <script src="{{ $baseurl }}/assets/mainHome/js/bootstrap.min.js"></script>
    <script src="{{ $baseurl }}/assets/mainHome/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- MDBootstrap5 --}}
    <script type="text/javascript" src="/assets/js/mdb.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      // swal logout
      function Logout() {
          Swal.fire({
          title: 'Mau Logout?',
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
            window.location.href= '/logout'
          }
        })
      }
    </script>
    {{-- protect my website from inspect elements --}}
    {{-- <script>
        document.onkeydown = function(e) {
        if(event.keyCode == 123) {
          return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
          return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
          return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
          return false;
        }
        if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
          return false;
        }
      }
    </script> --}}
  </body>
</html>