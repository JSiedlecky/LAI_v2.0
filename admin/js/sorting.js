$(function(){
  var nameOrder = "none";
  var moduleOrder = "none";
  var yearsOrder = "none";
  var order;
  var text;
  var carter = " <span class='caret'></span>";
  $("#nameOrder>li>a").click(function(){
    changeState(this);
    nameOrder = order;

    $("#nameOrderName").text(text);

  });
  $("#moduleOrder>li>a").click(function(){
    changeState(this);
    moduleOrder = order;
    if(moduleOrder == "Aplikacje"){
      $("#yearsBtn").addClass('disabled');

    }else{
      $("#yearsBtn").removeClass('disabled');
    }
    $("#moduleOrderName").text(text);

  });
  $("#yearsOrder>li>a").click(function(){
    changeState(this);
    yearsOrder = order;
    if(yearsOrder != "none"){
      $("#moduleOrder>li:nth-child(2)").addClass('disabled');


    }else{
      $("#moduleOrder>li:nth-child(2)").removeClass('disabled');
    }
    $("#yearsOrderName").text(text);

  });
  $("#sendSortingData").click(function(){

    $.ajax({
      url: "ajax/sorting.applications.php",
      type: "POST",
      data: "nameOrder="+nameOrder+"&moduleOrder="+moduleOrder+"&yearsOrder="+yearsOrder,
    //  contentType: "application/json; charset=utf-8",
      // dataType: "json",
       complete: function(data){
              console.log('SEND'+data.responseText);

              document.cookie = "additional="+data.responseText;
              window.location.reload(false)
          },
          error: function(e){
                console.log(e.message);

            }
    });

  });
  function changeState(selector){
    order = selector.getAttribute("data-order");
    text = $(selector).text();
  }

});
