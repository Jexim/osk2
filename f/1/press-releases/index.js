$( document ).ready(function() {
    $('.filter_month span').click(function(){
        var month = $(this).attr('month');
        if(month!='00'){
            $('.all_news_list').hide();
            $('.news_list').show();
            var year =$('.filter_year .selected b').html();            
            $.ajax({
                    url: "/ajax/getPressReleaseMonth.php?YEAR=" + year + "&MONTH=" + month + "&PAGEN_1=1",
                    type: "GET",
                    success: function(result) {
                        $('.news_list').html(result);
                    }
                });
        } else {           
            $('.news_list').hide();
            $('.all_news_list').show();
        }
    });
    $('.b_submit').click(function(){
        $(this).parent('form').submit();
    });
});