$(document).ready(function () {

  // chiudo in variabile i tag header con i suoi link
  var header = $('header');
  var links = $('header a');
  var registerButton = $('.register-button');

  // metto il logo rosso
  $('.logobnb').attr('src', 'http://localhost:8000/img/LOGO_UNO_MOD.png');

  //cambio stile css dell'header
  header.css({
    'background-color': 'white',
    'box-shadow': '1px 1px 15px rgba(0, 0, 0, .1)'
  });

  // cambio stile css dei link nell'header
  links.css({
    'color': 'rgb(225, 60, 60)'
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
});
