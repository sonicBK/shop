$(document).ready(function(){
  $('.toggle').click(function(){

      var _this = $(this);
        $.ajax({
              url : "?u=productController/update_status",
              type : "get",
              dataType:"json",
              data : {
                   id: $(this).attr('data-id'),
                    status: $(this).attr('status')
              },
              success : function (data){
                _this.attr('status', data.status);
                _this.html(data.icon);
              }
          });

    });

})