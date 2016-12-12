<?php

if(!$user->getPermissions()[$_GET['page']]){
  header("location: index.php");
}
#read additionals form cookies and send query to get applications
if(isset($_COOKIE["additional"])){
$additional = $_COOKIE["additional"];
?><script>document.cookie = "applications=; expires=Thu, 01 Jan 1970 00:00:00 UTC";</script><?php
unset($_SESSION['addIds']);
unset($_COOKIE["additional"]);
$result = $view->db->Select('applications',['*'],[],$additional);
}else {


  $result = $view->db->Select('applications',['*']);
}
setcookie("additional", "", time()-3600);

$applications_data = array();
#preaper the  sutdent table
foreach($result as $key => $r){
    foreach($r as $k => $item){
        //id will be used to edit the row
        if($k == "id") $id = $item;
        //adding regular item to a row
        if($k != "id" && $k != "status") $applications_data[$key][] = $item;
        //if status is set to null we send the apropriate message
        if($k == "status" && $item == "") $applications_data[$key][]  = "Nie rozpatrzono.";
        // else we add a normal item to the row
        else if($k == "status" && $item != "") $applications_data[$key][] = $item;
        //adding a checkbox to edit the row
        if($k == "status") $applications_data[$key][] = '<input class="in" type="checkbox" value="'.$id.'" name="id[]">';
    }
}

$applications_actions = '

';

//sets html elements
$view->Header('Aplikacje');

if($user->getPermissions()['isGm'] || $user->getPermissions()['app_sort']){
  $view->Section([
                  "name"=>"Sortowanie i Wyszukiwanie",
                  "content"=>"",
                  "class"=>"default-section"
  ]);
  $view->Custom('<div class="btn-group" role="group">
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      <span id="nameOrderName">Nazwiskami</span>
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" id="nameOrder" aria-labelledby="dropdownMenu1">
      <li><a href="#" data-order="ASC">Nazwiskami od A do Z</a></li>
      <li><a href="#" data-order="DESC">Nazwiskami od Z do A</a></li>
      <li><a href="#" data-order="none">Bez sortownia nazwiskami</a></li>
    </ul>
  </div>
  </div>

    <div class="btn-group" role="group" aria-label="...">

  <div class="btn-group" role="group">

      <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <span id="moduleOrderName">Modułami</span>
        <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" id="moduleOrder" aria-labelledby="dropdownMenu1">
          <li><a href="#"  data-order="Cisco">Cisco</a></li>
          <li><a href="#"  data-order="Aplikacje">Aplikacje</a></li>
          <li><a href="#"  data-order="none">Bez sortownia modułami</a></li>
        </ul>
      </div>
    </div>
    <div class="btn-group" role="group">

        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle " id="yearsBtn" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <span id="yearsOrderName">Latami</span>
          <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" id="yearsOrder" aria-labelledby="dropdownMenu1">
            <li><a href="#" data-order="Dwa lata">Dwa lata</a></li>
            <li><a href="#" data-order="Rok">Rok</a></li>
            <li><a href="#" data-order="none">Bez sortownia latami</a></li>
          </ul>
        </div>
      </div>
       <button type="button" id="sendSortingData" class="btn btn-default">Wyszukaj / Sortuj</button>
  </div>
  ');
}
if($user->getPermissions()['isGm'] || $user->getPermissions()['app_action']){
  $view->Section([
                  "name"=>"Akcje",
                  "content"=>"",
                  "class"=>"default-section"
  ]);
  $view->Custom('
  <form method="GET" action="#" class="btn-group" role="group" aria-label="...">
    <p>'.
      ($user->getPermissions()['isGm'] || $user->getPermissions()['app_add'] ? '<button type="submit" class="btn btn-default action" name="page" value="prepareStudent">Kontynuuj</button>' : '').
      ($user->getPermissions()['isGm'] || $user->getPermissions()['app_delete'] ? '<button type="button"  class="btn btn-default action delete" name="deleteApplication">Usun</button> ' : '').
      '<input type="text" class="hidden" id="types" name="type" value="none">
    </p>
  ');
}
$view->Table([
                "name"=>"Lista aplikacji",
                "ordinal"=>true,
                "column_names"=> ['Imie',
                                  'Nazwisko',
                                  'Email',
                                  'Telefon',
                                  'Moduł',
                                  'Lata',
                                  'Tydzień/weekend',
                                  'Dodatkowe informacje',
                                  'Status'],
                "data"=> $applications_data,
                "class"=>"default-table applications",
                "html" => false
]);
$view->Custom('</form>');
$view->Custom('<script src="js/sorting.js"></script>');
//delete modal
$view->Custom('<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Usuwanie Aplikacji</h4>
      </div>
      <div class="modal-body">
        <p>Czy na pewno chcesz usunąć te aplikacje</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
        <button type="button" class="btn btn-danger" id="deleteBtn">USUŃ</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->');
$view->Custom('<script src="js/deleteApplication.js"></script>');
$view->Render();
