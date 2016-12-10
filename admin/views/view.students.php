<?php

if(!$user->getPermissions()[$_GET['page']]){
  header("location: index.php");
}

if(isset($_GET['sortName'])){
    if($_GET['sortName'] === 'nameAsc') $students_list = $view->db->Select('students',['*'],[],"ORDER BY `name` ASC");
    else if($_GET['sortName'] === 'nameDesc') $students_list = $view->db->Select('students',['*'],[],"ORDER BY `name` DESC");
} else if(isset($_GET['sortSurname'])) {
    if($_GET['sortSurname'] === 'surnameAsc') $students_list = $view->db->Select('students',['*'],[],"ORDER BY `surname` ASC");
    else if($_GET['sortSurname'] === 'surnameDesc') $students_list = $view->db->Select('students',['*'],[],"ORDER BY `surname` DESC");
} else if(isset($_GET['sortGroup'])){
    $arr = explode('_',$_GET['sortGroup']);
    if($arr[0] === 'CISCO')  $students_list = $view->db->Select('students',['*'],['cisco_group'=>$arr[1]]);
    else if($arr[0] === 'WWW')  $students_list = $view->db->Select('students',['*'],['www_group'=>$arr[1]]);
} else {
  $students_list = $view->db->Select('students',['*'],[],"ORDER BY `activity` DESC");
}

$cisco_groups = $view->db->Select('groups',['group_name'],[],"WHERE `module` = 'cisco' AND `students` > 0");
$www_groups = $view->db->Select('groups',['group_name'],[],"WHERE `module` = 'www' AND `students` > 0");

foreach($students_list as $index => $array){
  foreach($array as $k => $v){
    if($k == 'cisco' && $v != 0) $students_list[$index][$k] = 'Semestr &nbsp;'.$v;
    if($k == 'cisco' && $v === '0') $students_list[$index][$k] = 'Zapisany';
    if($k == 'cisco' && gettype($students_list[$index][$k]) === "NULL") $students_list[$index][$k] = '-';

    if($k == 'www' && $v != 0) $students_list[$index][$k] = $v.'%';
    if($k == 'www' && $v === '0') $students_list[$index][$k] = 'Zapisany';
    if($k == 'www' && gettype($students_list[$index][$k]) === "NULL") $students_list[$index][$k] = '-';

    if($k == 'cisco_group' && $v != "") $students_list[$index][$k] = '#'.$v;
    if($k == 'cisco_group' && gettype($students_list[$index][$k]) === "NULL") $students_list[$index][$k] = '-';

    if($k == 'www_group' && $v != "") $students_list[$index][$k] = '#'.$v;
    if($k == 'www_group' && gettype($students_list[$index][$k]) === "NULL") $students_list[$index][$k] = '-';

    if($k == 'activity' && $v == 0) $students_list[$index][$k] = 'Nie aktywny';
    if($k == 'activity' && $v == 1) $students_list[$index][$k] = 'Aktywny';
  }
}

$all_groups = [];

foreach($cisco_groups as $index => $array){
  foreach($array as $k => $v){
    $all_groups[str_replace('_','-',$cisco_groups[$index][$k])] = $cisco_groups[$index][$k];
  }
}
foreach($www_groups as $index => $array){
  foreach($array as $k => $v){
    $all_groups[str_replace('_','-',$www_groups[$index][$k])] = $www_groups[$index][$k];
  }
}

$view->Header('Uczniowie');

//sorting
$custom_sort = '
    <select name="sortName" id="sortName">
      <option value="">Po imieniu</option>
      <option value="nameAsc">Imie rosnąco</option>
      <option value="nameDesc">Imie majeląco</option>
    </select>
    <select name="sortSurname" id="sortSurname">
      <option value="">Po nazwisku</option>
      <option value="surnameAsc">Nazwisko rosnąco</option>
      <option value="surnameDesc">Nazwisko majeląco</option>
    </select>
    <select name="sortGroup" id="sortGroup">
      <option value="">Po grupie </option>';
      foreach($all_groups as $k => $v){
        $custom_sort .= '<option value="'.$v.'">'.$v.'</option>';
      }
$custom_sort .= '</select><button type="button" id="reloadPage"> Reset </button>
';

$view->Section([
  "name"      => "Sortowanie",
  "content"   => $custom_sort,
  "class"     => 'default-section'
]);

$view->Table([
  "name"          => "Lista uczniów",
  "column_names"  => [
      "ID", "Imie", "Nazwisko", "Email", "Telefon", "Poziom CISCO", "Poziom WWW", "Grupa CISCO", "Grupa WWW", "Aktywność"
  ],
  "ordinal"       => false,
  "class"         => "default-table students-table",
  "data"          => $students_list,
  "html"          => false
]);

$view->Render();

?>
