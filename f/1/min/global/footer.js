$(document).ready(function($) {
	$('#page.page_bg').css({'min-height': $(window).height() - $('#footer').height()+'px'});

	$(window).resize(function(event) {
		$('#page.page_bg').css({'min-height': $(window).height() - $('#footer').height()+'px'});
	});
});
	