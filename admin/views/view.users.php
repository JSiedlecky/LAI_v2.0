<?php
$view->Custom('
<form method="GET" action="#" class="btn-group" role="group" aria-label="...">
  <p>
    <button type="submit" class="btn btn-default action" name="page" value="addUser">Dodaj użytkownika </button>
    <button type="button"  class="btn btn-default action delete" name="deleteApplication">Usun</button>
    <input type="text" class="hidden" id="types" name="type" value="none">
  </p>
</form>
');

$result = $view->db->Select("users",["display_name",'idu']);
$view->Custom('<table class="default-table applications"><thead><tr><th class="t_name" colspan="2">Lista Użytkowników</th></tr><tr><th class="t-ordinal">LP</th><th class="t-columns">Nazwa użytkowników</th></tr></thead><tbody>');
$html="";
$lp = 1;
foreach ($result as $key =>$value) {

  $html .= '<tr><td class="t-ordinal">'.$lp.'</td><td class="t-columns">'.$value['display_name'].'</td><td><input type="checkbox" name="checked" value='.$value["idu"].'></td></tr>';
  $lp += 1;
}
$view->Custom($html);
$view->Custom("</form>");
$view->Render();
?>
