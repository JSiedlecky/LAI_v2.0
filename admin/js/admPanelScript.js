$(function(){
    $('.menuBtn').click(function(){
        if($('.menuItem').css('display') == 'none')
        $('.menuItem').slideDown(500);
        else if($('.menuItem').css('display') == 'block')
        $('.menuItem').slideUp(500);
    });
});
