<?php
//read data to use
$idused =unserialize( $_GET['idu']);
$groupId = $_GET['idg'];

$students = $view->db->Select("groups",["students","max_students"],["idg"=>$groupId]);

if($students[0]['max_students'] - $students[0]['students'] - count($idused) > 0){
	foreach ($idused as $id) {
		//gets from Database basic data
		$result = $view->db->Query("SELECT * FROM `applications`WHERE `id` =".$id);
		foreach ($result as $key => $value) {
		   $name = $value["name"];
			 $surname = $value["surname"];

		   $email = $value["email"];
		 	 $phone = $value["phone"];
		}

		  //Inserting aplication to studen
			//$view->db->Insert('students',["ids", "name", "surname", "email", "phone", "cisco", "www", "cisco_group", "www_group", "activity"],[NULL, "{$name}", "{$surname}", "{$email}" ,"{$phone}" , NULL, NULL, "{$groupId}", NULL, 1]);
			//Updating mebers of group
		//  $view->db->NonResultQuery("UPDATE `groups` SET `students` = students + 1 WHERE `groups`.`idg` = '".$groupId."' ;");
			//Delete
		  //$view->db->NonResultQuery("DELETE FROM `applications`WHERE `id` =".$id);



	}
}
else{
	echo "Wystąpił bład";
}
?>
