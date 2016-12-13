<div style="width:500px; margin:auto;">
  <h1>
  <?php
    echo "Witaj ".$user->getDisplayName()."<br />";

  ?>
</h1>
<h4 style="margin-top:300px; ">
  Cytat:
</h4>
<h3 style="font-style:italic;">

  <?php
  $quote = $view ->db->Query("SELECT `quote` FROM `quotes` ORDER BY RAND() LIMIT 1");
  echo $quote[0]['quote'];
  ?>
</h3>
</div>
