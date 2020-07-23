

require('./bootstrap');

window.Vue = require('vue');

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
});

$(document).ready(function () {

    // FADE-OUT MESSAGGI CON SUCCESSO
    var alertSuccess = $('.alert-success');
    var alertDanger = $('.alert-danger');
    alertSuccess.fadeOut(3500);
    alertDanger.fadeOut(3500);

    // HAMBURGER MENU
    $('.responsive-icon').click(function(){
        $('.responsive-icon').hide();
        $('.dx-responsive').show(1000);
      }
    );

    $(".indietro").click(function(){
        $('.dx-responsive').slideUp(1000);
        $('.responsive-icon').show(2500);
      }
    );

});
