$(window).load(function(){

    $('.main_carousel_img, .main_carousel_text').click(function(){

        var select_video = $(this).parent('.main_carousel_one').find('.video_in_carousel');

        var data_curr = $(this).parent('.main_carousel_one').find('.video_in_carousel').data('id');

        var curr_width = $(this).parent('.main_carousel_one').width();

        console.log(data_curr);

        if (select_video.length === 1) {
            $(this).parent('.main_carousel_one').find('.main_carousel_img').hide();
            $(this).parent('.main_carousel_one').find('.main_carousel_text').hide();

            $.ajax({
                url: "/ajax/getVideoByID.php?ID="+data_curr+"&WIDTH="+curr_width+"&HEIGHT=542",
                type: "GET",
                success: function(result) {
                    $('.video_in_carousel').html(result);
                }
            });
            $(this).parent('.main_carousel_one').find('.video_in_carousel').show();
            
        } else {
            
        }

    });

    $('.main_big_carousel').on('jcarousel:scroll', function(event, carousel, target, animate) {
            $('.video_in_carousel').html('').hide();
            $('.main_carousel_img').show();
            $('.main_carousel_text').show();
    });

    $('.main_big_carousel').on('jcarousel:scrollend', function(event, carousel, target, animate) {
            $('.main_carousel_text').stop().animate({'opacity':1}, 800);
    });

    $('.main_big_carousel li').width($('.main_carousel_wrapper').width());
	$('.main_big_carousel li').height($('.main_carousel_wrapper').width()/1.594);

	$(window).resize(function(){
		$('.main_big_carousel li').width($('.main_carousel_wrapper').width());
        $('.main_big_carousel li').height($('.main_carousel_wrapper').width()/1.594);
	});


// каруселька преьюшек
	$('.main_big_carousel').jcarousel({
        wrap: 'circular'
    });

    $('.main_prev').click(function() {
            $('.main_carousel_text').stop().animate({'opacity':0}, 250, function(){
                $('.main_prev').jcarouselControl({
                    target: '-=1'
                });
                $('.main_prev').trigger('click');
            });
            $('.main_prev').jcarouselControl('destroy');
    });

    $('.main_next').click(function() {
            $('.main_carousel_text').stop().animate({'opacity':0}, 250, function(){
                $('.main_next').jcarouselControl({
                    target: '+=1'
                });
                $('.main_next').trigger('click');
            });
            $('.main_next').jcarouselControl('destroy');
    });

    $('.main_big_carousel_pagination > a').click(function(event) {
        $('.main_big_carousel_pagination').jcarouselPagination('destroy');
        
        $('.main_carousel_text').stop().animate({'opacity':0}, 250, function(){
            $('.main_big_carousel_pagination').jcarouselPagination({
                item: function(page) {
                    return '<a></a>';
                }
            });
        });

    });

    $('.main_big_carousel_pagination').jcarouselPagination({
        item: function(page) {
            return '<a></a>';
        }
    });

    $('.main_big_carousel_pagination a:first').addClass('active');

    $('.main_big_carousel_pagination').on('jcarouselpagination:active', 'a', function() {
        $(this).addClass('active');
    }).on('jcarouselpagination:inactive', 'a', function() {
        $(this).removeClass('active');
    });





    $('.main_menu_btn').click(function(event){
        event.stopPropagation()

        if($('.main_menu').hasClass('show')) {
            $('.main_menu').removeClass('show');
            $('.hight_liyout').hide();
            $('.all_sait').removeAttr('style');
        } else {
            $('.main_menu').addClass('show');
            $('.hight_liyout').show();
            $(this).parent('.all_sait').css({opacity: '1'});
        }
    });
    $('body').click(function(){
        $('.main_menu').removeClass('show');
        $('.hight_liyout').hide();
        $('.all_sait').removeAttr('style');
    });
    $('.main_menu').click(function(event){
        event.stopPropagation()
    });

    $.each($('.main_carousel_img'), function() {
        var img_height = $(this).height();
        var img_width = $(this).width();

        $(this).css({'top':($('.main_big_carousel li').height() - img_height)/2+'px'});
        $(this).css({'left':($('.main_big_carousel li').width() - img_width)/2+'px'});

        $(this).animate({'opacity':0.6});

    });

    $(window).resize(function(event) {
        $.each($('.main_carousel_img'), function() {
            var img_height = $(this).height();
            var img_width = $(this).width();

            $(this).css({'top':($('.main_big_carousel li').height() - img_height)/2+'px'});
            $(this).css({'left':($('.main_big_carousel li').width() - img_width)/2+'px'});

            $(this).animate({'opacity':0.6});

        });
    });


    $.each($('.main_carousel_text'), function() {
        $(this).css({top: ($('.main_big_carousel li').height() - $(this).height()) / 2 +'px'}).animate({'opacity':1});
    });

    var curr_width_ico = $('.news_three_blocks_img').width();
    $.each($('.news_three_blocks_img'), function() {
        $(this).height(curr_width_ico/1.515).animate({'opacity':1});
    });

    $(window).resize(function() {
        var curr_width_ico_r = $('.news_three_blocks_img').width();
        $.each($('.news_three_blocks_img'), function() {
            $(this).height(curr_width_ico_r/1.515);
        });
    });

    $(window).resize(function() {
        $.each($('.main_carousel_text'), function() {
            $(this).css({top: ($('.main_big_carousel li').height() - $(this).height()) / 2 +'px'});
        });
    });

});