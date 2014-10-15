$( document ).ready(function() {

    $('.section_button').on('click', function(){
        if(!$(this).hasClass('selected')){
            $('.section').hide();
            $('.section_'+$(this).attr('section')).show();
            $('.section_button').parent('div').removeClass('selected');
            $(this).parent('div').addClass('selected');
        }
    });

   // $(".horizontal-table").tablesorter();
});