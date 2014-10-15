$(document).ready(function () {
    $('.type_menu a').click(function () {
        var type = $(this).attr('type');
        var product_id = $('.type_menu').attr('product_id');
        if (type == 'news') {
            var ajax_file = 'getNewsMonth';
        }
        if (type == 'press-releases') {
            var ajax_file = 'getPressReleaseMonth';
        }
        if (type == 'purchases') {
            var ajax_file = 'getPurchases';
        }

        if (type != 'all') {
            $.ajax({
                url: "/ajax/" + ajax_file + ".php?PRODUCT_ID=" + product_id,
                type: "GET",
                success: function (result) {
                    $('.product_wraper_main').hide();
                    $('.product_wraper').html(result);
                    $('.item_one_title').addClass('p_relative');
                    $('.product_wraper').addClass('block');
                    $('.product_wraper').show();
                    $('body,html').animate({ scrollTop: $('.product_wraper').offset().top }, 300);
                }
            });
        } else {
            $('.item_one_title').removeClass('p_relative');
            $('.product_wraper_main').show();
            $('.product_wraper').hide();
            $('body,html').animate({ scrollTop: $('.product_wraper_main').offset().top }, 300);
            $('.product_wraper').removeClass('block');
        }
        $('.type_menu a').removeClass('selected');
        $(this).addClass('selected');
    });
});