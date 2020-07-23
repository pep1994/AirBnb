@extends('layouts.main_layout')

@section('content')
  <div class="main_content">
    <div class="container-fluid mb-5">
      <div class="row">
        <div class="col-md-1">
          <a href="{{ route('show', $apartment -> id)}}"><i class="fas fa-arrow-circle-left text-danger back-circle"></i></a>
        </div>
        {{-- FIX COL --}}
        <div class="col-md-11"></div>
      </div>
    </div>

    <input id="id_apt" type="hidden" name="" value="{{$id}}">

    <div class="container content-stats">
      <div class="row allarga">
        <div class="col-md-6">
          <div class="chartOne">
            <canvas id="views" width="300" height="300"></canvas>
          </div>
        </div>
        <div class="col-md-6">
          <canvas id="messages" width="300" height="300"></canvas>
        </div>
      </div>
    </div>
  </div>

  {{-- blocco animazione --}}
  <div class="logo-container-animation">
    <img class="logo-animation" src="{{ asset('img/LOGO_UNO_MOD.png') }}" alt="logo">
  </div>
  <div class="name-animation text-center">
    <h3>Ciao {{ $apartment -> user -> name }}, ecco le statistiche relative al tuo appartamento {{ $apartment -> title }}</h3>
  </div>

  {{-- bottone sponsor --}}
  @if (count($apartment->sponsors) < 1)
    <div class="row justify-content-center mt-5">
      <a href="{{ route('sponsor', $apartment -> id) }}" class="btn btn-lg btn-sponsor">Sponsorizza il tuo appartamento</a>
    </div>
  @endif
@endsection

@section('script')
  <script src="{{asset('js/stats.js')}}" charset="utf-8"></script>
@endsection
