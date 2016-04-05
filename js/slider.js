$(document).ready(function(){
    var width = 1500;
    var animationSpeed = 1000;
    var pause = 3000;
    var currentSlide = 1;

    var $slider = $('.slider');
    var $slides = $slider.find('.slide');

    setInterval(function(){
        $slider.animate({'margin-left':'-='+width}, animationSpeed, function(){
            currentSlide++;
            if(currentSlide === $slides.length){
                $slider.css('margin-left',0);
                currentSlide = 1;
            }
        });
    }, pause);

});
