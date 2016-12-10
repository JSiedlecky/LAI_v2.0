<?php

$id = $_GET['id'];

$student = $view->db->Select('students',['*'],['ids'=>$id]);

$data = [];
foreach($student as $index => $array){
  foreach($array as $key => $value){
    $data[$key] = $value;
  }
}

//CISCO PRZYDZIAŁ
$ciscowww = (gettype($data['cisco']) !== "NULL" ? "Poziom CISCO: ".($data['cisco'] != 0 ? " Semestr ".$data['cisco']."." : "Zapisany.") : "");
$ciscowww .= (gettype($data['cisco_group']) !== "NULL" ? "<br>Grupa CISCO: #".$data['cisco_group'].' . <a href="index.php?page=groups&groupname=CISCO_'.$data['cisco_group'].'">Link do grupy.</a><br>': "");

//WWW PRZYDZIAŁ
$ciscowww .= (gettype($data['www']) !== "NULL" ? "<br>Poziom WWW: ".($data['www'] != 0 ? "  ".$data['www']."%." : "Zapisany.") : "");
$ciscowww .= (gettype($data['www_group']) !== "NULL" ? "<br>Grupa WWW: #".$data['www_group'].'. <a href="index.php?page=groups&groupname=WWW_'.$data['www_group'].'">Link do grupy.</a><br>' : "");

$ciscowww .= '<h3> Uczeń '.($data['activity'] != 0 ? 'uczestniczy' : 'nie uczestniczy').' w zajęciach.</h3>';

//PŁATNOŚCI
$student_payments = $view->db->Select('payments',['idpay','amount','payment_for','payment_date','additional'],['idpayer'=>$id]);

//KONTAKT
$contact = 'Numer telefonu: <a href="tel://'.$data['phone'].'">'.$data['phone'].'</a><br>';
$contact .= 'Adres email: <a href="mailto:'.$data['email'].'">'.$data['email'].'</a>';
//WIDOK

$view->Header('Karta ucznia: '.$data['name'].' '.$data['surname']);
$view->Section([
  "name"      => "Przynależności ucznia:",
  "content"   => $ciscowww,
  "class"     => "default-section associations-section"
]);

$view->Table([
  "name"          => "Lista płatności ucznia",
  "ordinal"       => false,
  "class"         => "default-table student-payments-table",
  "column_names"  => ['ID', 'Wartość', 'Za co', 'Data', 'Dodatkowe informacje'],
  "data"          => $student_payments,
  "html"          => false
]);

$view->Section([
  "name"      => "Dane kontaktowe ucznia:",
  "content"   => $contact,
  "class"     => "default-section contact-section"
]);

$view->Render();
