$(document).on('click', 'li', function(){
  var url = location.href.split('/');
  var urlLength = url.length - 1;
  $('#topNav .activeTopMenuItem').removeClass('activeTopMenuItem');
  $('#topNav .'+url[urlLength]).addClass('activeTopMenuItem');
  console.log($('#'+url[urlLength]));
});
