$(window).load(function(){

    $('.navigation li.with_icon.news').css({
        'top': parseInt($('#news').offset().top-280)+'px'
    });

    $('.navigation li.with_icon.cont').css({
        'top': parseInt($('#contacts').offset().top-280)+'px'
    });

    $('.navigation li.with_icon.photo').css({
        'top': parseInt($('#gallery').offset().top-280)+'px'
    });
    $('.navigation li').animate({'opacity':1}, 100);


    $(window).resize(function() {
        $('.navigation li.with_icon.news').css({
            'top': parseInt($('#news').offset().top-280)+'px'
        });
        $('.navigation li.with_icon.cont').css({
            'top': parseInt($('#contacts').offset().top-280)+'px'
        });
        $('.navigation li.with_icon.photo').css({
            'top': parseInt($('#gallery').offset().top-280)+'px'
        });
    });

});