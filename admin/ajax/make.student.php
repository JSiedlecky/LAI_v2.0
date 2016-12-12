<?php

//read data to use
$idused =$_POST['idu'];
$groupId = $_POST['idg'];
$type = $_POST['type'];
require "../classes/Database.php";
$db = new Database();
function isInDb($db,$name,$surname,&$ids){
	$result = $db->Query("SELECT `ids`,`name`,`surname` FROM `students`");

	foreach ($result as $key => $value) {

			if($value['name'] == $name && $value['surname'] == $surname){

				$ids = $value['ids'];
				return true;
			}
	}
	return false;
}



$students = $db->Select("groups",["students","max_students"],["idg"=>$groupId]);

if($students[0]['max_students'] - $students[0]['students'] - count($idused) >= 0){
	$i =0;
	foreach ($idused as $id) {
		$toDel = $id;
		$i++;
		$ids =0;
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
		$id = 0;
		if(!isInDb($db,$name,$surname,$ids)){
				//if user isn't in the db
				if($module == "Cisco"){

				  //Inserting aplication to studen
					$db->Insert('students',["ids", "name", "surname", "email", "phone", "cisco", "www", "cisco_group", "www_group", "activity"],[NULL, "{$name}", "{$surname}", "{$email}" ,"{$phone}" , NULL, NULL, "{$groupId}", NULL, 1]);
				}else{
						$db->Insert('students',["ids", "name", "surname", "email", "phone", "cisco", "www", "cisco_group", "www_group", "activity"],[NULL, "{$name}", "{$surname}", "{$email}" ,"{$phone}" , NULL, NULL, NULL,"{$groupId}", 1]);
				}
					//Updating mebers of group
		  		$db->NonResultQuery("UPDATE `groups` SET `students` = students + 1 WHERE `groups`.`idg` = '".$groupId."' ;");
					//Delete
				  $db->NonResultQuery("DELETE FROM `applications`WHERE `id` =".$id);
			}
			else {

					$result = $db->Query("SELECT `cisco_group`,`www_group` FROM `students`WHERE `ids` = '".$ids."'");
					foreach ($result as $key => $value) {
						$www = $value['www_group'];
						$cisco = $value['cisco_group'];
					}
					//if module is cisco
					if($module == "Cisco"){

						//is he hav already cisco group
						if($cisco == NULL || $cisco == 0){
							echo $cisco;
								$db->NonResultQuery("UPDATE `students` SET `cisco_group` = '".$groupId."'  WHERE `ids` = '".$ids."' ;");
						}

					}
					else {
						if($www == NULL || $www <= 0){
								//add to www group
								$db->NonResultQuery("UPDATE `students` SET `www_group` = '".$groupId."'  WHERE `ids` = '".$ids."' ;");
					}
				}

				//Updating mebers of group
				$db->NonResultQuery("UPDATE `groups` SET `students` = students + 1 WHERE `groups`.`idg` = '".$groupId."' ;");
				//Delete
				$db->NonResultQuery("DELETE FROM `applications`WHERE `id` =".$toDel);

			}


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
