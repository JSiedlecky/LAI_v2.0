$(document).ready(function(){

    $('.hideshow_sidebar').on('click touch', function (){
        var me = $(this).find('i');
        var left = $('#left-sidebar');
        var container = $('#container');

        if(me.hasClass('fa-chevron-left')){
            me.removeClass('fa-chevron-left');
            me.addClass('fa-chevron-right');

            left.animate({
                width: "10px"
            }, 300);
            container.animate({
                width: "calc(100%-10px)"
            },300);
        }else{
            me.removeClass('fa-chevron-right');
            me.addClass('fa-chevron-left');

            left.animate({
                width: "10%"
            }, 300);
            container.animate({
                width: "90%"
            },300);
        }
    });


});