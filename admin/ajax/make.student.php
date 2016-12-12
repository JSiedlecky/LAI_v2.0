<?php
//read data to use
$idused =$_POST['idu'];
$groupId = $_POST['idg'];
$type = $_POST['type'];
require "../classes/Database.php";
$db = new Database();




$students = $db->Select("groups",["students","max_students"],["idg"=>$groupId]);

if($students[0]['max_students'] - $students[0]['students'] - count($idused) >= 0){
	$i =0;
	foreach ($idused as $id) {
		$i++;
		//gets from Database basic data
		$result = $db->Query("SELECT * FROM `applications`WHERE `id` =".$id);

		foreach ($result as $key => $value) {
			// get all needed data to send querys to db
		   $name = $value["name"];
			 $surname = $value["surname"];
			 $module = $value['module'];
		   $email = $value["email"];
		 	 $phone = $value["phone"];
		}
		if($module == "Cisco"){

		  //Inserting aplication to studen
			$db->Insert('students',["ids", "name", "surname", "email", "phone", "cisco", "www", "cisco_group", "www_group", "activity"],[NULL, "{$name}", "{$surname}", "{$email}" ,"{$phone}" , NULL, NULL, "{$groupId}", NULL, 1]);
		}else{
				$db->Insert('students',["ids", "name", "surname", "email", "phone", "cisco", "www", "cisco_group", "www_group", "activity"],[NULL, "{$name}", "{$surname}", "{$email}" ,"{$phone}" , NULL, NULL, NULL,"{$groupId}", 1]);
		}
			//Updating mebers of group
  		$db->NonResultQuery("UPDATE `groups` SET `students` = students + 1 WHERE `groups`.`idg` = '".$groupId."' ;");
			//Delete
		  //$db->NonResultQuery("DELETE FROM `applications`WHERE `id` =".$id);



	}
	if (session_status() == PHP_SESSION_NONE) {
			session_start();
	}

			$_SESSION['addIds'] = $idused;



}
else{
	echo "Wystąpił bład";
}
?>
