// EVENTI E CHIAMATE AJAX NELLE PAGINE DI EDITING APPARTAMENTO
$(document).ready(function () {

  var header = $('header');
  var links = $('header a');
  var images = $('img');
  var overlay = $('.overlay-image');
  var img = $('<img></img>');

  // metto il logo rosso
  $('.logobnb').attr('src', 'http://localhost:8000/img/LOGO_UNO_MOD.png');

  header.css({
    'background-color': 'white',
    'box-shadow': '1px 1px 15px rgba(0, 0, 0, .1)'
  });

  links.css({
    'color': 'rgb(225, 60, 60)'
  });

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

  // evento al rilascio di un tasto sui tag input
  $('input').on('input', function(){

    // prendo i valori degli input
    var address = $('#address').val();
    var city = $('#city').val();
    var civicNumber = $('#civicNumber').val();
    var postCode = $('#postCode').val();

    // preparo l'url della chiamata ajax all'api di tom tom
    var url = "https://api.tomtom.com/search/2/structuredGeocode.JSON?key=GA5MivJiK0ZxoB9tGaVHIhVkwckf4jOc";


    // chiamata ajax per ottenere latitudine e longitudine partendo da indirizzo, città, numero civico e codice postale
    $.ajax({
      url: url,
      method: "GET",
      data: {
          streetName: address,
          streetNumber: civicNumber,
          countryCode: 'IT',
          municipality: city,
          postalCode: postCode
      },
      success: function (data) {

        // chiudo in variabili i valori dati dall'api di latitudine e longitudine
        var lat = data.results[0]['position']['lat'];
        var lon = data.results[0]['position']['lon'];

        // inserisco i dati nell'hidden input che servirà a passarli al backend
        $('#latitude-edit').val(lat);
        $('#longitude-edit').val(lon);
      },
      error: function(error, status){
        console.log('errore:' + error);
      }
    });
  });
});
