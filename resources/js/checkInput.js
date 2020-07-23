$(document).ready(function () {

    var titleInput = $('#title');
    var addressInput = $('#address');
    var civicNumberInput = $('#civicNumber');
    var cityInput = $('#city');
    var postCodeInput = $('#postCode');
    var roomNumberInput = $('#room_number');
    var bathNumberInput = $('#bath_number');
    var bedsInput = $('#beds');
    var areaInput = $('#area');
    var priceInput = $('#price');


    // evento input titolo
    titleInput.on('input', function() {
        // controllo input titolo
        if ($(this).val().match(/[#@\$!_\-\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§]/g) || $(this).val() == "") {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

    // evento input indirizzo
    addressInput.on('input', function() {
        // controllo input indirizzo
        if ($(this).val().match(/[#@\$!_\-\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§]/g) || $(this).val() == "") {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

    // controllo input numero civico
    civicNumberInput.on('input', function() {
        // controllo input numero civico
        if ($(this).val().match(/[a-zA-Z]/g) || $(this).val().match(/[#@\$!_\-\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§\.\,]/g) || $(this).val() == "" || $(this).val() < 0) {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

    // controllo input città
    cityInput.on('input', function() {
        // controllo input città
        if ($(this).val().match(/\d+/g) || $(this).val().match(/[#@\$!_\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§]/g) || $(this).val() == "") {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

    // controllo codice postale
    postCodeInput.on('input', function() {
        // controllo codice postale
        if ($(this).val().match(/[a-zA-Z]/g) || $(this).val().match(/[#@\$!_\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§\.\,]/g) || $(this).val() == "" || $(this).val() < 0) {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
       } else {
        $(this).removeClass('is-invalid');
        $(this).addClass('is-valid');
       }
    });

    // controllo input numero di stanze
    roomNumberInput.on('input', function(){
        // controllo numero stanze
        if ($(this).val().match(/[a-zA-Z]/g) || $(this).val().match(/[#@\$!_\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§\.\,]/g) || $(this).val() == "" || $(this).val() < 0) {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

    // controllo input bagni
    bathNumberInput.on('input', function () {
        // controllo numero bagni
        if ($(this).val().match(/[a-zA-Z]/g) || $(this).val().match(/[#@\$!_\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§\.\,]/g) || $(this).val() == "" || $(this).val() < 0) {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

    // controllo input posti letto
    bedsInput.on('input', function() {
        // controllo numero posti letto
        if ($(this).val().match(/[a-zA-Z]/g) || $(this).val().match(/[#@\$!_\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§\.\,]/g) || $(this).val() == "" || $(this).val() < 0) {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

    // controllo input area
    areaInput.on('input', function() {
        // controllo area
        if ($(this).val().match(/[a-zA-Z]/g) || $(this).val().match(/[#@\$!_\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§\.\,]/g) || $(this).val() == "" || $(this).val() < 0) {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

    // controllo input prezzo
    priceInput.on('input', function() {
        // controllo prezzo
        if ($(this).val().match(/[a-zA-Z]/g) || $(this).val().match(/[#@\$!_\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§\.\,]/g) || $(this).val() == "" || $(this).val() < 0) {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });

});
