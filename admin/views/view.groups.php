<?php

if(!$user->getPermissions()[$_GET['page']]){
  header("location: index.php");
}

if(isset($_GET['groupname']) && ($_GET['groupname'] != ''))
  $groups = $view->db->Select('groups',['*'],['group_name' => $_GET['groupname']]);
else if(isset($_GET['groupid']) && ($_GET['groupid'] != ''))
  $groups = $view->db->Select('groups',['*'],['idg' => $_GET['groupid']]);
else if(isset($_GET['groupmodule']) && ($_GET['groupmodule'] != '') &&  isset($_GET['groupyears']) && $_GET['groupyears'] != '' &&  isset($_GET['groupdays']) && $_GET['groupdays'] != '')
  $groups = $view->db->Select('groups',['*'],['module' => $_GET['groupmodule'], 'years' => $_GET['groupyears'], 'days' => $_GET['groupdays']]);
else if(isset($_GET['groupmodule']) && ($_GET['groupmodule'] != '') &&  isset($_GET['groupyears']) && $_GET['groupyears'] != '')
  $groups = $view->db->Select('groups',['*'],['module' => $_GET['groupmodule'], 'years' => $_GET['groupyears']]);
else if(isset($_GET['groupmodule']) && ($_GET['groupmodule'] != '') &&  isset($_GET['groupdays']) && $_GET['groupdays'] != '')
  $groups = $view->db->Select('groups',['*'],['module' => $_GET['groupmodule'], 'days' => $_GET['groupdays']]);
else if(isset($_GET['groupmodule']) && ($_GET['groupmodule'] != ''))
  $groups = $view->db->Select('groups',['*'],['module' => $_GET['groupmodule']]);
else if(isset($_GET['groupyears']) && ($_GET['groupyears'] != ''))
  $groups = $view->db->Select('groups',['*'],['years' => $_GET['groupyears']]);
else if(isset($_GET['groupdays']) && ($_GET['groupdays'] != ''))
  $groups = $view->db->Select('groups',['*'],['days' => $_GET['groupdays']]);
else
  $groups = $view->db->Select('groups');

$search = new Form(false,'GET','#','default-form horizontal-form search-form');

$search->Hidden('page','groups');
$search->Textbox('groupname','Po nazwie grupy','CISCO_1');
$search->Textbox('groupid', 'Po ID grupy','1');
$search->Select('groupmodule', 'Po module grupy',[
                                                  "cisco"=>"Cisco",
                                                  "www"=>"WWW"
                                                ]);
$search->Select('groupyears', 'Po długości zajeć',[
                                                  "1"=>"Jeden rok",
                                                  "2"=>"Dwa lata"
                                                ]);
$search->Select('groupdays', 'Po trybie zajęć', [
                                                  "Tydzień"=>"Tydzień",
                                                  "Weekend"=>"Weekend"
                                                ]);

$view->Header('Grupy        '.($user->getPermissions()['isGm'] || $user->getPermissions()['group_add'] ? '<a class="addgroup" href="index.php?page=add&type=group">Dodaj grupę <i class="fa fa-plus" aria-hidden="true"></i></a>' : ''));

if($user->getPermissions()['isGm'] || $user->getPermissions()['group_sort']){
  $view->Section([
                'name'=>'Wyszukiwanie',
                'content'=> $search->Render('Szukaj'),
                'class'=>'default-section'
              ]);
}

$custom = '<div>';
if(count($groups) == 0) $custom .= "Brak wyników dla podanych kryteriów wyszukiwania.";
else {
  foreach($groups as $g){
    $students = $view->db->Select('students',
                                  ['ids','name','surname','email','phone','activity'],
                                  [$g['module'].'_group' => $g['idg']]
                                );

    $students = ParseActivity($students);

    $custom .= '<div class="group">';
    if($user->getPermissions()['isGm'] || $user->getPermissions()['group_modify'] || $user->getPermissions()['group_delete']){
    $custom .= '<i class="fa fa-lg fa-cog group_options" aria-hidden="true"></i>';
      $custom .= '<select class="option_select" data-groupid="'.$g['idg'].'">';
        $custom .= '<option value="choose">Wybierz</option>';
        $custom .= ($user->getPermissions()['isGm'] || $user->getPermissions()['group_modify'] ? '<option value="modify">Modyfikuj</option>' : '');
        $custom .= ($user->getPermissions()['isGm'] || $user->getPermissions()['group_delete'] ? '<option value="delete">Usuń</option>' : '');
      $custom .= '</select>';
    }
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
    $custom .= '</section>';
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

$view->Render();
