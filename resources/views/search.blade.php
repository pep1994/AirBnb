@extends('layouts.main_layout')
@section('content')
<div>
  <div class="jumbotron jumbotron-fluid">
    <div class="overlay"></div>
      <div class="container container-input center_home">
        <div class="row justify-content-center">
          <h1 class="display-4">Home is where love resides.</h1>
        </div>
        <form id="form-search" action="{{route('search')}}" method="get">
          @csrf
          @method('GET')
          <div class="form-group">
            <div class="row flex-nowrap justify-content-space-between">
              {{-- BARRA DI RICERCA --}}
              <input type="search" class="form-control" id="search-search-bar"  name='search' placeholder="Cerca Località" value="">
              {{-- SUBMIT --}}
              <input type="submit" id="submit-search" class="btn bnb_btn" value='Cerca'>

              <input type="hidden" name="lat" id="hidden-lat-search" value="">
              <input type="hidden" name="lon" id="hidden-lon-search" value ="">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>

<div class="main_content">
  <div class="sponsored_and_filters">
    <div class="sponsored_carousel">
      @empty (!$apartmentWithSponsor)
        @include('components.carousel_one')
      @endempty
    </div>
    <div class="filters">
      <div class="filters_checkbox">
        <div class="checkboxup">
          <div class="checkboxes">
            <input class="filter" type="checkbox" name="optionals[]" value="1">
            <label for="optionals">Wi-Fi</label>
          </div>
          <div class="checkboxes">
            <input class="filter" type="checkbox" name="optionals[]" value="2">
            <label for="optionals">Portineria</label>
          </div>
          <div class="checkboxes">
            <input class="filter" type="checkbox" name="optionals[]" value="3">
            <label for="optionals">Posto Auto</label>
          </div>
        </div>
        <div class="checkboxdown">
          <div class="checkboxes">
            <input class="filter" type="checkbox" name="optionals[]" value="4">
            <label for="optionals">Sauna</label>
          </div>
          <div class="checkboxes">
            <input class="filter" type="checkbox" name="optionals[]" value="5">
            <label for="optionals">Piscina</label>
          </div>
          <div class="checkboxes">
            <input class="filter" type="checkbox" name="optionals[]" value="6">
            <label for="optionals">Vista Mare</label>
          </div>
        </div>
      </div>
      <div class="filters_tendine">
        <div class="tendine">
          <p>Raggio di ricerca</p>
          <select id="distance" class="filter" name="radius" id="radius">
            <option value="20">20 km</option>
            <option value="50">50 km</option>
            <option value="100">100 km</option>
          </select>
        </div>
        <div class="tendine">
          <label for="rooms">Numero di stanze</label>
          <input class="filter" type="number" name="rooms" id="rooms">
        </div>
        <div class="tendine">
          <label for="rooms">Letti <br> necessari</label>
          <input class="filter" type="number" name="beds" id="beds">
        </div>
      </div>
    </div>
  </div>
        {{-- <script type="text/javascript" src="{{ asset('js/algolia.js') }}"></script> --}}
        {{-- APPARTAMENTI IN EVIDENZA --}}
        {{-- <div class="sponsored_container">
          <div class="container">
            <h2>In Evidenza</h2>
          </div>
          <div class="container-fluid">
            <div class="row justify-content-center">
              @foreach ($apartmentWithSponsor as $apartment)
                <div class="card" style="width: 18rem; margin: 15px 30px;">
                  <img class="card-img-top" src="{{ $apartment -> image }}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">{{ $apartment -> title }}<i class="fas fa-certificate" style="color: yellow; margin-left: 3px;"></i> <small>Sponsorizzato</small></h5>
                    <p class="card-text">{{ $apartment -> description }}</p>
                    <a href="{{ route('show', $apartment -> id) }}" class="btn btn-warning">Vedi Appartamento</a>
                  </div>
                </div>
              @endforeach
            </div>
          </div> --}}
          {{-- @include('components.carousel') --}}
    <img class="logobnb-loading" src="{{asset('img/LOGO_UNO_MOD.png')}}" alt="logo_boolbnb">
    <div class="container">
      <div class="row justify-content-center container-apartments">
        @if(count($apartments_no_sponsor) < 1)
          <div class="alert alert-danger text-center" role="alert">
            <strong class="text-danger">Nessun risultato trovato</strong>
          </div>
        @else
          <div class="col-lg-12">
            @foreach ($apartments_no_sponsor as $nosponsorApt)
              <div class="cartina">
                <div class="cartina_left">
                  <div class="img">
                    <img class="card-img-right flex-auto d-none d-md-block"
                    @if(stristr($nosponsorApt -> image, 'http'))
                      src=" {{ asset($nosponsorApt -> image) }}"
                    @else
                      src="{{ asset('storage/' . $nosponsorApt -> image) }}"
                    @endif
                    alt="cartina image cap">
                  </div>
                </div>

                <div class="cartina_center">
                  <h3 class="mb-0">
                    <a class="text-dark" href="{{ route('show', $nosponsorApt -> id) }}"> {{ $nosponsorApt -> title }} </a>
                  </h3>
                <div class="detail-home">
                  <div class="sticker-detail">
                    <p><i class="fas fa-bed"></i> <span class="number-of-elements"> {{$nosponsorApt -> beds}} </span> posti letto</p>
                  </div>
                  <div class="sticker-detail">
                    <p><i class="fas fa-door-open"></i> <span class="number-of-elements"> {{$nosponsorApt -> room_number}}</span> stanze</p>
                  </div>
                  <div class="sticker-detail">
                    <p class="bagni"> <i class="fas fa-bath"></i>  <span class="number-of-elements"> {{$nosponsorApt -> bath_number}} </span> bagni</p>
                  </div>
                  <hr class="cartina_hr">
                  <b> <p>{{ $nosponsorApt -> price }} € </b> a notte</p>
                </div>

                </div>

                <div class="cartina_right">
                  <div class="cuoricino-container
                  @foreach ($apartments as $apartment)
                    @foreach($apartment -> preferences as $preference)
                      @if ($nosponsorApt -> id == $apartment -> id)
                        @if($preference -> user_id == Auth::id())
                          favorite
                        @endif
                      @endif
                    @endforeach
                  @endforeach
                  "
                  data-id="{{$nosponsorApt -> id}}">
                  </div>
                  <div class="bottone">
                    <a href="{{ route('show', $nosponsorApt -> id) }}" class="btn bnb_btn">Dettagli</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
      </div>
    </div>
      @endif
      <div class="row justify-content-center">
        {{ $apartments_no_sponsor -> links() }}
      </div>
    </div>
  @endsection
  <input id="search-lat" type="hidden" name="search-lat" value="{{ $latitude }}">
  <input id="search-lon" type="hidden" name="search-lon" value="{{ $longitude }}">


