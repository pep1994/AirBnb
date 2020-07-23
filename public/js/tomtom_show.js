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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/tomtom_show.js":
/*!*************************************!*\
  !*** ./resources/js/tomtom_show.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

//RICHIAMO API TOM TOM PER MOSTRARE UNA MAPPA CON MARCATORE NELLA PAGINA DI DETTAGLI APPARTAMENTO
$(document).ready(function () {
  // metto il logo rosso
  $('.logobnb').attr('src', 'http://localhost:8000/img/LOGO_UNO_MOD.png'); // chiudo in variabile i tag header con i suoi link

  var header = $('header');
  var links = $('header a');
  var registerButton = $('.register-button');
  var images = $('img');
  var overlay = $('.overlay-image-show');
  var img = $('<img></img>'); // overlay con immagine centrata

  overlay.html(img);
  images.click(function () {
    var src = $(this).attr('src');
    overlay.show();
    img.attr('src', src);
    console.log(src);
  });
  overlay.click(function () {
    overlay.hide();
  }); // hover bottone register

  registerButton.mouseenter(function () {
    registerButton.css({
      'background-color': 'rgb(225, 60, 60)'
    });
    $('.register-button a').css({
      'color': 'white'
    });
  }); // hover bottone register

  registerButton.mouseleave(function () {
    registerButton.css({
      'background-color': 'white'
    });
    $('.register-button a').css({
      'color': 'rgb(225, 60, 60)'
    });
  }); //cambio stile css dell'header

  header.css({
    'background-color': 'white',
    'box-shadow': '1px 1px 15px rgba(0, 0, 0, .1)'
  }); // cambio stile css dei link nell'header

  links.css({
    'color': 'rgb(225, 60, 60)'
  }); // prendo i valori degli input lat e lon

  var longitude = $('#longitude').val();
  var latitude = $('#latitude').val(); // chiudo in un array i valori precedenti

  var position = [longitude, latitude]; // richiamo la funzione di tom tom che permette di creare una mappa

  tomtom.setProductInfo('<your-product-name>', '<your-product-version>');
  var map = tt.map({
    container: 'map',
    //id del div che conterrà la mappa
    key: 'GA5MivJiK0ZxoB9tGaVHIhVkwckf4jOc',
    //chiave dell'api
    source: 'vector',
    //tipo di risorsa
    basePath: '/sdk',
    //cartella (locale) da cui l'api prenderà i dati
    center: position,
    //coordinate lat e lon (in array) su cui la mappa si centrerà
    zoom: 15 //valore dello zoom sulla mappa

  }); //personalizzazione marker

  var element = document.createElement('div');
  element.id = 'marker'; // creazione del marcatore sulla mappa

  var marker = new tt.Marker({
    element: element
  }).setLngLat(position).addTo(map); // var marker = new tt.Marker().setLngLat(position).addTo(map);
});

/***/ }),

/***/ 3:
/*!*******************************************!*\
  !*** multi ./resources/js/tomtom_show.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/marcopetrini/Desktop/projectTeam/BoolBnb/Project/resources/js/tomtom_show.js */"./resources/js/tomtom_show.js");


/***/ })

/******/ });