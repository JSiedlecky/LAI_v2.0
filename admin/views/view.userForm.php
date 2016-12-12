<?php

function addValue($value){

  return "value='".$value."'";
}
function Permissions($display_name,$name,$checked = false){
  $input = '<tr><div class="form_section">';
  $input .= '<td><div class="input_name">'.$display_name."</td>";
  $input .= '<td><input type="checkbox" name="'.$name.'" value="0"';
  if($checked == true){
    $input .= "checked";
  }
  $input .= '/></div></td></div></tr>';
  return $input;
}
function PermissionsWithVal($display_name,$name,$checked = false){
  $input = '<tr><div class="form_section">';
  $input .= '<td><div class="input_name">'.$display_name."</td>";

  if($checked == 0){
    $input .= '<td><input type="checkbox" value="0" name="'.$name.'" ';
  }
  else{
    $input .= '<td><input type="checkbox" value="1" name="'.$name.'" checked';
  }

  $input .= '/></div></td></div></tr>';
  return $input;
}

$result = $view->db->Select('users',['login']);

echo '<script type="text/javascript">';
echo  ' var users = [];';
foreach ($result as $key => $value) {
  echo "users.push('".$value['login']."');";
}
echo "</script>";
if(isset($_GET['error'])){
  $view -> Custom('<div class="alert alert-danger" role="alert">Wystąpił błąd proszę ponownie podać dane</div>');
}
if(isset($_POST['user'])){
  $result = $view->db->Select('users',['*'], ["idu" => $_POST['user']]);

  $form = new Form(true);
  $form -> Custom("<div id='userFrom'>");
  $form -> Custom("<h3>Dane</h3>");
  #Nickname
  $form -> Textbox("nickname","Podaj Imie i Nazwisko","Np. Jan Kowalski",true, addValue($result[0]['display_name']));
  #Login
  $form -> Textbox("login", "Podaj login urzytkownika","Login",true,addValue($result[0]['login']));
  $form -> Custom("<p class='alert alert-danger' id='logerr'>Taki login juz występuje proszę podać inny</p>");
  #Password
  $form -> Password("pswd", "Podaj domyślne hasło(będzie zmienione przy pierwszym logowaniu)", "Hasło", true,addValue($result[0]['password']));
  #Email
  $form -> Email("mail", "Podaj Email urzytkownika", "Np. Kowalski@gmail.com", true,addValue($result[0]['email']));
  #Perrmisions
  $result = $view->db->Select('permissions',['*'], ["idu" => $_POST['user']]);
  print_r($result[0]['applications']);
  #Applications
  $form -> Custom("<h3>Aplikacje</h3>");
  $form -> Custom("<table>");
  $form -> Custom(PermissionsWithVal("Wyświetlanie aplikacji ","menuApp",$result[0]['applications']));
  $form -> Custom(PermissionsWithVal("Operowanie na aplikacjach ","actionApp",$result[0]['app_action']));
  $form -> Custom(PermissionsWithVal("Dodawanie aplikacji",'addApp',$result[0]['app_add']));
  $form -> Custom(PermissionsWithVal("Usuwanie aplikacji ","delApp",$result[0]['app_delete']));
  $form -> Custom(PermissionsWithVal("Sortowanie aplikacji ","sortApp",$result[0]['app_sort']));
  $form -> Custom("</table>");
  #Groups
  $form -> Custom("<h3>Grupy</h3>");
  $form -> Custom("<table>");
  $form -> Custom(PermissionsWithVal("Wyświetlanie grup ","menuGrup",$result[0]['groups']));
  $form -> Custom(PermissionsWithVal("Dodawanie grup ","addGrp",$result[0]['group_add']));
  $form -> Custom(PermissionsWithVal("Usuwanie grup ","delGrp",$result[0]['group_delete']));
  $form -> Custom(PermissionsWithVal("Modifikowaćnie grup ","modifyGrp",$result[0]['group_modify']));
  $form -> Custom(PermissionsWithVal("Sortowanie grup ","sortGrp",$result[0]['group_sort']));
  $form -> Custom("</table>");
  #News
  $form -> Custom("<h3>Aktulaności</h3>");
  $form -> Custom("<table>");
  $form -> Custom(PermissionsWithVal("Wyświetlanie aktualnosci ","menuNewss",$result[0]['news']));
  $form -> Custom("</table>");
  #Students
  $form -> Custom("<h3>Uczniowie</h3>");
  $form -> Custom("<table>");
  $form -> Custom(PermissionsWithVal("Wyświetlanie uczniów ","menuStudents",$result[0]['students']));
  $form -> Custom("</table>");
  #Payments
  $form -> Custom("<h3>Płatności</h3>");
  $form -> Custom("<table>");
  $form -> Custom(PermissionsWithVal("Wyświetlanie płatności ","menuPay",$result[0]['payments']));
  $form -> Custom(PermissionsWithVal("Dodawanie płatności ","addPay",$result[0]['pay_add']));
  $form -> Custom(PermissionsWithVal("Modyfikowanie płatności ","modifyPay",$result[0]['pay_modify']));
  $form -> Custom(PermissionsWithVal("Usuwanie płatności ","delPay",$result[0]['pay_delete']));
  $form -> Custom("</table>");
  #newsletter
  $form -> Custom("<h3>Newsletter</h3>");
  $form -> Custom("<table>");
  $form -> Custom(PermissionsWithVal("Wyświetlanie newsletter'a ","menuNews",$result[0]['newsletter']));
  $form -> Custom(PermissionsWithVal("Wyświetlanie historii newsletter'a ","hisNews",$result[0]['nl_old']));
  $form -> Custom("</table>");
  #Users
  $form -> Custom("<h3>Użytkownicy</h3>");
  $form -> Custom("<table>");
  $form -> Custom(PermissionsWithVal("Wyświetlanie użytkownikow ","menuUsers",$result[0]['users']));
  $form -> Hidden('userId',$_POST['user']);
  $form -> Custom("</table>");
  #Perrmisions END
  $form -> Custom("</div>");
}else{
    $form = new Form(true);
    $form -> Custom("<div id='userFrom'>");
    $form -> Custom("<h3>Dane</h3>");
    #Nickname
    $form -> Textbox("nickname","Podaj Imie i Nazwisko","Np. Jan Kowalski",true);
    #Login
    $form -> Textbox("login", "Podaj login urzytkownika","Login",true);
    $form -> Custom("<p class='alert alert-danger' id='logerr'>Taki login juz występuje proszę podać inny</p>");
    #Password
    $form -> Password("pswd", "Podaj domyślne hasło(będzie zmienione przy pierwszym logowaniu)", "Hasło", true);
    #Email
    $form -> Email("mail", "Podaj Email urzytkownika", "Np. Kowalski@gmail.com", true);
    #Perrmisions
    #Applications
    $form -> Custom("<h3>Aplikacje</h3>");
    $form -> Custom("<table>");
    $form -> Custom(Permissions("Wyświetlanie aplikacji ","menuApp"));
    $form -> Custom(Permissions("Operowanie na aplikacjach ","actionApp"));
    $form -> Custom(Permissions("Dodawanie aplikacji",'addApp'));
    $form -> Custom(Permissions("Usuwanie aplikacji ","delApp"));
    $form -> Custom(Permissions("Sortowanie aplikacji ","sortApp"));
    $form -> Custom("</table>");
    #Groups
    $form -> Custom("<h3>Grupy</h3>");
    $form -> Custom("<table>");
    $form -> Custom(Permissions("Wyświetlanie grup ","menuGrup"));
    $form -> Custom(Permissions("Dodawanie grup ","addGrp"));
    $form -> Custom(Permissions("Usuwanie grup ","delGrp"));
    $form -> Custom(Permissions("Modifikowaćnie grup ","modifyGrp"));
    $form -> Custom(Permissions("Sortowanie grup ","sortGrp"));
    $form -> Custom("</table>");
    #News
    $form -> Custom("<h3>Aktulaności</h3>");
    $form -> Custom("<table>");
    $form -> Custom(Permissions("Wyświetlanie aktualnosci ","menuNewss"));
    $form -> Custom("</table>");
    #Students
    $form -> Custom("<h3>Uczniowie</h3>");
    $form -> Custom("<table>");
    $form -> Custom(Permissions("Wyświetlanie uczniów ","menuStudents"));
    $form -> Custom("</table>");
    #Payments
    $form -> Custom("<h3>Płatności</h3>");
    $form -> Custom("<table>");
    $form -> Custom(Permissions("Wyświetlanie płatności ","menuPay"));
    $form -> Custom(Permissions("Dodawanie płatności ","addPay"));
    $form -> Custom(Permissions("Modyfikowanie płatności ","modifyPay"));
    $form -> Custom(Permissions("Usuwanie płatności ","delPay"));
    $form -> Custom("</table>");
    #newsletter
    $form -> Custom("<h3>Newsletter</h3>");
    $form -> Custom("<table>");
    $form -> Custom(Permissions("Wyświetlanie newsletter'a ","menuNews"));
    $form -> Custom(Permissions("Wyświetlanie historii newsletter'a ","hisNews"));
    $form -> Custom("</table>");
    #Users
    $form -> Custom("<h3>Użytkownicy</h3>");
    $form -> Custom("<table>");
    $form -> Custom(Permissions("Wyświetlanie użytkownikow ","menuUsers"));
    $form -> Custom("</table>");
    #Perrmisions END
    $form -> Custom("</div>");
#Submit
}
$view -> Custom($form -> Render());
$view -> Custom('<button type="button" class="btn btn-default" id="actionUsersForm">Zastosuj</button>');

$view -> Custom('<script src="./js/user.js"></script>');
$view->Render();
?>
