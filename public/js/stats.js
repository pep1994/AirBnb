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
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/stats.js":
/*!*******************************!*\
  !*** ./resources/js/stats.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

$(document).ready(function () {
  var header = $('header');
  var links = $('header a');
  $('.logobnb').attr('src', 'http://localhost:8000/img/LOGO_UNO_MOD.png');
  header.css({
    'background-color': 'white',
    'box-shadow': '1px 1px 15px rgba(0, 0, 0, .1)'
  });
  links.css({
    'color': 'rgb(225, 60, 60)'
  });
  var idApartment = $('#id_apt').val(); // STATS CHART

  var ctx = $('#views');
  $.ajax({
    url: 'http://localhost:8000/api/stats_apt',
    method: 'GET',
    data: {
      id: idApartment
    },
    success: function success(views) {
      console.log(Math.max.apply(Math, _toConsumableArray(views)));
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: moment.months(),
          datasets: [{
            label: 'Views',
            backgroundColor: 'rgba(225, 60, 60, 0.2)',
            hoverBackgroundColor: 'rgba(225, 60, 60, 0.6)',
            lineTension: 0.2,
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: 'rgba(225, 60, 60)',
            pointBackgroundColor: '#fff',
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: 'rgba(225, 60, 60)',
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: views,
            borderColor: ['rgba(225, 60, 60)'],
            borderWidth: 2
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                max: Math.max.apply(Math, _toConsumableArray(views)) + 2,
                beginAtZero: true
              }
            }]
          },
          animation: {
            duration: 1500
          },
          legend: {
            align: 'end'
          },
          title: {
            display: true,
            text: 'Andamento visualizzazioni',
            fontSize: 22,
            fontColor: 'rgba(225, 60, 60)',
            fontStyle: 'bold'
          }
        }
      });
    }
  }); // MESSAGES CHART

  var cxt = $('#messages');
  $.ajax({
    url: 'http://localhost:8000/api/messages_apt',
    method: 'GET',
    data: {
      id: idApartment
    },
    success: function success(messages) {
      var myChart = new Chart(cxt, {
        type: 'line',
        data: {
          labels: moment.months(),
          datasets: [{
            label: 'Messaggi Ricevuti',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            hoverBackgroundColor: 'rgba(75, 192, 192, 0.2)',
            lineTension: 0.2,
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: 'rgba(75, 192, 192, 1)',
            pointBackgroundColor: '#fff',
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: 'rgba(75, 192, 192, 1',
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: messages,
            borderColor: ['rgba(75, 192, 192, 1)'],
            borderWidth: 2
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                max: Math.max.apply(Math, _toConsumableArray(messages)) + 2,
                beginAtZero: true
              }
            }]
          },
          animation: {
            duration: 1500
          },
          legend: {
            align: 'end'
          },
          title: {
            display: true,
            text: 'Andamento messaggi',
            fontSize: 22,
            fontColor: 'rgba(75, 192, 192, 1)',
            fontStyle: 'bold'
          }
        }
      });
    }
  });
});

/***/ }),

/***/ 7:
/*!*************************************!*\
  !*** multi ./resources/js/stats.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/marcopetrini/Desktop/projectTeam/BoolBnb/Project/resources/js/stats.js */"./resources/js/stats.js");


/***/ })

/******/ });