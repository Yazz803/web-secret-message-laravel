@extends('main.layouts.main')

@section('container')


<p class="bg-dark px-5 py-2 bg-opacity-75 rounded text-light w-100 fs-4 text-center"><span class="fa fa-circle text-danger"></span> Lihat Semua User ( {{ $allusers->count() - 1 }} )</p>

<form action="/lihatuser">
    <center>
        <div class="input-group mb-3 col-lg-4 right">
            <input type="text" autofocus autocomplete="off" class="form-control" placeholder="Cari User ..." name="adminSearch" value="{{ request('adminSearch') }}">
            <button class="btn btn-dark" type="submit">Search</button>
        </div>
    </center>
</form>

<div class="data bg-dark py-3">
    <table class="table table-dark table-striped">
        <tr>
            <th class="fs-5 text-center">Name</th>
            <th class="fs-5 text-center">Username</th>
            <th class="fs-5 text-center">Special Feature</th>
            <th class="fs-5 text-center">Delete User</th>
        </tr>
        @foreach ($users as $user)
        @if($user->username !== auth()->user()->username) {{-- menghilangkan data admin dari tampilan client --}}
        <tr>
            <td class="text-center fs-6" style="width:20%">{{ $user->name }}</td>
            <td class="text-center fs-6">{{ $user->username }}</td>
            <td class="text-center fs-6">
                @if ($user->special_feature === 0)
                <form action="/specialFeature/{{ $user->id }}" method="post">
                    @csrf
                    <input type="hidden" name="special_feature" value="{{ $user->special_feature + 1 }}">
                    <button class="btn btn-danger">OFF</button>
                </form>
                @else
                <form action="/specialFeature/{{ $user->id }}" method="post">
                    @csrf
                    <input type="hidden" name="special_feature" value="{{ $user->special_feature - 1 }}">
                    <button class="btn btn-success">ON</button>
                </form>
                @endif
            </td>
            <td class="text-center fs-6">
                @php
                    $hapusUser = $user->id;
                @endphp
                <a href="#" class="btn btn-secondary" onclick="return hapus()">Delete?</a>
            </td>
        </tr>
        @endif
        @endforeach
        {{-- kalau gk ada data user, maka code php dibawah in yg akan dijalankan --}}
        @php
            $hapusUser = false;
        @endphp
    </table>
    <div class="m-4">
        {{ $users->links() }}
    </div>
</div>

<script>
    // swal hapus
    function hapus() {
          Swal.fire({
          title: 'Hapus User?',
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
            window.location.href= '/delete/{{ $hapusUser }}'
          }
        })
    }
  </script>

@endsection