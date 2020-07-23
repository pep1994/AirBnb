@extends('layouts.main_layout')

@section('content')
  <div class="main_content">
    <div class="container">
      <h2 class="text-center">Inserisci il tuo appartamento</h2>
      <div class="row">
        <div class="col-md-10 mx-auto">
          <form action="{{ route('store_apartment') }}" method="post" enctype="multipart/form-data" role="form">
            @method('POST')
            @csrf

            <div class="form-group row">
              <div class="col-sm-12">
                <label for="title">Titolo</label>
                <input type="text" required name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Titolo dell'appartamento" value="{{ old('title') }}">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div div class="form-group row">

                <div class="col-sm-3">
                  <label for="address">Indirizzo</label>
                  <input type="text" required name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Indirizzo" value="{{ old('address') }}">
                  @error('address')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <input type="hidden" id="latitude-create" name="lat" value="{{ old('lat') }}">
                <input type="hidden" id="longitude-create" name="lon" value="{{ old('lon') }}">

                <div class="col-sm-3">
                  <label for="civicNumber">Numero Civico</label>
                  <input type="number" required name="civicNumber" id="civicNumber" class="form-control @error('civicNumber') is-invalid @enderror" placeholder="Indirizzo" value="{{ old('civicNumber') }}">
                  @error('address')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="col-sm-3">
                  <label for="city">Città</label>
                  <input type="text" required name="city" id="city" class="form-control @error('city') is-invalid @enderror" placeholder="Citta" value="{{ old('city') }}">
                  @error('city')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

              <div class="col-sm-3">
                <label for="postCode">Codice Postale</label>
                <input type="number" required name="postCode" id="postCode" class="form-control @error('postCode') is-invalid @enderror" placeholder="Citta" value="{{ old('postCode') }}">
                @error('postCode')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

            </div>

            <div class="form-group row">
              <div class="col-sm-4">
                <label for="room_number">Numero di stanze</label>
                <input type="number" required name="room_number" id="room_number" class="form-control  @error('room_number') is-invalid @enderror" value="{{ old('room_number') }}">
                @error('room_number')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-sm-4">
                <label for="bath_number">Numero di bagni</label>
                <input type="number" required name="bath_number" id="bath_number" class="form-control  @error('bath_number') is-invalid @enderror" value="{{ old('bath_number') }}">
                @error('bath_number')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-sm-4">
                <label for="beds">Posti letto</label>
                <input type="number" required name="beds" id="beds" class="form-control  @error('beds') is-invalid @enderror" value="{{ old('bath_number') }}">
                @error('beds')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6">
                <label for="area">Area</label>
                <input type="number" required name="area" id="area" class="form-control @error('area') is-invalid @enderror" value="{{ old('area') }}">
                @error('area')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-sm-6">
                <label for="price">Prezzo in €</label>
                <input type="number" required name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6">
                <label for="image">Foto copertina appartamento</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-sm-6">
                <label for="image">Carica diverse foto per mostrare il tuo appartamneto</label>
                <input type="file" name="photos[]" id="photos" class="form-control @error('photos') is-invalid @enderror" multiple>
                @error('photos')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

              <div class="form-group row">
                <div class="col-sm-12">
                  <div class="form-check">
                    <label>Optionals:</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="optionals[]" value="1">
                    <label for="optionals[]">Wi-fi</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="optionals[]" value="2">
                    <label for="optionals[]">Portineria</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="optionals[]" value="3">
                    <label for="optionals[]">Posto Auto</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="optionals[]" value="4">
                    <label for="optionals[]">Sauna</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="optionals[]" value="5">
                    <label for="optionals[]">Piscina</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" name="optionals[]" value="6">
                    <label for="optionals[]">Vista Mare</label>
                  </div>
                </div>
              </div>

            <div class="form-group row">
              <div class="col-sm-12">
                <label for="description">Descrizione appartamento</label>
                <textarea rows="4" name="description" required id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Descrizione"> {{ old('description') }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <button type="submit" class="btn ">Crea appartamento</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('js/checkInput.js') }}"></script>
  <script src="{{ asset('js/createApartment.js') }}"></script>
@endsection
