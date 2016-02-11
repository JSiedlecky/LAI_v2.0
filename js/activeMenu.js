$(document).on('click', 'li', function(){
  var url = location.href.split('/');
  var urlLength = url.length - 1;
  $('#topNav .activeTopMenuItem').removeClass('activeTopMenuItem');
  $('#topNav .'+url[urlLength]).addClass('activeTopMenuItem');
  console.log($('#'+url[urlLength]));
});

$(document).on('click', '.menuBtn', function(){
        var item = $('.menuTopItem');
        if (item.is(":visible")){
			item.slideUp(400);
		}else{
			item.slideDown(400);
		}
});
