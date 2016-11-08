$(function(){
  var nameOrder = "none";
  var moduleOrder = "none";
  var yearsOrder = "none";
  var order;
  var text;
  var numberOfElements = 0;
  var context="none";
  var leng = $(".applications tr").length;
  var carter = " <span class='caret'></span>";
  //disable usable button
  $('.action').prop('disabled', true);
  //set sorting data
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
  //send sorting ajax
  $("#sendSortingData").click(function(){

    $.ajax({
      url: "ajax/sorting.applications.php",
      type: "POST",
      data: "nameOrder="+nameOrder+"&moduleOrder="+moduleOrder+"&yearsOrder="+yearsOrder,
    //  contentType: "application/json; charset=utf-8",
      // dataType: "json",
       complete: function(data){


              document.cookie = "additional="+data.responseText;
              window.location.reload(false)
          },
          error: function(e){
                console.log(e.message);

            }
    });

  });
  $(".in").click(function(){

    if(context == "none"){
      context = $(this).parent().parent().children('td:nth-child(6)').text();
      $('.action').prop('disabled', false);
      $("#types").attr('value', $(this).parent().parent().children('td:nth-child(6)').text());
      for(var i = 1; i < leng; i++){
        if($(".applications tr:nth-child("+i+")").children('td:nth-child(6)').text() != context){
          $(".applications tr:nth-child("+i+") td:last-child .in").attr("disabled", 'disabled');
        }else {
          numberOfElements +=1;
        }
      }
    }else{
        var tmpNumOfEle = 0;

        for(var i = 1; i < leng; i++){

          if(!$(".applications tr:nth-child("+i+") td:last-child .in").is(":checked")){
            tmpNumOfEle +=1;

          }
        }
        //if none of element is selected then enable all input in applications and disable action buttons
        if(tmpNumOfEle == leng-2 ){
          context = "none";

          $('.action').prop('disabled', true);
            for(var i = 1; i < leng; i++){

              $(".applications tr:nth-child("+i+") td:last-child .in").prop('disabled', false);
            }
        }
      }
    ;


  })
  function changeState(selector){
    order = selector.getAttribute("data-order");
    text = $(selector).text();
  }

});
