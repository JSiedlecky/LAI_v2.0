<?php

$view = new View();

$db = new Database();



$result = $db->Select('applications',['*']);

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

$view->header('Aplikacje');

$view->Section([
                "name"=>"Sortowanie",
                "content"=>'',
                "class"=>"default-section"
]);

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
                "class"=>"default-table applications"
]);

$view->Render();
