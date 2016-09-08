<?php
$form_data = array();

$order = " ";
$set = false;
if(isset($_POST['nameOrder']) && $_POST['nameOrder'] !="none"){
      $order .= "ORDER BY `name` ".$_POST['nameOrder']. " ";



}
if(isset($_POST['moduleOrder'])&& $_POST['moduleOrder'] !="none"){

    $order .=" WHERE ";
    $set=true;
  $order .= " `module` ='".$_POST['moduleOrder']."'";
}
if(isset($_POST['yearsOrder'])&& $_POST['yearsOrder'] !="none"){

  if($set == true){
    $order .= " AND ";
  }
  if($set == false){
    $order .=" WHERE ";
    $set = true;
  }
  $order .= " `years`='".$_POST['yearsOrder']."'";
}

echo $order;
  ?>
