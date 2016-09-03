<?php

$view->Header('ELO');

$form = new Form2();

$form->Textbox("textbox1", "Textbox");
$form->Email("email1", "Email");
$form->Date("date1","Date");
$form->DateMin("datemin1","DateMin","2001-01-01");
$form->DateMax("datemax1","DateMax","2015-01-01");
$form->DateMinMax("dateminmax1","DateMinMax","2015-01-01", "2017-01-01");

$view->AppendContent($form->Render());

$view->Render();
