@extends('layouts.main_layout')
@section('content')
    @if (session('success'))
        <div class="alert alert-success text-center" role="alert">
        <strong>{{ session('success') }}</strong>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-error text-danger" role="alert">
        <strong>{{ session('error') }}</strong>
        </div>
    @endif
    <div class="main_content content-myapartments">
      <div class="container">
        @empty (!$apartmentWithSponsor)
                <table class="table table-sponsor mb-5">
                    <thead style="background: #FCBA32; color: #FFF;">
                        <tr>
                            <th scope="col">Copertina</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Città</th>
                            <th scope="col">Sponsor</th>
                            <th scope="col">Data inserimento</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apartmentWithSponsor as $apartment)
                            <tr>
                                <td>
                                    <img width="150px"
                                    @if(stristr($apartment -> image, 'http'))
                                        src=" {{ asset($apartment -> img_path) }}"
                                    @else
                                        src="{{ asset('storage/' . $apartment -> image) }}"
                                    @endif
                                    alt="{{ $apartment->title }}">
                                </td>
                                <td>{{ $apartment->title }}</td>
                                <td>{{ $apartment->city }}</td>
                                <td>
                                    @foreach ($apartment->sponsors as $sponsor)
                                        {{ $sponsor->type }}
                                    @endforeach
                                </td>
                                <td>
                                    {{ $apartment->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    <a href="{{ route('edit', $apartment->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('show', $apartment->id) }}" class="btn btn-success"><i class="fas fa-info-circle"></i></a>
                                    <a href="{{ route('delete', $apartment->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        @endempty
        @empty (!$apartmentWithoutSponsor)
            <table class="table table-no-sponsor">
                <thead class="grey" style="background: rgb(225, 60, 60); color: #FFF;">
                <tr>
                    <th scope="col">Copertina</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Città</th>
                    <th scope="col">Sponsor</th>
                    <th scope="col">Data inserimento</th>
                    <th scope="col">Azioni</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($apartmentWithoutSponsor as $apartment)
                        <tr>
                            <td>
                                <img width="150px"
                                @if(stristr($apartment -> image, 'http'))
                                    src=" {{ asset($apartment -> img_path) }}"
                                @else
                                    src="{{ asset('storage/' . $apartment -> image) }}"
                                @endif
                                alt="{{ $apartment->title }}">
                            </td>
                            <td> {{$apartment -> title}}</td>
                            <td> {{$apartment -> city}}</td>
                            <td>
                                <a href="{{ route('sponsor', $apartment->id) }}" class="btn btn-warning">
                                    <i class="fas fa-star" style="color: white;"></i>
                                </a>
                            </td>
                            <td>{{$apartment -> created_at -> diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('edit', $apartment->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('show', $apartment->id) }}" class="btn btn-success"><i class="fas fa-info-circle"></i>
                                </a>
                                <a href="{{ route('delete', $apartment->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endempty
        @if (count($apartmentWithSponsor) > 0 || count($apartmentWithoutSponsor) > 0)
          <div class="row justify-content-center mt-5">
            <a type="button" style="background-color: rgb(225, 60, 60); color: white;" class="btn btn-lg" href="{{ route('create') }}">Inserisci Appartamento</a>
          </div>
        @endif
            {{-- @empty(!$apartmentWithSponsor)
                <div class="row justify-content-center">
                    @foreach ($apartmentWithSponsor as $apartment)
                        <div class="card text-white bg-warning mb-3" style="width: 18rem;">
                            <img
                            @if(stristr($apartment -> image, 'http'))
                                src=" {{ asset($apartment -> img_path) }}"
                            @else
                                src="{{ asset('storage/' . $apartment -> image) }}"
                            @endif
                            alt="{{ $apartment->title }}" class="card-img-top">
                            <div class="card-body">
                            <h5 class="card-title">{{ $apartment->title }}</h5>
                            <a href="{{ route('edit', $apartment->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('show', $apartment->id) }}" class="btn btn-success">Dettagli</a>
                            <a href="{{ route('delete', $apartment->id) }}" class="btn btn-danger">Elimina appartamento</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endempty

            @empty(!$apartmentWithoutSponsor)
                <div class="row justify-content-center">
                    @foreach ($apartmentWithoutSponsor as $apartment)
                        <div class="card text-white bg-info mb-3" style="width: 18rem;">
                            <img
                            @if(stristr($apartment -> image, 'http'))
                                src=" {{ asset($apartment -> img_path) }}"
                            @else
                                src="{{ asset('storage/' . $apartment -> image) }}"
                            @endif
                            alt="{{ $apartment->title }}" class="card-img-top">
                            <div class="card-body">
                            <h5 class="card-title">{{ $apartment->title }}</h5>
                            <div class="row">
                              <a href="{{ route('edit', $apartment->id) }}" class="btn btn-primary">Edit</a>
                              <a href="{{ route('show', $apartment->id) }}" class="btn btn-success">Dettagli</a>
                              <a href="{{ route('delete', $apartment->id) }}" class="btn btn-danger">Elimina appartamento</a>
                            </div>
                            </div>
                        </div>
                    @endforeach
                        <a href="{{ route('create') }}" type="button" class="btn btn-small">Inserisci appartamento</a>
                    </div>
                </div>
            @endempty --}}

      </div>
        @if (count($apartmentWithSponsor) < 1 && count($apartmentWithoutSponsor) < 1)
            <div class="container">
                <div class="row mb-5">
                    <div class="col-sm-12">
                        <h1 class="text-center font-weight-bold" style="color: #000;">
                            Perchè inserire un appartamento?
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="mb-3 font-weight-bold">
                            Pubblica il tuo annuncio gratuitamente
                        </h4>
                        <p>
                            Pubblica qualsiasi alloggio senza addebiti di registrazione, da un salotto condiviso a una seconda casa e a tutto quello che c'è nel mezzo.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h4 class="mb-3 font-weight-bold">
                            Stabilisci come vuoi affittare
                        </h4>
                        <p>
                            Scegli le date, i prezzi e i requisiti per gli ospiti. Siamo sempre a disposizione per aiutarti.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h4 class="mb-3 font-weight-bold">
                            Accogli il tuo primo ospite
                        </h4>
                        <p>
                            Una volta che il tuo annuncio viene pubblicato, gli ospiti idonei potranno contattarti. Puoi inviare loro delle domande prima del soggiorno.
                            Scopri come iniziare ad affittare
                        </p>
                    </div>
                </div>
                <div class="row my-apartments">
                    <div class="col-sm-12">
                        <div class="card bg-dark text-white">
                            <img class="card-img" src="{{ asset('img/img-myapartments.jpg') }}" alt="Card image">
                            <div class="overlay"></div>
                            <div class="card-img-overlay">
                                <a href="{{ route('create') }}" type="button" class="btn btn-large">Inserisci il tuo appartamento</a>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/login.js') }}"></script>
@endsection
