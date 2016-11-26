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

if(isset($_GET['error'])){
  $view -> Custom('<div class="alert alert-danger" role="alert">Wystąpił błąd proszę ponownie podać dane</div>');
}
$form = new Form(true);
$form -> Custom("<div id='userFrom'>");
$form -> Custom("<h3>Dane</h3>");
#Nickname
$form -> Textbox("nickname","Podaj Imie i Nazwisko","Np. Jan Kowalski",true);
#Login
$form -> Textbox("login", "Podaj login urzytkownika","Login",true);
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
$view -> Custom($form -> Render());
$view -> Custom('<button type="button" class="btn btn-default" id="actionUsersForm">Zastosuj</button>');

$view -> Custom('<script src="./js/user.js"></script>');
$view->Render();
?>