@section('script')
    <!-- INIZIO HANDLEBARS -->
    <script id="entry-template" type="text/x-handlebars-template">
      <div class="cartina">
        <div class="cartina_left">
          <div class="img">
            <img class="card-img-right flex-auto d-none d-md-block"
              src="storage/@{{img}}"
              alt="cartina image cap">
          </div>
        </div>

        <div class="cartina_center">
          <h3 class="mb-0">
            <a class="text-dark" href="/show/@{{ id }}"> @{{title}} </a>
            <span>
              {{-- <strong class="d-inline-block mb-2 text-warning"><i class="fab fa-stripe-s"></i></strong> --}}
            </span>
          </h3>
          <div class="detail-home">
            <div class="sticker-detail">
              <p><i class="fas fa-bed"></i> <span class="number-of-elements"> @{{beds}} </span> posti letto</p>
            </div>

            <div class="sticker-detail">
              <p><i class="fas fa-door-open"></i> <span class="number-of-elements"> @{{rooms }}</span> stanze</p>
            </div>

            <div class="sticker-detail">
              <p class="bagni"> <i class="fas fa-bath"></i>  <span class="number-of-elements"> @{{bath}} </span> bagni</p>
            </div>
            <hr class="cartina_hr">
            <p> @{{price}} € - Totale</p>
          </div>
        </div>
        <div class="cartina_right">
          <div class="cuoricino-container @{{favorite}}" data-id="@{{id}}">
            @{{{icon}}}
          </div>
          <div class="bottone">
            <a href="/show/@{{ id }}" class="btn bnb_btn">Dettagli</a>
          </div>
        </div>
      </div>
    </script>
    <!-- FINE HANDLEBARS -->
    <script src="{{ asset('js/tomtom_search.js') }}"></script>

    <script>
      $('.cuoricino-container').each(function() {
        if ($(this).hasClass('favorite')) {
          $(this).html('<i class="fas fa-heart cuoricino full"></i>');
        } else {
            $(this).html('<i class="far fa-heart cuoricino empty"></i>');
        }
      });
      //filtro
      var optionals = [];

      // handlebars
      var source = $('#entry-template').html();
      var template = Handlebars.compile(source);

      $('.filter').change(function (e) {

          e.preventDefault();
          optionals = [];

          $('input[name="optionals[]"]:checked').each(function () {

              optionals.push($(this).val());
          })

          var radius = $('#distance').val();
          var rooms = $('#rooms').val();
          var beds = $('#beds').val();
          var lat = $('#search-lat').val();
          var lon = $('#search-lon').val();
          $('.container-apartments').html('');
          //
          $('.main_content').css('opacity', '.4');
          $('.logobnb-loading').show();
          $.ajax({
              method: "GET",
              url: "http://localhost:8000/api/search/filter",
              data: {
                  optionals: optionals,
                  latitude: lat,
                  longitude: lon,
                  distance: radius,
                  beds: beds,
                  rooms: rooms
              },
              dataType: "json",
              success: function (response) {
                console.log(response)
                var data = response.data;
                $('.main_content').css('opacity', '1');
                $('.logobnb-loading').hide();
                if (data.length > 0) {
                  @auth
                    var allApartments = @json($apartments);
                    var allApartmentsPreferences = response.preferences;
                    var userId = {{ auth() -> user() -> id }};
                    var icon;

                    var apartmentsWithPreferences = [];
                    var apartmentsWithPreferencesUserID = [];

                    for (var preference of allApartmentsPreferences) {
                      for (var apartmentNotFilter of allApartments) {
                        if (apartmentNotFilter.id == preference.apartment_id) {
                          apartmentsWithPreferences.push(preference);
                        }
                      }
                    }

                    for (var apartmentWithPref of apartmentsWithPreferences) {
                      if (apartmentWithPref.user_id == userId) {
                        apartmentsWithPreferencesUserID.push(apartmentWithPref);
                      }
                    }

                    for (var i = 0; i < data.length; i++) {

                      var apartment = data[i];
                      var favorite = '';

                      for (var pref of apartmentsWithPreferencesUserID) {
                        if (apartment.id == pref.apartment_id) {
                          favorite = 'favorite';
                        }
                      }

                      if (favorite == 'favorite') {
                        icon = '<i class="fas fa-heart cuoricino full"></i>';
                      } else {
                        icon = '<i class="far fa-heart cuoricino empty"></i>';
                      }

                      var context = {
                          title: apartment.title,
                          beds: apartment.beds,
                          rooms: apartment.room_number,
                          bath: apartment.bath_number,
                          price: apartment.price,
                          img: apartment.image,
                          id: apartment.id ,
                          favorite: favorite,
                          icon: icon
                      }

                      $('.container-apartments').append(template(context));

                    }

                  @else
                    for (var j = 0; j < data.length; j++) {
                      var apartment = data[j];

                      var context2 = {
                          title: apartment.title,
                          beds: apartment.beds,
                          rooms: apartment.room_number,
                          bath: apartment.bath_number,
                          price: apartment.price,
                          img: apartment.image,
                          id: apartment.id ,
                          favorite: '',
                          icon: '<i class="far fa-heart cuoricino empty"></i>'
                      };

                      $('.container-apartments').append(template(context2));

                    }
                  @endauth

                } else {
                    $('.container-apartments').append('<div class="alert alert-danger text-center" role="alert">' + '<strong class="text-danger">' + 'Nessun risultato trovato' + '</strong>' + '</div>');
                }
              }
          });
      });


      $('.container-apartments').on('click', '.cuoricino-container', function(){
        @auth
          var selfElement = $(this);
          var idApt = $(this).data('id');
          var userID = {{Auth::id()}};

          if (selfElement.hasClass('favorite')) {

            $.ajax({
              method: "POST",
              url: 'http://localhost:8000/api/preferences_apt/remove',
              data: {
                  id: idApt,
                  idUser: userID
              },
              success: function (response) {
                selfElement.removeClass('favorite');
                selfElement.html('<i class="far fa-heart cuoricino empty"></i>');
              },
              error: function(err) {
                console.log(err);
              }
            });
          } else {

            $.ajax({
                method: "POST",
                url: 'http://localhost:8000/api/preferences_apt',
                data: {
                    id: idApt,
                    idUser: userID
                },
                success: function (response) {
                  selfElement.addClass('favorite');
                  selfElement.html('<i class="fas fa-heart cuoricino full"></i>');
                },
                error: function(err) {
                  console.log(err);
                }
            });
          }

        @else
          window.location.href="{{route('register')}}" ;
      @endauth
      });

  </script>
@endsection
