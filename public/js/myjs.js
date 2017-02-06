$('.carousel').carousel({
		interval: 2000
});
	

var offset=220;
var duration = 400;
$(window).scroll(function(){
	if ($(this).scrollTop()>offset) {
		$('#back-to-top').fadeIn(duration);
	}else{
		$('#back-to-top').fadeOut(duration);
	}
});
$('#back-to-top').click(function(){
	$('body').animate({scrollTop: 0}, duration);
});


$('.add-to-cart').click(function(e){
	e.preventDefault();
    $.ajax({
      url : "/?u=cartController/add_to_cart",
      type : "post",
      dataType:"text",
      data : {
           id: $(this).attr('data-id'),
            qty: $('[name="quantity"]').val()
      },
      success : function (result){
    	  $('.modal-content').html(result);  
      }
  	});
});

$('.modal-content').delegate('.item-delete a', 'click', function(){
	 $.ajax({
	      url : "/?u=cartController/update_modal",
	      type : "post",
	      dataType:"text",
	      data : {
	           id: $(this).attr('data-id')
	      },
	      success : function (result){
	    	  $('.modal-content').html(result);  
	      }
	  	});
})

$('.modal-content').delegate('.item-quantity input', 'change', function(){
	 $.ajax({
	      url : "/?u=cartController/update_modal",
	      type : "post",
	      dataType:"text",
	      data : {
	           id: $(this).attr('data-id'),
	           qty: $(this).val()
	      },
	      success : function (result){
	    	  $('.modal-content').html(result);  
	      }
	  	});
})

$('.cart').delegate('.quantity input', 'change', function(){

		 $.ajax({
	      url : "/?u=cartController/update_modal",
	      type : "post",
	      dataType:"text",
	      data : {
	           id: $(this).attr('data-id'),
	           qty: $(this).val()
	      },
	      success : function (result){
	    	  
	      }
	  	});
})

$('.cart .button a:first-child').click(function(e){
	e.preventDefault();
	location.reload();
})
