$(document).ready(function(){
    var width = "1500px";
    var animationSpeed = 1000;
    var pause = 3000;
    var currentSlide = 1;
    console.log('elo');

    var $slider = $('.slider');
    var $slides = $slider.find('.slide');

    setInterval(function(){
        $slider.animate({'margin-left':'-='+width}, animationSpeed, function(){
            currentSlide++;
            if(currentSlide === $slides.length){
                $slider.css('margin-left',0);
                currentSlide = 1;
            }
            console.log('elo');
        });
    }, pause);
});
