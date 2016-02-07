$(document).on('click', 'a', function(){
  var url = location.href.split('/');
  var urlLength = url.length - 1;
  $('.activeMenuItem').removeClass('activeMenuItem');
  $('.'+url[urlLength]).addClass('activeMenuItem');
  console.log($('#'+url[urlLength]));
});
