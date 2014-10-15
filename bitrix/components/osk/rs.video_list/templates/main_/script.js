$(document).ready(function(){      
    var page = 2;   
    var count = $('input[name=count]').val();
    var inProgress = false;       
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()  && !inProgress && page <= count) {            
            var url = "/ajax/getVideo.php?PAGEN_1="+page;
            if($('.filter_section .selected').attr('section') != 'all'){
                url = "/ajax/getPhoto.php?PAGEN_1="+page+"&SECTION="+$('.filter_section .selected').attr('section');
            }            
            inProgress = true;
            $.ajax({
                url: url,
                type: "GET",
                success: function(result) {                  
                    page++;
                    $('.gallery_mansory').append(result);
                    count = $('input[name=count]').val();
                    inProgress = false;
                }
            });
        }
    });
    
    $('.switcher_item').on('click', function(){       
        if(!$(this).hasClass('selected')){
                if($(this).attr('section') != 'all'){
                url = "/ajax/getVideo.php?PAGEN_1=1&SECTION="+$(this).attr('section');
                inProgress = true;                 
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(result) {
                        page = 2; 
                        $('.gallery_mansory').html(result);
                        count = $('input[name=count]').val();
                        inProgress = false;       
                    }
                });
                $('.switcher_item').removeClass('selected');
                $(this).addClass('selected');
            }else{
                url = "/ajax/getVideo.php?PAGEN_1=1";
                inProgress = true;                 
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(result) {
                        $('.gallery_mansory').html(result);
                        page = 2; 
                        count = $('input[name=count]').val();
                        inProgress = false;                
                    }
                });
                $('.switcher_item').removeClass('selected');
                $(this).addClass('selected');
            }
        }
    });
    $(".video").fancybox({
        'titlePosition' : 'inside',
        'transitionIn' : 'none',
        'transitionOut' : 'none'
    });

});