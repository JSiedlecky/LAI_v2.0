<?php

$view = new View();

$result = $view->db->Select('groups');

$groups = ParseToTable($result);

$view->Header('Grupy');

$view->Table([
              "name"=>"Lista grup",
              "ordinal"=>false,
              "column_names"=> ['LP',
                                'Nazwa Grupy',
                                'Moduł',
                                'Lata',
                                'Tydzień/weekend',
                                'Ilość studentow',
                                'Status'],
                                "data"=> $groups,
                "class"=>"default-table"
]);

$view->Render();

foreach($result as $count => $array){
  foreach($array as $key => $value){
    echo $key." => ".$value."<br>";
  }
}
