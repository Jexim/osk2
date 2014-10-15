	$('.navigation li.with_icon.cont').css({
        'top': parseInt($('#contacts').offset().top-280)+'px'
    });
    $('.navigation li').animate({'opacity':1}, 100);


    $(window).resize(function() {
        $('.navigation li.with_icon.cont').css({
            'top': parseInt($('#contacts').offset().top-280)+'px'
        });
    });