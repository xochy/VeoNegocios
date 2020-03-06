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

/***/ "./resources/js/mapInput.js":
/*!**********************************!*\
  !*** ./resources/js/mapInput.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {//initialize();
});

function initMap() {
  $('form').on('keyup keypress', function (e) {
    var keyCode = e.keyCode || e.which;

    if (keyCode === 13) {
      e.preventDefault();
      return false;
    }
  });
  var locationInputs = document.getElementsByClassName("map-input");
  var autocompletes = [];
  var geocoder = new google.maps.Geocoder();

  for (var i = 0; i < locationInputs.length; i++) {
    var input = locationInputs[i];
    var fieldKey = input.id.replace("-input", "");
    var isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';
    var latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || -33.8688;
    var longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 151.2195;
    var map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
      center: {
        lat: latitude,
        lng: longitude
      },
      zoom: 13
    });
    var marker = new google.maps.Marker({
      map: map,
      position: {
        lat: latitude,
        lng: longitude
      }
    });
    marker.setVisible(isEdit);
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.key = fieldKey;
    autocompletes.push({
      input: input,
      map: map,
      marker: marker,
      autocomplete: autocomplete
    });
  }

  var _loop = function _loop(_i) {
    var input = autocompletes[_i].input;
    var autocomplete = autocompletes[_i].autocomplete;
    var map = autocompletes[_i].map;
    var marker = autocompletes[_i].marker;
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
      marker.setVisible(false);
      var place = autocomplete.getPlace();
      geocoder.geocode({
        'placeId': place.place_id
      }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
          var lat = results[0].geometry.location.lat();
          var lng = results[0].geometry.location.lng();
          setLocationCoordinates(autocomplete.key, lat, lng);
        }
      });

      if (!place.geometry) {
        window.alert("No details available for input: '" + place.name + "'");
        input.value = "";
        return;
      }

      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);
      }

      marker.setPosition(place.geometry.location);
      marker.setVisible(true);
    });
  };

  for (var _i = 0; _i < autocompletes.length; _i++) {
    _loop(_i);
  }
}

function setLocationCoordinates(key, lat, lng) {
  var latitudeField = document.getElementById(key + "-" + "latitude");
  var longitudeField = document.getElementById(key + "-" + "longitude");
  latitudeField.value = lat;
  longitudeField.value = lng;
}

/***/ }),

/***/ 1:
/*!****************************************!*\
  !*** multi ./resources/js/mapInput.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\VeoNegocios\VeoNegocios_0.0\resources\js\mapInput.js */"./resources/js/mapInput.js");


/***/ })

/******/ });