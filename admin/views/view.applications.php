<?php
if(isset($_COOKIE["additional"])){
$additional = $_COOKIE["additional"];
?><script>document.cookie = "applications=; expires=Thu, 01 Jan 1970 00:00:00 UTC";</script><?php

$result = $view->db->Select('applications',['*'],[],$additional);
unset($_COOKIE["additional"]);
}else {

  $result = $view->db->Select('applications',['*']);
}

$applications_data = array();

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
        if($k == "status") $applications_data[$key][] = '<input type="checkbox" name="'.$id.'">';
    }
}

$applications_actions = '

';
$view->Custom('<script src="js/sorting.js"></script>');

$view->Header('Aplikacje');

$view->Section([
                "name"=>"Sortowanie",
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
');
$view->Section([
                "name"=>"Wyszukiwanie",
                "content"=>"",
                "class"=>"default-section"
]);
$view->Custom('
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

$view->Render();
