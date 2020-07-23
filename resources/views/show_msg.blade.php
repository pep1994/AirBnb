@extends('layouts.main_layout')

@section('content')
  <div class="main_content content-myapartments">
    <a href="{{ route('show', $apartment -> id)}}"><i class="fas fa-arrow-circle-left text-danger back-circle"></i></a>
    <div class="container">
      <table class="table table-no-sponsor">
        <thead class="thead" style="background: rgb(225,60,60); color: #FFF;">
          <tr>
            <th scope="col">Data</th>
            <th scope="col">Email</th>
            <th scope="col">Testo</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($messages as $message)
            <tr>
              <td>{{ $message -> created_at -> diffForHumans()}}</td>
              <td>{{ $message -> email}}</td>
              <td>{{ $message -> text}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('js/chiSiamo.js') }}"></script>
@endsection
