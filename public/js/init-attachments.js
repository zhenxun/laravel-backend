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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 44);
/******/ })
/************************************************************************/
/******/ ({

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(45);


/***/ }),

/***/ 45:
/***/ (function(module, exports) {

$(document).ready(function () {

  function getArticles(page) {

    $.ajax({
      url: '/backend/api/attachments/' + page
    }).done(function (data) {
      var obj = jQuery.parseJSON(data);
      var current_page = parseInt($('.current_page').val());
      var index = Object.keys(obj).length * current_page - 1;
      console.log(index);
      $('.attachments-viewer').html(articlesTemplate(obj));
      $('.pagination-bar').html(articlesPaginationBar(obj[index].total_page));
    }).fail(function () {
      alert('Articles could not be loaded.');
    });
  }

  function articlesPaginationBar() {
    var totalPage = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;

    var template_pager_bar = '';
    var previous_disabled = '';
    var next_disabled = '';
    var current_page = parseInt($('.current_page').val());

    if (totalPage == 1) {
      previous_disabled = 'disabled';
      next_disabled = 'disabled';
    } else {
      previous_disabled = '';
      next_disabled = '';
    }

    if (current_page == totalPage) {
      next_disabled = 'disabled';
    } else {
      next_disabled = '';
    }

    if (current_page == 1) {
      previous_disabled = 'disabled';
    } else {
      next_disabled = '';
    }

    previous = current_page - 1;
    next = current_page + 1;

    template_pager_bar += '<div class="d-flex flex-row justify-content-center mt-3">' + '<div class="p2">' + '<nav aria-label="Page navigation example">' + '<ul class="pagination">' + '<li class="page-item ' + previous_disabled + '">' + '<a class="page-link attachment-page-prevoius" href="#" role="' + previous + '" aria-label="Previous">' + '<span aria-hidden="true">&laquo;</span>' + '<span class="sr-only">Previous</span>' + '</a>' + '</li>';

    for ($a = 1; $a <= totalPage; $a++) {
      template_pager_bar += '<li class="page-item"><a class="page-link attachment-page-link" href="#" role="' + $a + '">' + $a + '</a></li>';
    }

    template_pager_bar += '<li class="page-item ' + next_disabled + '">' + '<a class="page-link attachment-page-next" href="#" role="' + next + '" aria-label="Next">' + '<span aria-hidden="true">&raquo;</span>' + '<span class="sr-only">Next</span>' + '</a>' + '</li>' + '</div>' + '</div>';

    return template_pager_bar;
  }

  function articlesTemplate(data) {

    var template = '';

    $.each(data, function (index, value) {
      template += '<a href="' + value.url + '" target="_blank" class="files-attachment-link">' + '<div class="border files-attachment-box mr-1 mb-1">' + '<div class="d-flex flex-row flex-nowrap">' + '<div class="p-2">' + '<div class="files-attachment-box-image pt-1">' + '<img src="' + value.url + '" alt="" class="rounded-0 my-auto">' + '</div>' + '</div>' + '<div class="p-2">' + '<p class="mb-0"><small>' + value.truncate_filename + '</small></p>' + '<p class="mb-0"><small>' + value.mime + ' </small></p>' + '<p class="mb-0"><small>' + value.size + ' KB</small></p>' + '</div>' + '</div>' + '</div>' + '</a>';
    });

    return template;
  }

  function initialize() {
    var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;

    getArticles(page);
  }

  initialize();

  $('body').on('click', '.attachment-page-link', function (e) {
    e.preventDefault();
    var page = $(this).attr('role');
    $('.current_page').val(page);
    getArticles(page);
  });

  $('body').on('click', '.attachment-page-prevoius', function (e) {
    e.preventDefault();
    var page = $(this).attr('role');
    $('.current_page').val(page);
    getArticles(page);
  });

  $('body').on('click', '.attachment-page-next', function (e) {
    e.preventDefault();
    var page = $(this).attr('role');
    $('.current_page').val(page);
    getArticles(page);
  });
});

/***/ })

/******/ });