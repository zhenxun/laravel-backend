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
/******/ 	return __webpack_require__(__webpack_require__.s = 45);
/******/ })
/************************************************************************/
/******/ ({

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(46);


/***/ }),

/***/ 46:
/***/ (function(module, exports) {

$(document).ready(function () {

  function getAttachments(page) {

    $.ajax({
      url: '/backend/api/attachments/' + page
    }).done(function (data) {
      var obj = jQuery.parseJSON(data);
      var current_page = parseInt($('.current_page').val());
      var index = Object.keys(obj)[0];
      $('.attachments-viewer').html(attachmentsTemplate(obj));
      $('.pagination-bar').html(attachmentsPaginationBar(obj[index].total_page));
    }).fail(function () {
      alert('Attachments could not be loaded.');
    });
  }

  function attachmentsPaginationBar() {
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

    if (current_page == 1) {
      previous_disabled = 'disabled';
    } else {
      next_disabled = '';
    }

    if (current_page == totalPage) {
      next_disabled = 'disabled';
    } else {
      next_disabled = '';
    }

    var previous = current_page - 1;
    var next = current_page + 1;

    template_pager_bar += '<div class="d-flex flex-row justify-content-center mt-3">' + '<div class="p2">' + '<nav aria-label="Page navigation example">' + '<ul class="pagination">' + '<li class="page-item ' + previous_disabled + '">' + '<a class="page-link attachment-page-prevoius" href="#" role="' + previous + '" aria-label="Previous">' + '<span aria-hidden="true">&laquo;</span>' + '<span class="sr-only">Previous</span>' + '</a>' + '</li>';

    for (var a = 1; a <= totalPage; a++) {
      var active = a === current_page ? 'active' : '';
      template_pager_bar += '<li class="page-item ' + active + '"><a class="page-link attachment-page-link" href="#" role="' + a + '">' + a + '</a></li>';
    }

    template_pager_bar += '<li class="page-item ' + next_disabled + '">' + '<a class="page-link attachment-page-next" href="#" role="' + next + '" aria-label="Next">' + '<span aria-hidden="true">&raquo;</span>' + '<span class="sr-only">Next</span>' + '</a>' + '</li>' + '</div>' + '</div>';

    return template_pager_bar;
  }

  function attachmentsTemplate(data) {

    var template = '';

    $.each(data, function (index, value) {
      var except_extension = ['pdf', 'xls', 'xlsx', 'doc', 'docx', 'txt'];
      template += '<div class="border files-attachment-box mr-1 mb-1">' + '<div class="d-flex flex-row flex-nowrap">' + '<div class="p-2">' + '<div class="files-attachment-box-image pt-1">';
      if (jQuery.inArray(value.extension, except_extension) == -1) {
        template += '<img src="' + value.url + '" alt="" class="rounded-0 my-auto">';
      } else {
        template += '<img src="/images/extension_logo/' + value.extension + '.png" alt="" class="rounded-0 my-auto extension_logo">';
      }
      template += '</div>' + '</div>' + '<div class="p-2">' + '<p class="mb-0"><small>' + value.truncate_filename + '</small></p>' + '<p class="mb-0"><small>' + value.extension + ' </small></p>' + '<p class="mb-0"><small>' + value.size + ' KB</small></p>' + '</div>' + '</div>' + '<div class="d-flex flex-row flex-nowrap justify-content-end">' + '<div class="p-1">' + '<a href="' + value.url + '" target="_blank" class="files-attachment-link" title="瀏覽">' + '<i class="fa fa-eye"></i>' + '</a>' + '</div>' + '<div class="p-1">' + '<i class="fa fa-plus attachment-add" role="' + value.url + '" extension="' + value.extension + '"></i>' + '</div>' + '<div class="p-1">' + '<i class="fa fa-trash attachment-delete" role="' + value.filename + '.' + value.extension + '" title="刪除"></i>' + '</div>' + '</div>' + '</div>';
    });

    return template;
  }

  function initialize() {
    var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;

    getAttachments(page);
  }

  var hasAttachmentView = $('body').find('.attachments-viewer');
  if (hasAttachmentView.length > 0) {
    initialize();
  }

  $('body').on('click', '.attachment-page-link', function (e) {
    e.preventDefault();
    var page = $(this).attr('role');
    $('.current_page').val(page);
    getAttachments(page);
  });

  $('body').on('click', '.attachment-page-prevoius', function (e) {
    e.preventDefault();
    var page = $(this).attr('role');
    $('.current_page').val(page);
    getAttachments(page);
  });

  $('body').on('click', '.attachment-page-next', function (e) {
    e.preventDefault();
    var page = $(this).attr('role');
    $('.current_page').val(page);
    getAttachments(page);
  });

  $('body').on('click', '.btn-attachment-save', function (e) {
    e.preventDefault();
    $.ajax({
      url: '/backend/attachments',
      type: 'POST',
      cache: false,
      data: new FormData($('.attachment-form')[0]),
      processData: false,
      contentType: false,
      beforeSend: function beforeSend() {
        $('.btn-attachment-save').prop('disabled', true);
        $('.btn-attachment-save').html('文件上傳中...');
      },
      success: function success(res) {
        if (res.errors.length > 0) {
          var template = '<ol>';
          template += '<li>發生以下錯誤:</li>';
          for (var a = 0; a < res.errors.length; a++) {
            template += '<li> <i class="fa fa-times"> &nbsp;' + res.errors[a] + '</li>';
          }
          template += '</ol>';

          $('.attachment-form-alert-box').html(template);
          $('.attachment-form-alert-box').show('blind').delay(3000).hide('blind');
          $('.btn-attachment-save').prop('disabled', false);
          $('.btn-attachment-save').html('儲存');
          return false;
        }

        if (res.success.length > 0) {
          getAttachments(1);
        } else {
          $('.attachment-form-alert-box').html(res.failed[0]);
        }

        $('.btn-attachment-save').prop('disabled', false);
        $('.btn-attachment-save').html('儲存');
        $('.attachment-form')[0].reset();
      },
      error: function error(xhr) {
        console.log('Attachment save function abnormal (status: ' + xhr.status + ')');
      }

    });
  });

  $('body').on('click', '.attachment-delete', function (e) {
    e.preventDefault();
    var filename = $(this).attr('role');
    var csrf = $('input[name="_token"]').val();

    $.confirm({
      title: '確定刪除附件檔案?',
      content: '(刪除後檔案將不能恢復!)',
      buttons: {
        確定: function _() {
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': csrf
            }
          });

          $.ajax({
            url: "/backend/attachments/" + filename,
            type: "DELETE",
            dataType: 'JSON',
            cache: false,
            success: function success(res) {
              var current_page = parseInt($('.current_page').val());
              if (res.success.length > 0) {
                $.alert(res.success);
              }

              if (res.error.length > 0) {
                $.alert(res.error);
              }

              getAttachments(current_page);
            },
            error: function error(xhr) {
              console.log('Attachment delete function abnormal (status: ' + xhr.status + ')');
            }
          });
        },
        取消: function _() {
          $.alert('附件檔案刪除動作已取消');
        }
      }
    });
  });

  $('body').on('click', '.attachment-add', function (e) {
    e.preventDefault();
    var except_extension = ['pdf', 'xls', 'xlsx', 'doc', 'docx', 'txt'];
    var url = $(this).attr('role');
    var extension = $(this).attr('extension');
    if (jQuery.inArray(extension, except_extension) == -1) {
      $('#summernote').trigger('focus');
      $('#summernote').summernote('insertImage', url);

      $.confirm({
        theme: 'Modern',
        title: '圖片附加成功',
        content: '',
        icon: 'fa fa-check',
        type: 'green',
        buttons: {
          確定: function _() {}
        }

      });
    } else {
      $('#summernote').summernote('createLink', {
        text: '檔案下載',
        url: document.location.host + url,
        isNewWindow: true
      });

      $.confirm({
        theme: 'Modern',
        title: '檔案附加成功',
        content: '',
        icon: 'fa fa-check',
        type: 'green',
        buttons: {
          確定: function _() {}
        }

      });
    }
  });
});

/***/ })

/******/ });