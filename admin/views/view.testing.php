<?php

$view->Header('ELO');

$radiodata = [
  "audi"    => "Audi",
  "vw"      => "Volkswagen",
  "porsche" => "Porsche"
];

$selectdata = [
  "audi"    => "Audi",
  "vw"      => "Volkswagen",
  "porsche" => "Porsche"
];

$checkboxdata = [
  "audi"    => "Audi",
  "vw"      => "Volkswagen",
  "porsche" => "Porsche"
];

$form = new Form2(false);

$form->Textbox("textbox1", "Textbox");
$form->Email("email1", "Email");
$form->Date("date1", "Date");
$form->DateMin("datemin1","DateMin","2001-01-01");
$form->DateMax("datemax1","DateMax","2015-01-01");
$form->DateMinMax("dateminmax1","DateMinMax","2015-01-01", "2017-01-01");
$form->Textarea('textarea1','Textarea');
$form->Radio('auto','Auto',$radiodata,'vw',true);
$form->Select('auto2','Auto2',$selectdata,'vw',true, 2);
$form->Checkbox('auto3','Auto3',$checkboxdata, 'vw', true);
$form->Number('number','Number',3,1,5);
$form->Range('range','Range',10,20);
$form->Color('color','Color');


$form->ResetBtn('Wyczyść');

$view->AppendContent($form->Render());

$view->Render();
