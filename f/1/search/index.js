$(document).ready(function () {
    var inProgress = false;
    var page = 2;
    $('.type_filter span').click(function () {
        var type = $(this).attr('type');
        if (!inProgress) {
            inProgress = true;
            if (type != 'all') {
                $.ajax({
                    url: "/ajax/getSearchType.php?TYPE=" + type + "&SEARCH_TEXT=" + $('input[name=SEARCH_TEXT]').val() + "&PAGEN_1=1",
                    type: "GET",
                    success: function (result) {
                        $('.search_list').html(result);
                        inProgress = false;
                        page = 2;
                    }
                });
            } else {
                $.ajax({
                    url: "/ajax/getSearchType.php?SEARCH_TEXT=" + $('input[name=SEARCH_TEXT]').val() + "&PAGEN_1=1",
                    type: "GET",
                    success: function (result) {
                        $('.search_list').html(result);
                        inProgress = false;
                        page = 2;
                    }
                });
            }
        }
    });
    $('.b_submit').click(function () {
        $(this).parent('form').submit();
    });
    //Подгрузка страниц на AJAX
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            var count = $('input[name=count]').val();
            var type = $('.type_filter div.selected span').attr('type');
            if (!inProgress && page <= count) {
                var url = url = "/ajax/getSearchType.php?SEARCH_TEXT=" + $('input[name=SEARCH_TEXT]').val() + "&PAGEN_1=" + page;
                if (type != 'all') {
                    url = "/ajax/getSearchType.php?TYPE=" + type + "&SEARCH_TEXT=" + $('input[name=SEARCH_TEXT]').val() + "&PAGEN_1=" + page;
                }
                inProgress = true;
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (result) {
                        $('.search_list').append(result);
                        inProgress = false;
                        page++;
                    }
                });
            }
        }
    });
});