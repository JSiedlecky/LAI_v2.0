<?php

	require("../connect.php");

	$data = array();
	$sql = "SELECT * FROM `news` ORDER BY `news`.`date` DESC";
	$statement = $conn->prepare($sql);
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);

	$jsonData = json_encode($result);

?>


<script src="../js/news.js"></script>
<script>
	var _jsonData = <?php echo $jsonData; ?>;
	//var jsonData = JSON.parse(_jsonData);

	console.dir(_jsonData);
	//console.dir(jsonData);

	var index = 0;
	var limit = 5;

	for (index; index < limit; index++) {
		if (index >= _jsonData.length) {
			break;
		}

		$('#newsContainer').append('<div class="newsEntry"></div>');
		$('#newsContainer .newsEntry').last().append('<p>' + _jsonData[index]["date"] + '</p>');
		$('#newsContainer .newsEntry').last().append('<p>' + _jsonData[index]["title"] + '</p>');
		$('#newsContainer .newsEntry').last().append('<p>' + _jsonData[index]["brief"] + '</p>');
		$('#newsContainer .newsEntry').last().append('<p><a href="#">Czytaj więcej</a></p>');
		$('#newsContainer .newsEntry').last().append('<hr />');
		
		
	}
</script>


<div id="newsContainer">

</div>