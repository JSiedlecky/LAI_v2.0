$(function(){
  var leng = $(".applications tr").length;
  var list = [];
  var test;
  $('.action').prop('disabled', true);
  $(".delete").click(function(){
    $('#deleteModal').modal('toggle');
  });
  $("#deleteBtn").click(function(){
        for(var i = 0; i < leng-2; i++){
          if($(".in")[i].checked){
            list.push($(".in")[i].value);
          }
        }

    $.ajax({
      url: "ajax/delete.applications.php",
      type: "POST",
      data: {idList : list},

       complete: function(data){

          goToApplication();

          },
          error: function(e){
                console.log(e.message);

            }
    });
  })
});
