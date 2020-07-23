@extends('layouts.main_layout')

@section('content')

<div class="main_content">
  <div class="overlay-image">
  </div>
    <div class="container">
      <h2 class="text-center mb-5">Modifica il tuo appartamento</h2>
      <div class="row">
        <div class="col-md-10 mx-auto">
          <form action=" {{ route('update', $apartment -> id )}} " method="post" enctype="multipart/form-data" role="form">
            @method('POST')
            @csrf

            <div class="form-group row">
              <div class="col-md-12">
                <label for="title">Titolo</label>
                <input type="text" required name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Titolo dell'appartamento" value="{{ $apartment -> title }}">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="form-group row">

              <div class="col-md-3">
                <label for="address">Indirizzo</label>
                <input type="text" required name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Indirizzo" value="{{ $apartment -> address }}">
                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="col-md-3">
                <label for="address">Numero Civico</label>
                <input type="number" required name="civicNumber" id="civicNumber" class="form-control @error('civicNumber') is-invalid @enderror" placeholder="Indirizzo" value="{{ $apartment -> civicNumber }}">
                @error('civicNumber')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="col-md-3">
                <label for="city">Città</label>
                <input type="text" required name="city" id="city" class="form-control @error('city') is-invalid @enderror" placeholder="Citta" value="{{ $apartment -> city }}">
                @error('city')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="col-md-3">
                <label for="postCode">Codice Postale</label>
                <input type="number" required name="postCode" id="postCode" class="form-control @error('postCode') is-invalid @enderror" placeholder="Citta" value="{{ $apartment -> postCode }}">
                @error('postCode')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <input type="hidden" id="latitude-edit" name="lat" value="{{ $apartment -> latitude }}">
            <input type="hidden" id="longitude-edit" name="lon" value="{{ $apartment -> longitude }}">

            <div class="form-group row">
              <div class="col-md-4">
                <label for="room_number">Numero di stanze</label>
                <input type="number" required name="room_number" id="room_number" class="form-control  @error('room_number') is-invalid @enderror" value="{{ $apartment -> room_number }}">
                @error('room_number')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="col-md-4">
                <label for="beds">Posti letto</label>
                <input type="number" required name="beds" id="beds" class="form-control  @error('beds') is-invalid @enderror" value="{{ $apartment -> beds }}">
                @error('beds')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="col-md-4">
                <label for="bath_number">Numero di bagni</label>
                <input type="number" required name="bath_number" id="bath_number" class="form-control  @error('bath_number') is-invalid @enderror" value="{{ $apartment -> bath_number }}">
                @error('bath_number')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <label for="area">Area</label>
                <input type="number" required name="area" id="area" class="form-control @error('area') is-invalid @enderror" value="{{ $apartment -> area }}">
                @error('area')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="col-md-6">
                <label for="price">Prezzo in €</label>
                <input type="number" required name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ $apartment -> price }}">
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <label for="image">Modifica copertina</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="col-md-6 d-flex justify-content-flex-start align-items-center">
                  @foreach ($apartment -> photos as $photo)
                    <div class="img_card mr-3">
                      <img
                        @if(stristr($photo -> img_path, 'http'))
                            src=" {{ asset($photo -> img_path) }}"
                        @else
                            src="{{ asset('storage/' . $photo -> img_path) }}"
                        @endif
                        width="60" height="60" alt="{{ $apartment -> title }}">
                        <div class="text-center mt-2">
                          <a href="{{ route('delete_img', $photo -> id )}}"><i class="fas fa-minus minus text-danger"></i></a>
                        </div>
                    </div>
                  @endforeach
                  @if (count($apartment -> photos) < 4)
                    <div class="img_card" style="width: 100%;">
                      <div class="image-upload">
                        @if (count($apartment -> photos) < 1)
                            <label for="file-input">
                              Foto appartamento
                            </label>
                            <input id="file-input" name="photos[]" id="photos" class="form-control  @error('photos') is-invalid @enderror" type="file" multiple/>
                          @else
                            <label for="file-input">
                              <i class="far fa-plus-square plus text-success"></i>
                            </label>
                            <input id="file-input" name="photos[]" id="photos" class="form-control d-none  @error('photos') is-invalid @enderror" type="file" multiple/>
                        @endif
                        @error ('photos')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                  @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                {{-- IMMAGINE COPERTINA APPARTAMENTO --}}
                <div class="img_card mt-3">
                  <img
                      @if(stristr($apartment -> image, 'http'))
                          src=" {{ asset($apartment -> image) }}"
                      @else
                          src="{{ asset('storage/' . $apartment -> image) }}"
                      @endif
                      width="100" height="80" alt="{{ $apartment -> title }}">
                </div>
              </div>
              {{-- FOTO APPARTAMENTO --}}
              <div class="col-md-6">

              </div>
            </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <div class="form-check">
                    <label>Optionals:</label>
                  </div>
                  @foreach ($optionals as $optional)
                    <div class="form-check form-check-inline">
                      <input type="checkbox" name="optionals[]" value="{{ $optional -> id}}"
                        @foreach ($apartment -> optionals as $apartmentWithOptional)
                          @if ($optional -> id == $apartmentWithOptional -> id)
                            checked
                          @endif
                        @endforeach
                      >
                      <label for="optionals[]">{{ $optional -> optional}}</label>
                    </div>
                  @endforeach
                </div>
              </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="description">Descrizione appartamento</label>
                <textarea rows="4" name="description" required id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Descrizione"> {{ $apartment -> description }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <button type="submit" class="btn">Modifica</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('js/checkInput.js') }}"></script>
  <script src="{{ asset('js/edit.js') }}"></script>
@endsection
