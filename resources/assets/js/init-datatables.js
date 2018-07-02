$(document).ready(function(){

  var locale = $('html').attr('lang');

  if(locale == 'zh-tw'){
    $.extend(true, $.fn.dataTable.defaults, {
      "language": {
              "url": "/js/datatable/locales/chinese.txt"
      }
    });	
  }



  $('#datatable').DataTable({
    responsive: true
  });



});