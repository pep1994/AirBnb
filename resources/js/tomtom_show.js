//RICHIAMO API TOM TOM PER MOSTRARE UNA MAPPA CON MARCATORE NELLA PAGINA DI DETTAGLI APPARTAMENTO
$(document).ready(function(){

  // metto il logo rosso
  $('.logobnb').attr('src', 'http://localhost:8000/img/LOGO_UNO_MOD.png');
   // chiudo in variabile i tag header con i suoi link
   var header = $('header');
   var links = $('header a');
   var registerButton = $('.register-button');

    var images = $('img');
    var overlay = $('.overlay-image-show');
    var img = $('<img></img>');

    // overlay con immagine centrata
    overlay.html(img);

    images.click(function() {

      var src = $(this).attr('src');
      overlay.show();
      img.attr('src', src);
      console.log(src);
    });

    overlay.click(function() {
      overlay.hide();
    });

    // hover bottone register
   registerButton.mouseenter(function(){
    registerButton.css({
        'background-color': 'rgb(225, 60, 60)',
    });

    $('.register-button a').css({
    'color': 'white',
    });

  });

  // hover bottone register
  registerButton.mouseleave(function(){
    registerButton.css({
        'background-color': 'white',
    });

    $('.register-button a').css({
    'color': 'rgb(225, 60, 60)'
    });
  });


  //cambio stile css dell'header
    header.css({
        'background-color': 'white',
        'box-shadow': '1px 1px 15px rgba(0, 0, 0, .1)'
    });

    // cambio stile css dei link nell'header
    links.css({
      'color': 'rgb(225, 60, 60)'
  });

  // prendo i valori degli input lat e lon
  var longitude = $('#longitude').val();
  var latitude = $('#latitude').val();

  // chiudo in un array i valori precedenti
  var position = [ longitude, latitude ];

  // richiamo la funzione di tom tom che permette di creare una mappa
  tomtom.setProductInfo('<your-product-name>', '<your-product-version>');
      var map = tt.map({
        container: 'map', //id del div che conterrà la mappa
        key: 'GA5MivJiK0ZxoB9tGaVHIhVkwckf4jOc', //chiave dell'api
        source: 'vector', //tipo di risorsa
        basePath: '/sdk', //cartella (locale) da cui l'api prenderà i dati
        center: position, //coordinate lat e lon (in array) su cui la mappa si centrerà
        zoom: 15 //valore dello zoom sulla mappa
      });

  //personalizzazione marker
  var element = document.createElement('div');
  element.id = 'marker';

  // creazione del marcatore sulla mappa
  var marker = new tt.Marker({element: element}).setLngLat(position).addTo(map);
  // var marker = new tt.Marker().setLngLat(position).addTo(map);

});
