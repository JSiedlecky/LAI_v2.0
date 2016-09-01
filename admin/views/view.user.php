<?php

$view = new View();

$db = new Database;

$view->Header("Profil użytkownika: ".$user->getDisplayName());

$view->Render();
?>
