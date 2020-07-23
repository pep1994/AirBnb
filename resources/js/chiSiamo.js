$(document).ready(function () {
    // metto il logo rosso
    $('.logobnb').attr('src', 'http://localhost:8000/img/LOGO_UNO_MOD.png');

    // chiudo in variabile i tag header con i suoi link
    var header = $('header');
    var links = $('header a');

    // cambio stile css dell'header
    header.css({
      'background-color': 'white',
      'box-shadow': '1px 1px 15px rgba(0, 0, 0, .1)'
    });

    // cambio stile css dei link nell'header
    links.css({
      'color': 'rgb(225, 60, 60)'
    });

});