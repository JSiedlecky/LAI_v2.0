<?php
function addValue($value){

  return "value='".$value."'";
}

echo $_GET['']
if(isset($_GET['error'])){
  $view -> Custom('<div class="alert alert-danger" role="alert">Wystąpił błąd proszę ponownie podać dane</div>');
}
$form = new Form(true);
#Nickname
$form -> Textbox("nickname","Podaj Imie i Nazwisko","Np. Jan Kowalski",true);
#Login
$form -> Textbox("login", "Podaj login urzytkownika","Login",true);
#Password
$form -> Password("pswd", "Podaj domyślne hasło(będzie zmienione przy pierwszym logowaniu)", "Hasło", true);
#Email
$form -> Email("mail", "Podaj Email urzytkownika", "Np. Kowalski@gmail.com", true);
#Perrmisions
//miejsce na persmisje XD
#Perrmisions END
#Submit
$view -> Custom($form -> Render());
$view -> Custom('<button type="button" class="btn btn-default" id="actionUsersForm">Zastosuj</button>');

$view -> Custom('<script src="./js/user.js"></script>');
$view->Render();
?>
