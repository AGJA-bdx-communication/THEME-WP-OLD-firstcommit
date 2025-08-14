$(document).ready(function(){
	
	if($("html").hasClass("csstransforms3d")){
		$('.card').hover(function(){
			$(this).addClass('flip');
		},function(){
			$(this).removeClass('flip');
		});
	} else{
		$('.card').hover(function(){
			$(this).find(".front").animate({top: -190}, 'fast');
		},function(){
			$(this).find(".front").animate({top: 0}, 'fast');
		});
 	}	

		//masonry
 	var $container = $('.cards');
	$container.masonry({
		columnWidth: 60,
		itemSelector: '.card',
		isAnimated: true,
		animationOptions: {
			duration: 400
		}
	});


});