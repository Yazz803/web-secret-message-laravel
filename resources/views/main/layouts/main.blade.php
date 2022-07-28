
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
	  		<div class="img bg-wrap text-center py-4" style="background-image: url({{ $baseurl }}/assets/img/bg2.jpg);">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url({{ $baseurl }}/assets/img/anime7.webp);"></div>
	  				<h3>{{ auth()->user()->name }}</h3>
            <h6>@<?php;?>{{ auth()->user()->username }}</h6>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="{{ Request::is('home') ? 'active' : '' }}">
            <a href="/home"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li class="{{ Request::is('pesan', 'reply/*') ? 'active' : '' }}">
              <a href="/pesan"><span class="fa fa-eye mr-3 notif"></span> Lihat Pesan</a>
          </li>
          <li class="{{ Request::is('lihatreply') ? 'active' : '' }}">
              <a href="/lihatreply"><span class="fa fa-eye mr-3 notif"></span> Lihat Reply</a>
          </li>
          <li>
              <a href="/editp"><span class="fa fa-edit mr-3 notif"></span> Edit Profile</a>
          </li>
          <li>
            @if (auth()->user()->fitur === 1)
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-light">
              <span> SPECIAL FEATURE</span>
              <form action="/fitur/{{ auth()->user()->id }}" method="post">
                @csrf
                <input type="hidden" name="fitur" value="{{ auth()->user()->fitur - 1 }}">
                <button class="btn btn-success">ON</button>
              </form>
            @else
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span> SPECIAL FEATURE</span>
              <form action="/fitur/{{ auth()->user()->id }}" method="post">
                @csrf
                <input type="hidden" name="fitur" value="{{ auth()->user()->fitur + 1 }}">
                <button class="btn btn-dark">OFF</button>
              </form>
            </h6>
            @endif
          </li>
          <li>
            <a href="/logout"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        @yield('container')
      </div>

    <script src="{{ $baseurl }}/assets/mainHome/js/jquery.min.js"></script>
    <script src="{{ $baseurl }}/assets/mainHome/js/popper.js"></script>
    <script src="{{ $baseurl }}/assets/mainHome/js/bootstrap.min.js"></script>
    <script src="{{ $baseurl }}/assets/mainHome/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- MDBootstrap5 --}}
    <script type="text/javascript" src="/assets/js/mdb.min.js"></script>
  </body>
</html>