/** Список проектов **/

$(window).load(function(){
    
     //    меняем картинку товара на маску при наведении
    $('.products_block_one_yes').mouseenter(function (){
        
        var src = $(this).find('.img_small_item').attr('src');
        var pseudo_src = $(this).find('.img_small_item').data('id');
        
        $(this).find('.img_small_item').attr('src', pseudo_src);
        $(this).find('.img_small_item').data('id', src);
        $(this).find('.img_big_item').css({'opacity':1});
        $(this).find('.products_one_link').find('a').css({'color': 'white', 'border-bottom': '1px solid'});
        $(this).find('span').css({'color': 'white', 'border-bottom': '1px solid'});
        
    });
    $('.products_block_one_yes').mouseleave(function (){
        var src = $(this).find('.img_small_item').attr('src');
        var pseudo_src = $(this).find('.img_small_item').data('id');
        
        $(this).find('.img_small_item').attr('src', pseudo_src);
        $(this).find('.img_small_item').data('id', src);
        $(this).find('.img_big_item').css({'opacity':0});
        $(this).find('.products_one_link').find('a').removeAttr('style');
        $(this).find('span').removeAttr('style');
    });
    
     //    меняем картинку товара на маску при наведении
    $('.products_block_one_non').mouseenter(function (){
        $(this).parents('.products_block_one').find('.products_one_link').find('a').addClass('text_color');
//        $(this).parents('.products_block_one').find('span').addClass('text_color');
        
    });
    $('.products_block_one_non').mouseleave(function (){
        $(this).parents('.products_block_one').find('.products_one_link').find('a').removeClass('text_color');
//        $(this).parents('.products_block_one').find('span').removeClass('text_color');
    });
    
    
    
    //    устанавливаем высоту блоков на странице товаров

    function screen_num_fc(){

        if($('.products_block').width() > 1150) {
            screen_num = 4;
        } else {
            screen_num = 3;
        }
        return screen_num;

    }

    function block_state(screen){

        $.each($('.products_block'), function (){



            var round_block = $(this).data('id');

            var count_one = Math.ceil($(this).find('.products_block_one').length / screen);

            for (var i = 0; i < count_one; i++) {

                var h_ico = 0;

                var h_link = 0;

                var cur = [];

                var cur_num = (i*screen)+1;

                for (var j = cur_num; j < cur_num+screen; j++) {

                    cur.push($('.products_block[data-id="'+round_block+'"]').find('.products_block_one:nth-child('+j+')'));

                    if(h_ico < parseInt($('.products_block[data-id="'+round_block+'"]').find('.products_block_one:nth-child('+j+')').find('.products_block_one_ico').height())){

                        h_ico = parseInt($('.products_block[data-id="'+round_block+'"]').find('.products_block_one:nth-child('+j+')').find('.products_block_one_ico').height());

                    }

                    if(h_link < parseInt($('.products_block[data-id="'+round_block+'"]').find('.products_block_one:nth-child('+j+')').find('.products_one_link').height())){

                        h_link = parseInt($('.products_block[data-id="'+round_block+'"]').find('.products_block_one:nth-child('+j+')').find('.products_one_link').height());

                    }

                }

                $.each(cur, function() {

                    
                    $(this).find('.products_block_one_ico').height(h_ico);

                    $(this).find('.products_one_link').height(h_link);


                    $(this).find('.products_block_one_ico').find('div').css({'position':'absolute'});

                });
            }

        });

    }


    block_state(screen_num_fc());
    $('.products_block_one').animate({'opacity':1}, 100);

    $(window).resize(function() {

        $('.products_block_one').data('id', 'hide');
        $('.products_block_one, .products_block_one_ico, .products_one_link').removeAttr('style');
        $('.products_block_one_ico').find('div').removeAttr('style');

        block_state(screen_num_fc());

        $('.products_block_one').animate({'opacity':1}, 100);
        
    });
    
    $('.sub_menu').click(function() {

        $('.products_block_one').data('id', 'hide');
        $('.products_block_one, .products_block_one_ico, .products_one_link').removeAttr('style');
        $('.products_block_one_ico').find('div').removeAttr('style');

        block_state(screen_num_fc());

        $('.products_block_one').animate({'opacity':1}, 100);
        
    });
    





    $('.section_button').on('click', function(){
        if(!$(this).hasClass('selected')){
            if($(this).attr('section') != 'all'){
                $('.section').hide();
                $('.section_'+$(this).attr('section')).show();
                $('.section_button').removeClass('selected');
                $(this).addClass('selected');
            }else{
                $('.section').show();
                $('.section_button').removeClass('selected');
                $(this).addClass('selected');
            }
        }
    });




    $.each($('.img_big_item'), function() {
    
        var img_width = $(this).find('img').width();

        var par_width = $(this).parent('a').width();

        $(this).css({'left':(par_width - img_width) / 2+'px', 'width':img_width+'px'});

        var img_height = $(this).find('img').height();

        var this_height = $(this).height();

        var result_height = (this_height - img_height) / 2;

        if(result_height < 0)
            $(this).find('img').css({'marginTop':result_height+'px'});

    });
    
    
});