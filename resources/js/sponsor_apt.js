$(document).ready(function(){

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

  $('#button_basic').click(
    function(){
      $('#dropdown_sponsor_standard').hide();
      $('#dropdown_sponsor_premium').hide();
      $('#button_standard').text('Scegli');
      $('#button_premium').text('Scegli');
      $('#dropdown_sponsor_basic').slideToggle(500);
      if ($(this).text() === 'Scegli') {
        $(this).text('Chiudi')
      } else if ($(this).text()=== 'Chiudi') {
        $(this).text('Scegli')
      }
    }
  );

  $('#button_standard').click(
    function(){
      $('#dropdown_sponsor_basic').hide();
      $('#dropdown_sponsor_premium').hide();
      $('#button_basic').text('Scegli');
      $('#button_premium').text('Scegli');
      $('#dropdown_sponsor_standard').slideToggle(500);
      if ($(this).text() === 'Scegli') {
        $(this).text('Chiudi')
      } else if ($(this).text()=== 'Chiudi') {
        $(this).text('Scegli')
      }
    }
  );

  $('#button_premium').click(
    function(){
      $('#dropdown_sponsor_basic').hide();
      $('#dropdown_sponsor_standard').hide();
      $('#button_basic').text('Scegli');
      $('#button_standard').text('Scegli');
      $('#dropdown_sponsor_premium').slideToggle(500);
      if ($(this).text() === 'Scegli') {
        $(this).text('Chiudi')
      } else if ($(this).text()=== 'Chiudi') {
        $(this).text('Scegli')
      }
    }
  );
});
