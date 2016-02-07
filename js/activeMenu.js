$(document).on('click', 'a', function(){
  var url = location.href.split('/');
  var urlLength = url.length - 1;
  $('.activeTopMenuItem').removeClass('activeTopMenuItem');
  $('#topNav .'+url[urlLength]).addClass('activeTopMenuItem');
  console.log($('#'+url[urlLength]));
});
