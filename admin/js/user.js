$(function(){
  $("#actionUsersForm").click(function(){

    $.ajax({
      url: "ajax/userFormAction.php",
      type: "POST",
      data: $('form').serializeArray(),

       complete: function(data){

              window.location.href = 'http://127.0.0.1/LAI_v2.0/admin/index.php?page=users';

          },
          error: function(e){
                console.log(e.message);

            }
    });

  });


});
