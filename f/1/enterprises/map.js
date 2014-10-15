/** Список проектов **/

$(window).load(function(){
    if($('input[name=leng]').val()=='s1'){
        var all_city = 'Все города';
    }else{
        var all_city = 'All cities';
    }
    $("select[name=city]").change(function () {
        $('.city_form').submit();
    });
    $('.switcher_item').on('click', function(){
        $('select[name=city] option:first').attr('selected','1');
        $('.select_field_enterprises .custom-text').html(all_city);
        if(!$(this).hasClass('selected')){
            if($(this).attr('characteristics') != 'all'){
                $('.enterprises').hide();
                $('.characteristics_'+$(this).attr('characteristics')).show();
                $('.switcher_item').removeClass('selected');
                $(this).addClass('selected');
            }else{
                $('.enterprises').show();
                $('.switcher_item').removeClass('selected');
                $(this).addClass('selected');
            }
        }
    });
});