@extends('layouts.main_layout')

@section('content')
  @if (session('success'))
      <div class="alert alert-success text-center" role="alert">
        <strong>{{ session('success') }}</strong>
      </div>
  @elseif(session('error'))
      <div class="alert alert-danger text-danger alert-error" role="alert">
        <strong>{{ session('error') }}</strong>
      </div>
  @endif

  {{-- HOME - JUMBOTRON --}}
  <div class="jumbotron jumbotron-fluid">
    <div class="overlay"></div>
      <div class="container container-input center_home">
        <div class="row justify-content-center">
          <h1 class="display-4">Home is where love resides<span style="color: rgb(225,60,60);">.</span></h1>
        </div>
        {{-- JUMBOTRON - SEARCHBAR --}}
        <div class="input-group">
          <div class="filter">

            {{-- SEARCH - FORM --}}
            <form id="form-search" action="{{route('search')}}" method="get">
              @csrf
              @method('GET')
              <div class="form-group">
                <div class="row flex-nowrap justify-content-space-between">
                  {{-- BARRA DI RICERCA --}}
                  <input type="search" class="form-control" id="home-search-bar"  name='search' placeholder="Cerca Località" value="">
                  {{-- SUBMIT --}}
                  <input type="submit" id="submit-home" class="btn bnb_btn" value='Cerca'>

                  <input type="hidden" name="lat" id="hidden-lat" value="">
                  <input type="hidden" name="lon" id="hidden-lon" value ="">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>

  {{-- HOME - SECTION-NORACISM' --}}
  <div class="container-fluid" style="margin-bottom: 2rem;">
    <div class="row">
      <div class="col-md-10 offset-1">
        <div class="no_racism">
          {{-- SPOT VUOTO --}}
          <div class="row" style="height: 120px;"><div class="col-md-12"></div></div>
          <div class="row">
            <div class="col-md-5" style="margin-left: 30px;">
              <h2>
                <b>
                  Noi stiamo con <br> #BlackLivesMatter
                </b>
              </h2>
              <h5>
                Crediamo in un futuro fondato sull’inclusione e il rispetto reciproco, nel quale il razzismo non ha posto.
              </h5>
            </div>
          </div>
        </div>
      </div>
      {{-- FIX OFFSET --}}
      <div class="col-md-1"></div>
    </div>
  </div>

  {{-- HOME - MAIN-CONTENT --}}
  <div class="container-fluid">
    <div class="row justify-content-around">
      {{-- HOME - LEFT - CONTENT --}}
      <div class="col-lg-3 col-md-12">
        <div class="aside_left">
          <div class="aside_content">
            <div class="aside_title">
              <h1 id="noborder">Perché affittare su Boolbnb?</h1>
            </div>
            <div class="aside_p">
              <p>Indipendentemente dal tipo di alloggio o stanza che vuoi condividere, BoolBnB rende semplice e sicuro ospitare dei viaggiatori. Spetta a te il controllo completo della disponibilità, dei prezzi, delle regole della casa e della modalità di interazione con gli ospiti.</p>
            </div>
            <div class="aside_img">
              <img src="{{ asset('img/img2-banner.jpg')}}" alt="">
            </div>
          </div>
          <div class="aside_content">
            <div class="aside_title">
              <h1>Con noi sei al sicuro</h1>
            </div>
            <div class="aside_p">
              <p>Per tenere al sicuro te, il tuo alloggio e le tue cose, tuteliamo ogni prenotazione con una protezione in caso di danni alla casa di 1.000.000 USD e con un'altra assicurazione di pari valore contro gli incidenti.</p>
            </div>
            <div class="aside_img">
              <img src="{{ asset('img/img-banner.jpg')}}" alt="">
            </div>
          </div>
          <div class="aside_content">
            <div class="aside_title">
              <h1>Decidi il tuo prezzo</h1>
            </div>
            <div class="aside_p">
              <p>Hai sempre la possibilità di scegliere il prezzo. Serve aiuto? Abbiamo degli strumenti per aiutarti a soddisfare la domanda della tua zona.</p>
            </div>
            <div class="aside_img">
              <img src="{{ asset('img/img3-banner.jpg')}}" alt="">
            </div>
          </div>
          <div class="aside_content">
            <div class="aside_title">
              <h1>Pagamenti rapidi</h1>
            </div>
            <div class="aside_p">
              <p>Siamo cinque scappati di casa non sappiamo ancora come farti pagare</p>
            </div>
            <div class="aside_img">
              <img src="{{ asset('img/img5-banner.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>

      {{-- HOME - RIGHT - CONTENT --}}
      <div class="col-lg-7 col-md-12 d-flex  flex-column align-items-center">
        {{-- CREAZIONE cartina - SPONSORED ---------------------------------------------------}}
      @empty (!$apartments_sponsor)
        @foreach ($apartments_sponsor as $apartment)
        <div class="cartina sponsored">
          <div class="cartina_left">
            <div class="img">
              <div class="created-at-stick">
                <h6 id="created-at"> {{ $apartment -> created_at -> diffForHumans() }} </h6>
              </div>
              <img class="card-img-right flex-auto d-none d-md-block"
              @if(stristr($apartment -> image, 'http'))
                src=" {{ asset($apartment -> image) }}"
              @else
                src="{{ asset('storage/' . $apartment -> image) }}"
              @endif
              alt="cartina image cap">
            </div>
          </div>

          <div class="cartina_center">
            <h3 class="mb-0">
              <a class="text-dark" href="{{ route('show', $apartment -> id) }}"> {{ $apartment -> title }} </a>
              <span>
                {{-- <strong class="d-inline-block mb-2 text-warning"><i class="fab fa-stripe-s"></i></strong> --}}
              </span>
            </h3>
            <h6 class="home-of">di {{$apartment -> user -> name}} {{$apartment -> user -> lastName}}</h6>
            <div class="detail-home">
              <div class="sticker-detail">
                <p><i class="fas fa-bed"></i> <span class="number-of-elements"> {{$apartment -> beds}} </span> posti letto</p>
              </div>

              <div class="sticker-detail">
                <p><i class="fas fa-door-open"></i> <span class="number-of-elements"> {{$apartment -> room_number}}</span> stanze</p>
              </div>

              <div class="sticker-detail">
                <p class="bagni"> <i class="fas fa-bath"></i>  <span class="number-of-elements"> {{$apartment -> bath_number}} </span> bagni</p>
              </div>
              <hr class="cartina_hr">
              <div class="sticker-details">
                <p class="total_prc"><b> {{ $apartment -> price }} €</b> a notte</p>
              </div>
            </div>
          </div>
          @php
            $preferences = $apartment -> preferences;
          @endphp
          <div class="cartina_right">
            <div class="cuoricino-container
            @foreach($preferences as $preference)
              @if($preference -> user_id == Auth::id())
                favorite
              @endif
            @endforeach
            "
            data-id="{{$apartment -> id}}">
            </div>
            <div class="bottone">
              <a href="{{ route('show', $apartment -> id) }}" class="btn bnb_btn">Dettagli</a>
            </div>
          </div>
        </div>

        {{-- FIX OFFSET ---------------------------------------------------------------}}
        @endforeach
          {{-- PAGINATE - SPONSORED --}}
          <div class="row justify-content-center mt-50 ">
            {{ $apartments_sponsor -> links() }}
          </div>
      @endempty
        {{-- FEATURES --}}
        {{-- FIRST ENDBOX --}}
        <div class="endbox1">
          <div class="endtext">
            <h1>Crea la tua esperienza</h1>
            <p>Tutte le esperienze partono dai nostri standard di qualità: competenza, accesso e interazione. Tuttavia, pensa anche a come interagire con gli ospiti online e riduci al minimo ciò di cui potrebbero aver bisogno per partecipare. Quando hai un'idea, avvia la procedura di invio della proposta.</p>
          </div>
          <div class="endimg">
            <img width="100%" src="{{ asset('img/img-home.jpg')}}" alt="">
          </div>
        </div>
        {{-- SECOND ENDBOX --}}
        <div class="endbox2">
          <div class="endimg">
            <img width="100%" src="{{ asset('img/img2-home.jpg')}}" alt="">
          </div>
          <div class="endtext">
            <h1>Configura tutto e inizia a offrire l'esperienza</h1>
            <p>Nell'attesa, puoi scegliere un luogo che rappresenti te e la tua attività, oltre a iniziare a pianificare la configurazione della webcam, l'illuminazione e il sonoro. Puoi anche far pratica con Zoom, una piattaforma per conferenze. Non preoccuparti: prima che tu inizi a offrire l'esperienza, condivideremo con te tante risorse per consentirti di avere successo.</p>
          </div>
        </div>
      </div>
      {{-- FIX OFFSET --}}
      {{-- <div class="col-lg-1"></div> --}}
    </div>
  </div>
<button type="button" id="scrolled-button" class="btn btn-sm rounded">
  <i class="fas fa-angle-up"></i>
</button>



@endsection

@section('script')
    <script>
      $('.cuoricino-container').each(function() {
        if ($(this).hasClass('favorite')) {
          $(this).html('<i class="fas fa-heart cuoricino full"></i>');
        } else {
            $(this).html('<i class="far fa-heart cuoricino empty"></i>');
        }
      });

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
                  console.log(response);
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
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
    <script src="{{ asset('js/tomtom_home.js') }}"></script>
@endsection
