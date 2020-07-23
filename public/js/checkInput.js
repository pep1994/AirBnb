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
/******/ 	return __webpack_require__(__webpack_require__.s = 9);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/checkInput.js":
/*!************************************!*\
  !*** ./resources/js/checkInput.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

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
  var priceInput = $('#price'); // evento input titolo

  titleInput.on('input', function () {
    // controllo input titolo
    if ($(this).val().match(/[#@\$!_\-\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§]/g) || $(this).val() == "") {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  }); // evento input indirizzo

  addressInput.on('input', function () {
    // controllo input indirizzo
    if ($(this).val().match(/[#@\$!_\-\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§]/g) || $(this).val() == "") {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  }); // controllo input numero civico

  civicNumberInput.on('input', function () {
    // controllo input numero civico
    if ($(this).val().match(/[a-zA-Z]/g) || $(this).val().match(/[#@\$!_\-\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§\.\,]/g) || $(this).val() == "" || $(this).val() < 0) {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  }); // controllo input città

  cityInput.on('input', function () {
    // controllo input città
    if ($(this).val().match(/\d+/g) || $(this).val().match(/[#@\$!_\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§]/g) || $(this).val() == "") {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  }); // controllo codice postale

  postCodeInput.on('input', function () {
    // controllo codice postale
    if ($(this).val().match(/[a-zA-Z]/g) || $(this).val().match(/[#@\$!_\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§\.\,]/g) || $(this).val() == "" || $(this).val() < 0) {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  }); // controllo input numero di stanze

  roomNumberInput.on('input', function () {
    // controllo numero stanze
    if ($(this).val().match(/[a-zA-Z]/g) || $(this).val().match(/[#@\$!_\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§\.\,]/g) || $(this).val() == "" || $(this).val() < 0) {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  }); // controllo input bagni

  bathNumberInput.on('input', function () {
    // controllo numero bagni
    if ($(this).val().match(/[a-zA-Z]/g) || $(this).val().match(/[#@\$!_\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§\.\,]/g) || $(this).val() == "" || $(this).val() < 0) {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  }); // controllo input posti letto

  bedsInput.on('input', function () {
    // controllo numero posti letto
    if ($(this).val().match(/[a-zA-Z]/g) || $(this).val().match(/[#@\$!_\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§\.\,]/g) || $(this).val() == "" || $(this).val() < 0) {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  }); // controllo input area

  areaInput.on('input', function () {
    // controllo area
    if ($(this).val().match(/[a-zA-Z]/g) || $(this).val().match(/[#@\$!_\?\"\'\+\%\&\=\^\<\>\;\[\]\Ç\§\.\,]/g) || $(this).val() == "" || $(this).val() < 0) {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  }); // controllo input prezzo

  priceInput.on('input', function () {
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

/***/ }),

/***/ 9:
/*!******************************************!*\
  !*** multi ./resources/js/checkInput.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/marcopetrini/Desktop/projectTeam/BoolBnb/Project/resources/js/checkInput.js */"./resources/js/checkInput.js");


/***/ })

/******/ });