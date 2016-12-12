<?php
$view->Custom("<form method='POST' action='#'>");
$view->Custom("<label for='Nazwa'>Nazwa</label>
    <input type='text' name='name' id='name'/><br />
    <label for='pswd'> Hasło do pierwszego logowania</label>
    <input type='text'name='pswd'/><br />
    <input type='submit'value='Stwórz'>
");
$view->Custom("</form>");
$view->Render();
?>
