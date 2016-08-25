<?php

$view = new View;

$db = new Database();

$view->Header("Profil użytkownika: ".$user->getDisplayName());

$result = $db->Select('applications',['*']);

$applications_data = array();
foreach($result as $key => $r){
    foreach($r as $k => $item){
        if($k != "id") $applications_data[$key][] = $item;
    }
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
                                  'Dodatkowe informacje'],
                "data"=> $applications_data,
                "class"=>"default-table"
]);

$view->Render();

print_obj($applications_data);

?>
