<?php

  function uniqueName($table, $field, $name, $error){
    $db = new Database();
    $result = $db->Select($table, ['*'], [$field => $name]);

    if(count($result) != 0) return '<div class="errorfunc"> </div>';
    else return true;
  }
