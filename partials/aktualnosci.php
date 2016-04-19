

<?php
    require '../connect.php';

    if (isset($_POST['ajaxRequestGetNews'])) {
        $limit = $_POST['limit'];

        $data = array();
        $sql = "SELECT * FROM `news` ORDER BY `news`.`date` DESC LIMIT $limit";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $jsonData = json_encode($result);

        echo $jsonData;
        die();
    }

    if (isset($_POST['ajaxRequestGetNewsAmount'])) {
        $data = array();
        $sql = "SELECT COUNT(*) AS 'COUNT' FROM `news`";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_NUM);

        $jsonData = json_encode($result[0][0]);

        echo $jsonData;
        die();
    }

?>

<!-- Redirect kiedy nie ma zapytania z angulara -->
<script type="text/javascript">
  if(typeof lai === 'undefined'){
     document.location.href="../";
  }
</script>


<script src="../js/news.js"></script>
<script>

	//var jsonData = JSON.parse(_jsonData);

	//console.dir(_jsonData);
	//console.dir(jsonData);
	//

    function getNewsAmount() {
        $.ajax({
              type: "POST",
              url: "./partials/aktualnosci.php",
              data: {
                  ajaxRequestGetNewsAmount: true
              },
              success: function(data) {
                  console.dir(JSON.parse(data));
              }
        });
    }

    getNewsAmount();


    var NEWS_LIMIT = 5;

    function getNews(_limit, _startPos) {
        $.ajax({
              type: "POST",
              url: "./partials/aktualnosci.php",
              data: {
                  ajaxRequestGetNews: true,
                  limit: _limit
              },
              success: function(data) {
                  appendNews(JSON.parse(data), _startPos);
              }
        });
    }

    function appendNews(_jsonData, _startPos) {

        for (var i = _startPos; i < _jsonData.length; i++) {
            if (i >= _jsonData.length) {
                break;
            }


            $('#newsContainer').append('<div class="newsEntry"></div>');
            $('#newsContainer .newsEntry').last().append('<p class="newsDate">' + _jsonData[i]["date"] + '</p>');
            $('#newsContainer .newsEntry').last().append('<p class="newsTitle">' + _jsonData[i]["title"] + '</p>');
            $('#newsContainer .newsEntry').last().append('<p class="newsBrief">' + _jsonData[i]["brief"] + '</p>');
            $('#newsContainer .newsEntry').last().append('<p><a href="#">Czytaj więcej</a></p>');
            $('#newsContainer .newsEntry').last().append('<hr />');

        }
	}

    function clearNews() {
        $('#newsContainer').html('');
    }

    function btnNewsLoadMore() {
        //clearNews();

        var STEP = 5;
        NEWS_LIMIT += STEP;
        getNews(NEWS_LIMIT, NEWS_LIMIT - STEP);
    }

    getNews(NEWS_LIMIT, 0);
</script>


<div id="newsContainer">


</div>

<div class="newsLoadMore text-center">
    <button type="button" class="btn btn-default btn-lg" onclick="btnNewsLoadMore();">Wczytaj więcej</button>
</div>
