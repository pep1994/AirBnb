<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="{{ asset('sdk/tomtom.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.37.2/maps/maps-web.min.js'></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel='stylesheet' type='text/css' href="{{ asset('sdk/map.css') }}">
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.37.2/maps/maps.css'/>
    

    <title>BoolBnb</title>
  </head>
  <body>
    @include('components.header')

    @yield('content')

    @include('components.footer')

    {{-- Scripts --}}
    
    <script src="https://kit.fontawesome.com/d99074f875.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
    @yield('script')
    <script src="{{ asset('js/app.js')}}" charset="utf-8"></script>
  </body>
</html>
