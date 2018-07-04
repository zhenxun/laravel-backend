$(document).ready(function(){

  $(".toggle-delete").click(function(e){
    e.preventDefault();
    var this_id = $(this).attr('role');
    var get_lang = $('html').attr('lang');
    var title = (get_lang == 'en')? 'Confirm delete':'確定刪除';
    var content = (get_lang == 'en')? 'If deleted, data will not be restored.':'資料刪除後將無法恢復';

        $.confirm({
          theme: 'Modern',
          title: title,
          content: content,
          icon: 'fa fa-question-circle-o',
          type: 'red',
          buttons: {
            confirm: function(){
              var is_delete_form_exist = $('body').find('.btn-delete').length > 0;
              if(is_delete_form_exist){
                $('body').find('#' + this_id).click();
              }
            },
            cancel: function(){}
          }

        });
  });

});