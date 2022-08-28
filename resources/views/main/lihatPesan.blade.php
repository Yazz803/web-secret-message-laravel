@extends('main.layouts.main')

@section('container')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@if(count($jmlpesan) > 10)
<div class="paginate py-3 mt-4 justify-content-center rounded" style="background-color: rgba(255, 255, 255, 0.7);">
  {{ $pesans->links() }}
</div>
@else

@endif

@if($pesans->count())
<div class="kartu">
    @foreach ($pesans as $pesan)
    <div class="card mb-1 mt-3" style="background-color: #111">
        <div class="card-body">

            @if(auth()->user()->special_feature === 1)
              <script>
                $(document).ready(function(){
                    $('#show{{ $pesan->id }}').click(function() {
                      $('.username-name{{ $pesan->id }}').toggle("slide");
                    });
                });
              </script>
              <h6 class="text-light username-name{{ $pesan->id }}" style="display: block;"><span style="color: rgb(177, 189, 255);">{{ ++$nomor_pesan }}. </span>??? <small>@???</small></h6>
              <h6 class="text-light username-name{{ $pesan->id }}" style="display: none;"><span style="color: rgb(177, 189, 255);">{{ ++$nomor_pesan1 }}. </span> {{ $pesan->name }} <small><a href="http://127.0.0.1:8000/u/{{ $pesan->username }}" target="_blank">@<?php  ;?>{{ $pesan->username }}</a></small></h6>
            @else
              <h6 class="text-light">??? <small>@???</small></h6>
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
          <a href="/reply/{{ $pesan->id }}" class="btn btn-light w-50 mx-auto mb-4"><b>Reply Message</b></a>
          @can('specialFeature')
          <button id="show{{ $pesan->id }}" class="btn btn-success mb-4">show/hide</button>
          @endcan
        </div>
    </div>
    @endforeach
@else
<h2 class="text-light bg-dark text-center mt-4 mb-3 h4 lihatpesan px-3"><span class="fa fa-info-circle"></span> Belum ada yg ngirim pesan</h2>
<center>
  <img width="300px" loop="infinite" src="{{ $baseurl }}/assets/img/anime4.gif" alt="">
</center>
@endif
</div>
@if(count($jmlpesan) > 10)
<div class="paginate py-3 mt-4 justify-content-center rounded" style="background-color: rgba(255, 255, 255, 0.7);">
  {{ $pesans->links() }}
</div>
@else

@endif


@endsection