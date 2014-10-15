/** Список проектов **/

$(window).load(function(){
    if($('input[name=leng]').val()=='s1'){
        var all_city = 'Все города';
    }else{
        var all_city = 'All cities';
    }
    $("select[name=city]").change(function () {
        $('.switcher_item').removeClass('selected');
        $('.characteristics_all').addClass('selected');
        var characteristics = $(this).val();
        if(city=='00'){
            $('.enterprises').show();
        } else {
            $('.enterprises').hide();
            $('.characteristics_'+characteristics).show();
        }
    });
    
    $(".item__city").click(function () {
        var city = $(this).attr('city');
        if(city!='undefined'){
            $('select[name=city] option.select_city_'+city).attr('selected','1');
            $('.select_field_enterprises .custom-text').html($('select[name=city] option.select_city_'+city).html());
            if(city=='00'){
                $('.enterprises').show();
            } else {
                $('.enterprises').hide();
                $('.city_'+city).show();
            }
        }
    });
    
    $('.switcher_item').on('click', function(){       
        if(!$(this).hasClass('selected')){
            $('select[name=city] option:first').attr('selected','1');
            $('.select_field_enterprises .custom-text').html(all_city);
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
    
    var SORTER = {};
    SORTER.sort = function(which, dir) {
      SORTER.dir = (dir == "desc") ? -1 : 1;
      $(which).each(function() {
        var sorted = $(this).find("> div.enterprises").sort(function(a, b) {
          return $(a).text().toLowerCase() > $(b).text().toLowerCase() ? SORTER.dir : -SORTER.dir;
        });
        $(this).append(sorted);
      });
    };
    
    $('.switch_enterprises__name div').click(function() {
        if($('.list_by_name').css('display')=='none'){
            $('.list_by_name').css('display', 'block');
            $('.list_by_city').css('display', 'none');
        }
        if($('.switch_enterprises__name').val()=='asc'){
            SORTER.sort('.list_by_name', 'desc');
            $('.switch_enterprises__name').val('desk');
            $('.switch_enterprises__name div').removeClass('switch_block_current_down');           
            $('.switch_enterprises__city div').removeClass('switch_block_current_down');
            $('.switch_enterprises__city div').removeClass('switch_block_current_up'); 
            $('.switch_enterprises__name div').addClass('switch_block_current_up');             
        } else {
            SORTER.sort('.list_by_name');
            $('.switch_enterprises__name').val('asc');
            $('.switch_enterprises__name div').removeClass('switch_block_current_up');           
            $('.switch_enterprises__city div').removeClass('switch_block_current_down');
            $('.switch_enterprises__city div').removeClass('switch_block_current_up');  
            $('.switch_enterprises__name div').addClass('switch_block_current_down');
        }
    });
    
    $('.switch_enterprises__city div').click(function() {
        if($('.list_by_city').css('display')=='none'){
            $('.list_by_city').css('display', 'block');
            $('.list_by_name').css('display', 'none');
            $('.switch_enterprises__name div').removeClass('switch_block_current_down');
            $('.switch_enterprises__name div').removeClass('switch_block_current_up');  
        }
        if($('.switch_enterprises__city').val()=='asc'){
            $('.list_by_city_desk').hide();
            $('.list_by_city_asc').show();
            $('.switch_enterprises__city').val('desk');
            $('.switch_enterprises__city div').removeClass('switch_block_current_up');
            $('.switch_enterprises__name div').removeClass('switch_block_current_down');
            $('.switch_enterprises__name div').removeClass('switch_block_current_up');  
            $('.switch_enterprises__city div').addClass('switch_block_current_down');
        } else {
            $('.list_by_city_asc').hide();
            $('.list_by_city_desk').show();
            $('.switch_enterprises__city').val('asc');
            $('.switch_enterprises__city div').removeClass('switch_block_current_down');
            $('.switch_enterprises__name div').removeClass('switch_block_current_down');
            $('.switch_enterprises__name div').removeClass('switch_block_current_up');
            $('.switch_enterprises__city div').addClass('switch_block_current_up');         
        }
    });
});