@extends('layouts.main_layout')

@section('content')
  <div class="main_content">
    <div class="container-fluid mb-5">
      <div class="row">
        <div class="col-md-1 d-flex align-items-center">
          <a href="{{ route('show', $apartment -> id)}}"><i class="fas fa-arrow-circle-left text-danger back-circle"></i></a>
        </div>
        <div class="col-md-10">
          <h1>Sponsorizza il tuo appartamento</h1>
        </div>
        {{-- FIX COL --}}
        <div class="col-md-1"></div>
      </div>
    </div>
    <div class="container">
      <div class="row triple-sponsorization">
        {{-- BASIC --}}
        <div class="col-md-4 p-3">
          <div class="basic_spnsr">
            <div class="row justify-content-center">
              <h3>Basic</h3>
            </div>
            <div class="row">
              <div class="col-lg-12 d-flex justify-content-center">
                <div>
                  <table class="table">
                    <thead class="thead" style="background: rgb(225,60,60); color: #FFF;">
                      <h6>Dettagli sponsorizzazione</h6>
                      <tr>
                        <th scope="col">Costo</th>
                        <th scope="col">Durata</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>2.99€</td>
                        <td>24 Hours</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <button class="dropDown-menu bnb_btn" id="button_basic" type="button" name="button" value="1">Scegli</button>
            </div>
            <div class="row" id="dropdown_sponsor_basic">
              <div class="container basic">
                <div class="row justify-content-center">
                  <div class="col-md-10 d-flex flex-column justify-content-center pippo">
                    <div id="dropin-container-basic"></div>
                    <button id="submit-button-basic">Request payment method</button>
                  </div>
                </div>
              </div>

              <script>
                var buttonBasic = document.querySelector('#submit-button-basic');
                braintree.dropin.create({
                  authorization: "{{ \Braintree\ClientToken::generate() }}",
                  container: '#dropin-container-basic'
                  }, function (createErr, instance) {
                      buttonBasic.addEventListener('click', function () {
                        var sponsorType = $('#button_basic').val();
                        instance.requestPaymentMethod(function (err, payload) {

                          $.ajax({
                            url: "{{ route('payment_process') }}",
                            method: "GET",
                            data: {
                                id: {{$apartment -> id}},
                                val: sponsorType,
                                payload: payload
                            },

                            success: function (result) {
                                console.log(result);
                                if (result.success) {
                                  window.location.href = "{{ route('show', $apartment->id) }}"

                                } else {
                                  alert('Transazione fallita');
                                  }
                            },
                            error: function(error, status){
                              console.log('errore:' + error);
                              }
                            });
                          });
                        });
                      });
              </script>
            </div>
          </div>
        </div>

        {{-- STANDARD --}}
        <div class="col-md-4 p-3">
          <div class="standard_spnsr ">
            <div class="row justify-content-center">
              <h3>Standard</h3>
            </div>
            <div class="row">
              <div class="col-lg-12 d-flex justify-content-center">
                <div>
                  <table class="table">
                    <thead class="thead" style="background: rgb(225,60,60); color: #FFF;">
                      <h6>Dettagli sponsorizzazione</h6>
                      <tr>
                        <th scope="col">Costo</th>
                        <th scope="col">Durata</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>5.99€</td>
                        <td>72 Hours</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <button class="dropDown-menu" id="button_standard" type="button" name="button" value="2">Scegli</button>
            </div>
            <div class="row" id="dropdown_sponsor_standard">
              <div class="container standard">
                <div class="row justify-content-center">
                  <div class="col-md-10 d-flex flex-column justify-content-center pippo">
                    <div id="dropin-container-standard"></div>
                    <button id="submit-button-standard">Request payment method</button>
                  </div>
                </div>
              </div>

              <script>
                var buttonStand = document.querySelector('#submit-button-standard');
                braintree.dropin.create({
                  authorization: "{{ \Braintree\ClientToken::generate() }}",
                  container: '#dropin-container-standard'
                  }, function (createErr, instance) {
                      buttonStand.addEventListener('click', function () {
                        var sponsorType = $('#button_standard').val();
                        instance.requestPaymentMethod(function (err, payload) {

                          $.ajax({
                            url: "{{ route('payment_process') }}",
                            method: "GET",
                            data: {
                                id: {{$apartment -> id}},
                                val: sponsorType,
                                payload: payload
                            },

                            success: function (result) {
                                console.log(result);
                                if (result.success) {
                                  window.location.href = "{{ route('show', $apartment->id) }}"
                                } else {
                                  alert('Payment failed');
                                  }
                            },
                            error: function(error, status){
                              console.log('errore:' + error);
                              }
                            });
                          });
                        });
                      });
              </script>
            </div>
          </div>
        </div>

        {{-- PREMIUM --}}
        <div class="col-md-4 p-3">
          <div class="premium_spnsr">
            <div class="row justify-content-center">
              <h3>Premium</h3>
            </div>
            <div class="row">
              <div class="col-lg-12 d-flex justify-content-center">
                <div>
                  <table class="table">
                    <thead class="thead" style="background: rgb(225,60,60); color: #FFF;">
                      <h6>Dettagli sponsorizzazione</h6>
                      <tr>
                        <th scope="col">Costo</th>
                        <th scope="col">Durata</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>9.99€</td>
                        <td>144 Hours</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <button class="dropDown-menu" id="button_premium" type="button" name="button" value="3">Scegli</button>
            </div>
            <div class="row" id="dropdown_sponsor_premium">
              <div class="container premium">
                <div class="row justify-content-center">
                  <div class="col-md-10 d-flex flex-column justify-content-center pippo">
                    <div id="dropin-container-premium"></div>
                    <button id="submit-button-premium">Request payment method</button>
                  </div>
                </div>
              </div>

              <script>
                var buttonPrem = document.querySelector('#submit-button-premium');
                braintree.dropin.create({
                  authorization: "{{ \Braintree\ClientToken::generate() }}",
                  container: '#dropin-container-premium'
                  }, function (createErr, instance) {
                      buttonPrem.addEventListener('click', function () {
                        var sponsorType = $('#button_premium').val();
                        instance.requestPaymentMethod(function (err, payload) {

                          $.ajax({
                            url: "{{ route('payment_process') }}",
                            method: "GET",
                            data: {
                                id: {{$apartment -> id}},
                                val: sponsorType,
                                payload: payload
                            },

                            success: function (result) {
                                console.log(result);
                                if (result.success) {
                                  window.location.href = "{{ route('show', $apartment->id) }}"
                                } else {
                                  alert('Payment failed');
                                  }
                            },
                            error: function(error, status){
                              console.log('errore:' + error);
                              }
                            });
                          });
                        });
                      });
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{asset('js/sponsor_apt.js')}}"></script>
@endsection
