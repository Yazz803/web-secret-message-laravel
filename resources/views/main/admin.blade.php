@extends('main.layouts.main')

@section('container')


<p class="bg-dark px-5 py-2 bg-opacity-75 rounded text-light w-100 fs-4 text-center"><span class="fa fa-circle text-danger"></span> Lihat Semua User ( {{ $allusers->count() }} )</p>

<form action="/lihatuser">
    <div class="input-group mb-3 searching">
        <input type="text" class="form-control" placeholder="Cari User ..." name="adminSearch" value="{{ request('adminSearch') }}">
        <button class="btn btn-dark" type="submit">Search</button>
    </div>
</form>

<div class="data bg-dark py-3">
    <table class="table table-dark table-striped">
        <tr>
            <th class="fs-5 text-center">Name</th>
            <th class="fs-5 text-center">Username</th>
            <th class="fs-5 text-center">Fitur</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td class="text-center fs-6" style="width:20%">{{ $user->name }}</td>
            <td class="text-center fs-6">{{ $user->username }}</td>
            <td class="text-center fs-6">
                <form action="/fitur/{{ auth()->user()->id }}" method="post">
                    @csrf
                    <input type="hidden" name="fitur" value="{{ auth()->user()->fitur + 1 }}">
                    <button class="btn btn-danger">OFF</button>
                </form>    
            </td>
        </tr>
        @endforeach
    </table>
    <div class="m-4">
        {{ $users->links() }}
    </div>
</div>

@endsection