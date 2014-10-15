$(document).ready(function(){

	$('.state_link div, .state_ico').mouseenter(function() {
		var curr_img = $(this).parents('.state_company_block_one').find('.active');
		$(this).parents('.state_company_block_one').find('.state_link').find('a').css({'color':'white'});
		curr_img.removeClass('active');
		curr_img.next('img').addClass('active');
	});

	$('.state_link div, .state_ico').mouseleave(function() {
		/* Act on the event */
		var curr_img = $(this).parents('.state_company_block_one').find('.active');
		$(this).parents('.state_company_block_one').find('.state_link').find('a').removeAttr('style');
		curr_img.removeClass('active');
		curr_img.prev('img').addClass('active');
	});

});