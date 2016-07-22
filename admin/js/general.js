$(document).ready(function(){

    //HIDE/SHOW LEFT SIDEBAR
    function hide_sidebar(duration, ajax){
        var me = $('.hideshow_sidebar').find('i');
        var left = $('#left-sidebar');
        var container = $('#container');

        me.removeClass('fa-chevron-left');
        me.addClass('fa-chevron-right');

        width = $(window).width() - ($(window).width()/100);

        left.animate({
            left:"-9%"
        },duration);
        container.animate({
            width: width,
            left: "1%"
        },duration);

        data_show = 0;

        if(ajax) $.ajax({
            method: "POST",
            url: "ajax/manage_lm.php",
            data: "display_lm="+data_show,
            complete: function(raw_data){
                console.log(raw_data.responseText);
            }
        });
    }
    function show_sidebar(duration, ajax) {
        var me = $('.hideshow_sidebar').find('i');
        var left = $('#left-sidebar');
        var container = $('#container');

        me.removeClass('fa-chevron-right');
        me.addClass('fa-chevron-left');

        left.animate({
            left: 0
        }, duration);
        container.animate({
            width: "90%",
            left: "10%"
        }, duration);

        data_show = 1;

        if(ajax) $.ajax({
            method: "POST",
            url: "ajax/manage_lm.php",
            data: "display_lm="+data_show,
            complete: function(raw_data){
                console.log(raw_data.responseText);
            }
        });
    }

    var data_show = $('#left-sidebar').attr('data-show');

    if(data_show == 0) hide_sidebar(0);
    else show_sidebar(1);

    $('.hideshow_sidebar').on('click touch', function (){
        var me = $(this).find('i');

        if(me.hasClass('fa-chevron-left')){
            hide_sidebar(300, true);
        }else{
            show_sidebar(300, true);
        }
    });


});