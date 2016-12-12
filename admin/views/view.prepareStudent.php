<?php
if(isset($_GET["id"])){

    $im = $_GET["id"];
    $type = $_GET["type"];
    //chenge to db know value
    if($type == "Aplikacje"){
      $type = "www";
    }
    $arr= "";;
    foreach($im as $key){
      $arr.= $key.",";
    };
    $arr = substr_replace($arr, "", strlen($arr)-1);

    $view->Custom("<script>var typeOf = '".$type."'; var idlist=[".$arr."]; </script>");

    //gets already used ids
      $used = NULL;
    if(isset($_SESSION['addIds'])){
      $used = $_SESSION['addIds'];
    }


    //var used to check is this id used which prevent mysql error
    $inList  = false;
    //make where part of query
    $where = '';
    $i=0;
    for($i = 0; $i <count($im); $i++){

        if($i >= 1){
          $where.=" OR ";
        }
        if($used != NULL){

          foreach ($used as $value) {
              if($value == $im[$i]){
                $inList = true;
              }
            }
        }

        if($inList != true){
            $where.="`id` = ".$im[$i]."";
        }
        $inList  = false;
    }

    $i=0;
    //sends sql query to get selected aplications
    if($where != ''){
      $result = $view->db->Query("SELECT * FROM `applications` WHERE ".$where);


    $i = 0;
    foreach($result as $key => $r){
        foreach($r as $k => $item){
            //id will be used to edit the row
            if($k == "id") $id = $item;
            //adding regular item to a row
            if($k != "id" && $k != "status") $applications_data[$key][] = $item;
            //if status is set to null we send the apropriate message

            //adding a checkbox to edit the row
            if($k == "status") $applications_data[$key][] = '<input type="checkbox" class="check" value="'.$im[$i].'" name="id[]">';
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
                                      'Dodatkowe informacje',
                                      ],
                    "data"=> $applications_data,
                    "class"=>"default-table applications",
                    "html" => false
    ]);
    $view->Custom('<p id="numberOfApplication">

    </p>');

      if($type == "Cisco"){
        $type = "cisco";
      }

      $sql = "SELECT * FROM `groups` WHERE `module` = '".$type."' AND students != max_students ";

      $groups = $view->db->Query($sql);
      //z grup
      if(isset($_POST['groupname']) && ($_POST['groupname'] != ''))
        $groups = $view->db->Select('groups',['*'],['group_name' => $_POST['groupname']]);
      else if(isset($_POST['groupid']) && ($_POST['groupid'] != ''))
        $groups = $view->db->Select('groups',['*'],['idg' => $_POST['groupid']]);
      else if(isset($_POST['groupmodule']) && ($_POST['groupmodule'] != '') &&  isset($_POST['groupyears']) && $_POST['groupyears'] != '' &&  isset($_POST['groupdays']) && $_POST['groupdays'] != '')
        $groups = $view->db->Select('groups',['*'],['module' => $_POST['groupmodule'], 'years' => $_POST['groupyears'], 'days' => $_POST['groupdays']]);
      else if(isset($_POST['groupmodule']) && ($_POST['groupmodule'] != '') &&  isset($_POST['groupyears']) && $_POST['groupyears'] != '')
        $groups = $view->db->Select('groups',['*'],['module' => $_POST['groupmodule'], 'years' => $_POST['groupyears']]);
      else if(isset($_POST['groupmodule']) && ($_POST['groupmodule'] != '') &&  isset($_POST['groupdays']) && $_POST['groupdays'] != '')
        $groups = $view->db->Select('groups',['*'],['module' => $_POST['groupmodule'], 'days' => $_POST['groupdays']]);
      else if(isset($_POST['groupmodule']) && ($_POST['groupmodule'] != ''))
        $groups = $view->db->Select('groups',['*'],['module' => $_POST['groupmodule']]);
      else if(isset($_POST['groupyears']) && ($_POST['groupyears'] != ''))
        $groups = $view->db->Select('groups',['*'],['years' => $_POST['groupyears']]);
      else if(isset($_POST['groupdays']) && ($_POST['groupdays'] != ''))
        $groups = $view->db->Select('groups',['*'],['days' => $_POST['groupdays']]);
      else
        $groups = $view->db->Query($sql);
    //$view->Custom('<form >');
    $search = new Form(false,'POST','','default-form horizontal-form search-form');

    $search->Hidden('page','prepareStudent');
    $search->Textbox('groupname','Po nazwie grupy','CISCO_1');
    $search->Textbox('groupid', 'Po ID grupy','1');

    $search->Select('groupyears', 'Po długości zajeć',[
                                                      "1"=>"Jeden rok",
                                                      "2"=>"Dwa lata"
                                                    ]);
    $search->Select('groupdays', 'Po trybie zajęć', [
                                                      "Tydzień"=>"Tydzień",
                                                      "Weekend"=>"Weekend"
                                                    ]);

    $view->Header('Aplikacje');

    $view->Section([
                  'name'=>'Wyszukiwanie',
                  'content'=> $search->Render('Szukaj'),
                  'class'=>'default-section'
                ]);

    $custom = '<div>';
    $view->Custom('</form>');
    if(count($groups) == 0) $custom .= "Brak wyników dla podanych kryteriów wyszukiwania.";
    else {
      //$view->Custom('<form method="GET" action="#">');
      foreach($groups as $g){
        $students = $view->db->Select('students',
                                      ['ids','name','surname','email','phone','activity'],
                                      [$g['module'].'_group' => $g['idg']]
                                    );

        $students = ParseActivity($students);

        $custom .= '<div class="group">';
        $custom .= '<section class="group_section">';
          $custom .= '<div class="group_vertical_separator">';
            $custom .= '<div class="group_id">#'.$g['idg'].'</div>';
          $custom .= '</div>';
          $custom .= '<div class="group_vertical_separator">';
            $custom .= '<div class="group_name">'.GROUP_NAME.': \''.$g['group_name'].'\'</div>';
            $custom .= '<div class="group_module">'.GROUP_MODULE.': \''.$g['module'].'\'</div>';
            $custom .= '<div class="group_status">'.GROUP_STATUS.': '.$g['active'].'</div>';
          $custom .= '</div>';
          $custom .= '<div class="group_vertical_separator">';
            $custom .= '<div class="group_years">'.GROUP_YEARS.': '.$g['years'].'</div>';
            $custom .= '<div class="group_days">'.GROUP_DAYS.': '.$g['days'].'</div>';
            $custom .= '<div class="group_students">'.GROUP_STUDENTS.': '.$g['students'].'/'.$g['max_students'].'</div>';
          $custom .= '</div>';
          $custom .= '<div class="group_vertical_separator">';
            $custom .= '<div class="group_additional">'.$g['additional'].'</div>';
            $custom .= '<div class="group_start">'.GROUP_START.': '.$g['start'].'</div>';
            $custom .= '<div class="group_end">'.GROUP_END.': '.$g['end'].'</div>';
          $custom .= '</div>';

        $custom .= '</section>
        <input type="number"  class="btn btn-default addBtn hidden" value="'.$g['idg'].'">';

          $custom .='<button  name="idg" class="btn btn-default addBtn makeStudentBtn" value="'.$g['idg'].'">+</button>';
        $custom .= $view->Table([
                                "name"          => '',
                                "ordinal"       => false,
                                "class"         => 'default-table group_table',
                                "column_names"  => ['ID',
                                                    'Imię',
                                                    'Nazwisko',
                                                    'Email',
                                                    'Telefon',
                                                    'Aktywność'],
                                "data"          => $students,
                                "html"          => true
        ]);
        $custom.= '</div>';
      }
    }
    $custom .= '</div>';
    $view->Custom($custom);

    $view->Custom('</form>');
  }
  else{
    $view->Custom('<div class="modal fade" tabindex="-1" role="dialog" id="myModal" data-backdrop="static" data-keyboard="false">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">

                        <h4 class="modal-title">Koniec wybranych studentów</h4>
                      </div>
                      <div class="modal-body">
                        <p>Przycisk przekieruje cię do wyboru aplikacji</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="goToApplication();">Przekierowanie</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <script>
                 $("#myModal").modal("show");
                </script>
                '
              );
  }
    $view->Custom('<script src="js/addApplication.js"></script>');
    $view->Render();
}
else {
  echo "Błąd proszę zmienic dane i sprobowac podobnie";

}
?>
