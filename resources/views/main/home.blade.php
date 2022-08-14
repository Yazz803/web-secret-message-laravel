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
          <h5 class="card-title text-center text-light">Salin link postingan kamu dan sebarkan di berbagai macam Media Sosial</h5>
          <input type="text" class="btn-outline-dark bg-light w-100 text-center py-2" id="text" style="font-weight: bold;" value="http://127.0.0.1:8000/u/{{ auth()->user()->username }}" readonly>
          <center>
              <button onclick="copyText()" class="btn btn-primary mt-4 fw-bold">Salin Link</button>
          </center>
          <script>
            function copyText() {
              /* Get the text field */
              var copyText = document.getElementById("text");

              /* Select the text field */
              copyText.select();
              copyText.setSelectionRange(0, 99999); /* For mobile devices */

              /* Copy the text inside the text field */
              navigator.clipboard.writeText(copyText.value);

              /* Alert the copied text */
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })

              Toast.fire({
                icon: 'success',
                title: 'Berhasil Salin Link!'
              })
            }
          </script>
        </div>
    </div>
    <div class="cardn">
        {{-- <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
          <img src="{{ $baseurl }}/assets/img/wallpaperGame.jpg" class="img-fluid"/>
          <a href="#!">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
          </a>
        </div> --}}
        <div class="card-body bg-light rounded" id="kirimpesan">
          @if (session()->has('failed'))
        <div class="alert alert-danger alert-dismissible fade show" id="hide" role="alert">
            <p>Username <strong>{{  session('failed')  }}</strong> tidak ditemukan!</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
          <center>
            <form action="/kpesan" method="POST">
              @csrf
              <h5 class="card-title text-center">Kirim Pesan</h5>
              <input type="text" autocomplete="off" name="kirimpesan" class="bg-dark w-75 rounded text-light py-2 px-4" placeholder="Masukan username teman" required>
              <button type="submit" class="btn btn-primary mt-2">Masuk</button>
            </form>
          </center>
        </div>
        <br>
        <div class="card-body bg-light rounded">
          <h5 class="card-title text-center">Jumlah Pesan</h5>
          <center>
              <a href="/pesan" class="btn btn-dark mb-2 px-5"><b class="fs-5">{{ count($jmlPesan) }}</b> pesan</a>
              <p>Terima kasih sudah mencoba aplikasi web saya :)</p>
          </center>
        </div>
        <BR>
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