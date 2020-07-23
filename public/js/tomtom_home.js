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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/tomtom_home.js":
/*!*************************************!*\
  !*** ./resources/js/tomtom_home.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// EVENTI E CHIAMATE AJAX NELLE PAGINE DI RICERCA APPARTAMENTO
$(document).ready(function () {
  var registerButton = $('.register-button');
  var scrolledButton = $('#scrolled-button'); // HEADER SCROLL

  $(document).scroll(function () {
    var scrollDocument = $(document).scrollTop();

    if (scrollDocument != 0) {
      $('.logobnb').attr('src', 'img/LOGO_UNO_MOD.png');
      $('header').css({
        'background-color': 'white',
        'box-shadow': '1px 1px 15px 5px grey'
      });
      $('.header-dx ul li a').css({
        'color': 'rgb(225, 60, 60)'
      });
      registerButton.addClass('scrolled');
    } else {
      $('.logobnb').attr('src', 'img/LOGO_UNO_MOD_BA.png');
      registerButton.removeClass('scrolled');
      $('header').css({
        'background-color': 'transparent',
        'box-shadow': 'none'
      });
      $('.header-dx ul a').css({
        'color': 'white'
      });
    } // scrolled-button


    if (scrollDocument > $('.container-fluid').offset().top) {
      scrolledButton.css('display', 'block');
    }

    if (scrollDocument < $('.container-fluid').offset().top) {
      scrolledButton.css('display', 'none');
    }
  }); // click sul scrolled-Button

  scrolledButton.click(function () {
    window.scrollTo({
      top: 0,
      left: 0,
      behavior: 'smooth'
    });
  }); // hover register-button

  registerButton.mouseenter(function () {
    registerButton.css({
      'background-color': 'rgb(225, 60, 60)'
    });
    $('.register-button a').css({
      'color': 'white'
    });
  }); // hover register-button

  registerButton.mouseleave(function () {
    registerButton.css({
      'background-color': 'transparent'
    });

    if (registerButton.hasClass('scrolled')) {
      $('.register-button a').css({
        'color': 'rgb(225, 60, 60)'
      });
    } else {
      $('.register-button a').css({
        'color': 'white'
      });
    }
  }); // evento al rilascio di un tasto sui tag input

  $('#submit-home').click(function (e) {
    e.preventDefault();
    var city = $('#home-search-bar').val(); // chiudo in una variabile il valore dell'input nella barra di ricerca

    if (city != '') {
      // preparo l'url personalizzato da dare in pasto all'api
      var url = "https://api.tomtom.com/search/2/geocode/" + city + ".JSON?key=A19bLrkzxbFaNdTAWvUaqCPN1NCB7UQH"; // chiamata ajax per ottenere latitudine e longitudine partendo dalla città

      $.ajax({
        url: url,
        method: "GET",
        success: function success(data) {
          // chiudo in variabili i valori dati dall'api di latitudine e longitudine
          var lat = data.results[0]['position']['lat'];
          console.log(lat);
          var lon = data.results[0]['position']['lon'];
          console.log(lon);
          console.log(city); // inserisco i dati nell'hidden input che servirà a passarli al backend

          $('#hidden-lat').val(lat);
          $('#hidden-lon').val(lon);
          $('#form-search').submit();
        },
        error: function error(_error, status) {
          console.log('errore:' + _error);
        }
      });
    }
  });

  (function () {
    var placesAutocomplete = places({
      appId: 'pl3MGAFPUYLC',
      apiKey: 'b9a43d62226d2109d529ba9f00f20cb8',
      container: document.querySelector('#home-search-bar'),
      templates: {
        value: function value(suggestion) {
          return suggestion.name;
        }
      }
    }).configure({
      type: 'city',
      aroundLatLngViaIP: false
    });
  })();
});

/***/ }),

/***/ 4:
/*!*******************************************!*\
  !*** multi ./resources/js/tomtom_home.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/marcopetrini/Desktop/projectTeam/BoolBnb/Project/resources/js/tomtom_home.js */"./resources/js/tomtom_home.js");


/***/ })

/******/ });