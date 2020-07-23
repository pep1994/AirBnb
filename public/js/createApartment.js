/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/createApartment.js":
/*!*****************************************!*\
  !*** ./resources/js/createApartment.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// EVENTI E CHIAMATE AJAX NELLE PAGINE DI CREAZIONE APPARTAMENTO
$(document).ready(function () {
  // metto il logo rosso
  $('.logobnb').attr('src', 'http://localhost:8000/img/LOGO_UNO_MOD.png'); // svuoto i valori dagli input in create.blade.php al caricamento della pagina

  $('#address').val('');
  $('#city').val('');
  $('#civicNumber').val('');
  $('#postCode').val(''); // chiudo in variabile i tag header con i suoi link

  var header = $('header');
  var links = $('header a'); // cambio stile css dell'header

  header.css({
    'background-color': 'white',
    'box-shadow': '1px 1px 15px rgba(0, 0, 0, .1)'
  }); // cambio stile css dei link nell'header

  links.css({
    'color': 'rgb(225, 60, 60)'
  }); // evento al rilascio di un tasto sui tag input

  $('input').on('input', function () {
    // prendo i valori degli input
    var address = $('#address').val();
    var city = $('#city').val();
    var civicNumber = $('#civicNumber').val();
    var postCode = $('#postCode').val(); // preparo l'url della chiamata ajax all'api di tom tom

    var url = "https://api.tomtom.com/search/2/structuredGeocode.JSON?key=GA5MivJiK0ZxoB9tGaVHIhVkwckf4jOc"; // chiamata ajax per ottenere latitudine e longitudine partendo da indirizzo, città, numero civico e codice postale

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
      success: function success(data) {
        // chiudo in variabili i valori dati dall'api di latitudine e longitudine
        var lat = data.results[0]['position']['lat'];
        var lon = data.results[0]['position']['lon']; // inserisco i dati nell'hidden input che servirà a passarli al backend

        $('#latitude-create').val(lat);
        $('#longitude-create').val(lon);
      },
      error: function error(_error, status) {
        console.log('errore:' + _error);
      }
    });
  });
});

/***/ }),

/***/ 1:
/*!***********************************************!*\
  !*** multi ./resources/js/createApartment.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/marcopetrini/Desktop/projectTeam/BoolBnb/Project/resources/js/createApartment.js */"./resources/js/createApartment.js");


/***/ })

/******/ });