<?php
  include('classes/Form.php');
  $form = new Form();
  echo $form->start("form-inline");
  $form->setRadioName("mama");
  echo @$form->getUrl();
  echo $form->close();
?>
