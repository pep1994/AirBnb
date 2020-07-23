@extends('layouts.main_layout')

@section('content')
  <div class="main_content">
    <div class="overlay-image-show">
    </div>
    <div class="apartment">
      @if (session('success'))
        <div class="alert alert-success text-center" role="alert">
          <strong>{{ session('success') }}</strong>
        </div>
      @elseif(session('error'))
        <div class="alert alert-danger alert-error text-danger" role="alert">
          <strong>{{ session('error') }}</strong>
        </div>
      @endif

      {{-- IMMAGINI APPARTAMENTO ---------------------------------------------------------}}
      <div class="section1">
        <div class="apartment-img">
            <div class="img-principale">
              <img
              @if(stristr($apartment -> image, 'http'))
                  src=" {{ asset($apartment-> image) }}"
              @else
                  src="{{ asset('storage/' . $apartment-> image) }}"
              @endif
              alt="{{ $apartment -> title }}">
            </div>
            @if (count($photos) > 0)
              <div class="img-secondarie">
                @foreach ($photos as $photo)
                <div class="img-scnd">
                    <img
                    @if(stristr($photo -> img_path, 'http'))
                        src=" {{ asset($photo -> img_path) }}"
                    @else
                        src="{{ asset('storage/' . $photo -> img_path) }}"
                    @endif
                    alt="{{ $apartment -> title }}">
                  </div>
                @endforeach
            @endif
        </div>
      </div>
    </div>

      {{-- DETTAGLI APPARTAMENTO ------------------------------------------------------------}}
      <div class="section2">
        <div class="apartment-description">
          {{-- cuoricino --}}
          <div class="cuoricino-container
            @foreach($apartment -> preferences as $preference)
              @if($preference -> user_id == Auth::id())
                favorite
              @endif
            @endforeach
            "
            data-id="{{$apartment -> id}}">
          </div>

          <div class="titleprice">
            <h1>{{ $apartment -> title }}  <span> di  {{ $apartment ->user -> name}} {{ $apartment -> user-> lastName}} </span></h1>
            <div class="separatore"></div>
            <div class="prezzo">
              <h6>{{ $apartment -> price }} €</h6>
            </div>
          </div>
          <p>{{ $apartment -> description }} </p>
          <b><i class="fas fa-map-marker-alt"></i> in {{ $apartment -> address }}, {{ $apartment -> civicNumber}} - {{ $apartment -> city }} </b>
          @if ($apartment-> user-> id == Auth::id())
            <div class="pannello-utente">
              <h2>Pannello Utente</h2>
              <div class="bottoni">
                  <div class="">
                    <a href="{{ route('edit', $apartment -> id)}}"><i class="fas fa-edit"></i></a> <br>
                    <h6>Edit </h6>
                  </div>
                  <div class="">
                    <a href="{{ route('stats', $apartment -> id)}}"><i class="fas fa-poll"></i></a> <br>
                    <h6>Stats </h6>
                  </div>
                  <div class="">
                    <a href="{{ route('show_msg', $apartment -> id)}}"><i class="fas fa-envelope"></i></a> <br>
                    <h6>Message</h6>
                  </div>
                  @if (count($apartment -> sponsors) < 1)
                    <div class="">
                      <a href="{{ route('sponsor', $apartment -> id)}}"><i class="fas fa-star"></i></a>
                      <h6>Sponsorize</h6>
                    </div>
                  @else
                    <p>
                      La tua sponsorizzazione
                      @foreach ($apartment -> sponsors as $sponsorType)
                        <b>{{$sponsorType -> type }}</b>
                      @endforeach
                      finirà il
                      @foreach ($expireData as $val)
                        {{$val -> expire_data }}
                      @endforeach
                    </p>
                  @endif
              </div>
            </div>
          @endif
        </div>

        <div class="apartment-services">
          <ul class="servizi">
            <li><i class="fas fa-door-open"></i> {{ $apartment -> room_number }} stanze</li>
            <li><i class="fas fa-bed"></i>  {{ $apartment -> beds }} letti</li>
            <li><i class="fas fa-toilet"></i> {{ $apartment -> bath_number}} bagni</li>
            <li><i class="fas fa-vector-square"></i> {{ $apartment -> area }} mq</li>
          </ul>
          <ul class="optional">
            <li>
              @if (count($apartment -> optionals) < 1)
                <h2>No optionals</h2>
                @else
                  <h2>Optionals</h2>
                  <ul>
                    @foreach ($optionals as $optional)
                    <li>
                      {{ $optional -> optional }}
                    </li>
                    @endforeach
                  </ul>
              @endif
            </li>
          </ul>


        </div>
      </div>


      {{-- MAPPA + MESSAGGIO --------------------------------------}}

      {{-- ZONA MAPPA --}}

      <div class="section3">
        {{-- marcatore personalizzato --}}

        @if ($apartment->user->id == Auth::id())
          <div class="apartment-location-user">
            <div id='map'></div>
            <input type="hidden" id="latitude" value="{{$apartment -> latitude}}"></input>
            <input type="hidden" id="longitude" value="{{$apartment -> longitude}}"></input>
          </div>
        @else
          <div class="apartment-location-public">
            <div id='map'></div>
            <input type="hidden" id="latitude" value="{{$apartment -> latitude}}"></input>
            <input type="hidden" id="longitude" value="{{$apartment -> longitude}}"></input>
          </div>
        @endif


        {{-- ZONA MAIL --}}
        @if ($apartment->user->id !== Auth::id())
        <div class="apartment-mail">
          <h2>Richiedi informazioni</h2>
          <form action="{{ route('informations', $apartment -> id) }}" method="post" class="formarco">
            @csrf
            @method('POST')
            <input type="email" name="email" placeholder="Inserisci la tua mail" value="
            @auth
            {{ auth()->user()->email }}
            @endauth
            "class="@error('email') is-invalid @enderror">
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            <textarea name="informations" placeholder="Salve, la contatto in merito all'appartamento...." rows="8" cols="50" value=" {{ old('informations') }}" class="@error('informations') is-invalid @enderror"></textarea>
            @error('informations')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            <button type="submit" name="invia">Invia</button>
          </form>
        </div>
        @endif
      </div>
    </div>
  </div>
  @endsection


  @section('script')
    <script type="text/javascript" src="{{ asset('/js/tomtom_show.js') }}"></script>

    <script>
        if ($('.cuoricino-container').hasClass('favorite')) {
          $('.cuoricino-container').html('<i class="fas fa-heart cuoricino full"></i>');
        } else {
            $('.cuoricino-container').html('<i class="far fa-heart cuoricino empty"></i>');
        }

        $('.cuoricino-container').click(function(){
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
