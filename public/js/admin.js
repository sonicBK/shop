$(document).ready(function(){

	$('.list-menu li:has(ul)>a').append('<i class="fa fa-angle-left right"></i>');


	$('.list-menu li:has(ul)>a').click(function(e){
		e.preventDefault();
		if ($(this).parent().hasClass('active')) {
			$(this).parent().removeClass('active');
			$(this).parent().children('ul').slideUp();
		} else{
			$(this).parent().siblings().removeClass('active');
			$(this).parent().siblings().children('ul').slideUp();
			$(this).parent().addClass('active');
			$(this).parent().children('ul').slideDown();
		}
	});
});
