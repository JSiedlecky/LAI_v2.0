$(function(){
  //Change checkbox value
  $("#userFrom input[type='checkbox']").click(function(){
    if(  $(this).prop("value")){
      $(this).prop("value", "1");
    }
    else{
        $(this).prop("value", "0");
    }
  });
    $("input[type='checkbox']").click(function(){

    });
//sends ajax request
  $("#actionUsersForm").click(function(){
    var allrows = $('form');
    var data = {};

    if(validatePayments(allrows)){
      allrows.each(function(i){
        data[i] = {
          'nickname'      : $(this).find('input[name="nickname"]').val(),
          'login' : $(this).find('input[name="login"]').val(),
          'pswd'       : $(this).find('input[name="pswd"]').val(),
          'mail': $(this).find('input[name="mail"]').val(),
          'menuApp'  : $(this).find('input[name="menuApp"]').val(),
          'actionApp'  : $(this).find('input[name="actionApp"]').val(),
          'addApp'  : $(this).find('input[name="addApp"]').val(),
          'delApp'  : $(this).find('input[name="delApp"]').val(),
          'sortApp'  : $(this).find('input[name="sortApp"]').val(),
          'menuGrup'  : $(this).find('input[name="menuGrup"]').val(),
          'addGrp'  : $(this).find('input[name="addGrp"]').val(),
          'delGrp'  : $(this).find('input[name="delGrp"]').val(),
          'modifyGrp'  : $(this).find('input[name="modifyGrp"]').val(),
          'sortGrp'  : $(this).find('input[name="sortGrp"]').val(),
          'menuPay'  : $(this).find('input[name="menuPay"]').val(),
          'addPay'  : $(this).find('input[name="addPay"]').val(),
          'modifyPay'  : $(this).find('input[name="modifyPay"]').val(),
          'delPay'  : $(this).find('input[name="delPay"]').val(),
          'menuNews'  : $(this).find('input[name="menuNews"]').val(),
          'hisNews'  : $(this).find('input[name="hisNews"]').val(),
          'menuUsers'  : $(this).find('input[name="menuUsers"]').val(),
          'userId'  : $(this).find('input[name="userId"]').val()
        }});


    $.ajax({
      url: "ajax/userFormAction.php",
      type: "post",
      data: data,
       complete: function(data){
              alert("Udało się dodać/zmodifikować urzytkownika");
              window.location.href = 'http://127.0.0.1/LAI_v2.0/admin/index.php?page=users';
              console.log(data.responseText);
          },
          error: function(e){
                console.log(e.message);

            }
    });
  }else{
    alert("Prosze wprowadzić dane");
  }
});
});
