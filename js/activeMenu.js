$(document).ready(function(){
    var url = location.href.split('/');
    var urlLength = url.length - 1;
    if( url[urlLength] === "" ){
         url[urlLength] = "akademia";
    }
    $('#topNav .'+url[urlLength]).addClass('activeTopMenuItem');
});

$(document).on('click', '.bothMenuItem', function(){
  var url = location.href.split('/');
  var urlLength = url.length - 1;
  $('#topNav .activeTopMenuItem').removeClass('activeTopMenuItem');
  $('#topNav .'+url[urlLength]).addClass('activeTopMenuItem');
});

$(document).on('click', '.menuBtn', function() {
    console.log("obj");
    var item = $('.menuTopItem');
    if(item.is(":visible")){
        item.slideUp(400);
    }else{
        item.slideDown(400);
    }
});
