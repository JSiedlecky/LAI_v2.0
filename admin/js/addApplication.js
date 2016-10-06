$(function(){
  var ilosc = 0;
  $(".check").click(function(){

    for(var i = 0; i < $(".check").length;i++ ){
        if($(".check")[i].checked){
          ilosc +=1;
        }
    }
    document.getElementById("numberOfApplication").innerHTML = "Zaznaczyłeś : "+ ilosc +" aplikacji";
    ilosc = 0;
  });

});
