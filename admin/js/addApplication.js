$(function(){
  var ilosc = 0;
  var data = [];
  //on load btn check
  function amountofCheck(){
    var checkIdList = [];
    for(var i = 0; i < $(".check").length;i++ ){
        if($(".check")[i].checked){
          ilosc +=1;
            checkIdList.push($(".check")[i].value)
        }
    }
    diableAddBtn()
    document.getElementById("numberOfApplication").innerHTML = "Zaznaczyłeś : "+ ilosc +" aplikacji";
    ilosc = 0;
  }
  function diableAddBtn( ){

    if(ilosc == 0){
      $(".makeStudentBtn").addClass("disabled");
    }
    else {
      $(".makeStudentBtn").removeClass("disabled");
    }
  }

  amountofCheck();

  $(".check").click(function(){
    amountofCheck();

  });

  $(".makeStudentBtn").click(function(){
    var checked =
    $.ajax({
      url: "ajax/make.student.php",
      type: "POST",
      data: {type: typeOf, idu : idlist, idg : this.value },

       complete: function(data){
              console.log('SEND'+data.responseText);
              for(var i = 0; i < $(".check").length;i++ ){
                  if($(".check")[i].checked){
                    $($(".check")[i]).closest( "tr" ).addClass("hidden");
                    $(".check")[i].checked = false;
                  }
              }
              amountofCheck();

          },
          error: function(e){
                console.log(e.message);

            }
    });
  })


});
