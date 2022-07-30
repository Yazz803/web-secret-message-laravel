@extends('main.layouts.main')

@section('container')


<p class="bg-dark px-5 py-2 bg-opacity-75 rounded text-light w-100 fs-4 text-center"><span class="fa fa-circle text-danger"></span> Lihat Semua User ( {{ $allusers->count() }} )</p>

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
            <th class="fs-5 text-center">Feature</th>
        </tr>
        @foreach ($users as $user)
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
                @if ($user->fitur === 0)
                    <form action="/fitur/{{ $user->id }}" method="POST">
                      @csrf
                      <input type="hidden" name="fitur" value="{{ $user->fitur + 1 }}">
                      <button class="btn btn-danger">OFF</button>
                    </form>
                @else
                    <form action="/fitur/{{ $user->id }}" method="POST">
                      @csrf
                      <input type="hidden" name="fitur" value="{{ $user->fitur - 1 }}">
                      <button class="btn btn-success">ON</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
    <div class="m-4">
        {{ $users->links() }}
    </div>
</div>

@endsection