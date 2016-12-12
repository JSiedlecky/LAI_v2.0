<?php
#Form to choose action
$view->Custom('
<form method="POST" action="index.php?page=userForm" class="btn-group" role="group" aria-label="...">
  <p>

    <button type="submit" class="btn btn-default action" id="adduser" name="page" value="userForm">Dodaj użytkownika </button>
    <button type="submit" class="btn btn-default action disabled" id="changeuser" name="page" value="userForm">Edytuj użytkownika </button>
    <button type="button"  class="btn btn-default action delete" name="deleteApplication" data-toggle="modal" data-target="#deleteModal">Usun</button>


    <input type="text" class="hidden" id="types" name="type" value="none">
  </p>

');

#view of all users
//$result = $view->db->Select("users",["display_name",'idu']);
$result = $view->db->Query("SELECT `display_name`,`idu` FROM `users` WHERE `idu` > 1 ");
$view->Custom('<table class="default-table"><thead><tr><th class="t_name" colspan="2">Lista Użytkowników</th></tr><tr><th class="t-ordinal">LP</th><th class="t-columns">Nazwa użytkowników</th></tr></thead><tbody>');
$html="";
$lp = 1;
foreach ($result as $key =>$value) {

  $html .= '<tr><td class="t-ordinal">'.$lp.'</td><td class="t-columns">'.$value['display_name'].'</td><td><input class="userInput" type="checkbox" name="user" value='.$value["idu"].'></td></tr>';
  $lp += 1;
}
$view->Custom($html);
$view->Custom('<script src="js/general.js"></script>');
$view->Custom("</table>");
$view->Custom("</form>");
$view->Custom('<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Usuwanie</h4>
      </div>
      <div class="modal-body">
        <p>Czy jesteś pewny by usunać urzytkownika</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
        <button type="button" class="btn btn-danger" id="deleteBtnUser">USUŃ</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->');
$view->Render();
?>
