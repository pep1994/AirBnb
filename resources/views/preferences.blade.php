@extends('layouts.main_layout')

@section('content')
  <div class="main_content content-myapartments">
    <div class="container">
      @empty ($myPref)
        <div class="container">
          <div class="row d-flex justify-content-center">
            <h2 style="color: white;">Nessun preferito</h2>
          </div>
        </div>
        @else
          <table class="table table-no-sponsor">
              <thead class="grey" style="background: rgb(225, 60, 60); color: #FFF;">
              <tr>
                  <th scope="col">Copertina</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Città</th>
                  <th scope="col">Prezzo</th>
                  <th scope="col">Azioni</th>
              </tr>
              </thead>
              <tbody>
                  @foreach ($myPref as $apartment)
                      <tr>
                          <td>
                              <img width="150px"
                              @if(stristr($apartment -> image, 'http'))
                                  src=" {{ asset($apartment -> image) }}"
                              @else
                                  src="{{ asset('storage/' . $apartment -> image) }}"
                              @endif
                              alt="{{ $apartment->title }}">
                          </td>
                          <td> {{$apartment -> title}}</td>
                          <td> {{$apartment -> city}}</td>
                          <td> {{$apartment -> price}} €</td>
                          <td>
                            <a href="{{ route('show', $apartment->id) }}" class="btn btn-success"><i class="fas fa-info-circle"></i></a>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
        @endempty
    </div>
  </div>
@endsection

@section('script')
  <script>

    // metto il logo rosso
    $('.logobnb').attr('src', 'http://localhost:8000/img/LOGO_UNO_MOD.png');

    var header = $('header');
    var links = $('header a');
    var images = $('img');
    var img = $('<img></img>');

    header.css({
      'background-color': 'white',
      'box-shadow': '1px 1px 15px rgba(0, 0, 0, .1)'
    });

    links.css({
      'color': 'rgb(225, 60, 60)'
    });
  </script>
@endsection
