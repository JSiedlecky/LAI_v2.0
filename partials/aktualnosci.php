

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
	//
	var NEWS_LIMIT = 5;
    var NEWS_AMOUNT = 999;

    function getNewsAmount() {
        $.ajax({
              type: "POST",
              url: "./partials/aktualnosci.php",
              data: {
                  ajaxRequestGetNewsAmount: true
              },
              success: function(data) {
                   NEWS_AMOUNT = JSON.parse(data).toString();
                   getNews(NEWS_LIMIT, 0);
              }
        });
    }

    getNewsAmount();



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
                  console.dir(JSON.parse(data));
              }
        });
    }

    function appendNews(_jsonData, _startPos) {
        $('#btnNewsLoadMore').show();

        for (var i = _startPos; i < _jsonData.length; i++) {
            if (i >= _jsonData.length) {
                break;
            }


            $('#newsContainer').append('<div class="newsEntry"></div>');
            $('#newsContainer .newsEntry').last().append('<p class="newsDate">' + _jsonData[i].date + '</p>');
            $('#newsContainer .newsEntry').last().append('<p class="newsTitle">' + _jsonData[i].title + '</p>');
            $('#newsContainer .newsEntry').last().append('<p class="newsBrief">' + _jsonData[i].brief + '</p>');
            $('#newsContainer .newsEntry').last().append('<p class="newsContent">' + _jsonData[i].content + '</p>');
            $('#newsContainer .newsEntry').last().append('<p><a class="linkReadMore" href="#" action="show">Czytaj więcej</a></p>');
            $('#newsContainer .newsEntry').last().append('<hr />');


            if(NEWS_LIMIT >= NEWS_AMOUNT) {
                $('#btnNewsLoadMore').hide();
            }

            console.log('NEWS_LIMIT ' + NEWS_LIMIT);
            console.log('NEWS_AMOUNT ' + NEWS_AMOUNT);
        }

        bindEventsToReadMoreLinks();
	}

    function clearNews() {
        $('#newsContainer').html('');
    }

    function btnNewsLoadMore() {
        //clearNews();

        var STEP = 5;
        NEWS_LIMIT += STEP;

        if((NEWS_LIMIT <= NEWS_AMOUNT)){
            getNews(NEWS_LIMIT, NEWS_LIMIT - STEP);
        }
        else {
            $('#btnNewsLoadMore').hide();
        }



        console.log('NEWS_LIMIT ' + NEWS_LIMIT);
        console.log('NEWS_AMOUNT ' + NEWS_AMOUNT);

    }

    function bindEventsToReadMoreLinks() {
        $.each($('a.linkReadMore'), function(i,v) {
            if($(this).parent().siblings('p.newsContent').html().trim().length <= 1){
                $(v).hide();
            }
            $(v).off('click');
            $(v).click(function(event) {
                event.preventDefault();


                if($(v).attr('action') === 'show'){
                    $(this).parent().siblings('p.newsContent').show('slow');
                    $(v).attr('action', 'hide');
                }
                else {
                    $(this).parent().siblings('p.newsContent').hide('slow');
                    $(v).attr('action', 'show');
                }

            });
        });
    }


    //getNews(NEWS_LIMIT, 0);
</script>


<div id="newsContainer">


</div>

<div class="newsLoadMore text-center">
    <button id="btnNewsLoadMore" type="button" class="btn btn-default btn-lg" onclick="btnNewsLoadMore();">Wczytaj więcej</button>
</div>
