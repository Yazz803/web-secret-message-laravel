@extends('main.layouts.main')

@section('container')

<h2 class="text-light text-center mt-4 mb-3 h4 lihatpesan px-3"><span class="fa fa-info-circle"></span> Pesan kamu akan ditampilkan di bawah sini</h2>
<div class="kartu">
    @foreach ($pesans as $pesan)
    <div class="card mb-3" style="background-color: #111">
        <div class="card-body">
            @if(auth()->user()->fitur === 0)
            <h6 class="text-light">??? <small>@<?php;?>???</small></h6>
            @else
            <h6 class="text-light">{{ $pesan->name }} <small><a href="http://127.0.0.1:8000/u/{{ $pesan->username }}">@<?php  ;?>{{ $pesan->username }}</a></small></h6>
            @endif
          <form action="/pesan/{{ $pesan->id }}" method="post">
            @method('delete')
            @csrf
            <button style="border-radius: 50%; border:0; position: absolute;top:-10px;right:-10px;color:white; background-color:rgba(17, 17, 17, 0)"><span class="fa fa-remove bg-danger p-2" style="border-radius:50%"></span></button>
          </form>
          <p class="text-light"><strong></strong>{{ $pesan->pesan }}</p>
          <p>{{ $pesan->created_at->diffForHumans() }}</p>
        </div>

        <div class="apacoba d-flex">
          <a href="/reply/{{ $pesan->id }}" class="btn btn-light w-50 mx-auto mb-4"><b> Reply</b></a>
          @can('specialFeature')
          @if (auth()->user()->fitur === 0)
              <form action="/fitur/{{ auth()->user()->id }}" method="POST">
                @csrf
                <input type="hidden" name="fitur" value="{{ auth()->user()->fitur + 1 }}">
                <button class="btn btn-dark">Feature : OFF</button>
              </form>
          @else
              <form action="/fitur/{{ auth()->user()->id }}" method="POST">
                @csrf
                <input type="hidden" name="fitur" value="{{ auth()->user()->fitur - 1 }}">
                <button class="btn btn-success">Feature : ON</button>
              </form>
          @endif
          @endcan
        </div>
    </div>
    @endforeach
</div>

{{ $pesans->links() }}


@endsection