<?php
if(!$user->getPermissions()[$_GET['page']]){
  header("location: index.php");
}

if(isset($_POST['addpost'])){
  $title = $_POST['title'];
  $content = $_POST['content'];
  $date = $_POST['date'];

  $brief = shorten_string($content, 10);

  $view->db->Insert('news',
    ['title','brief','date','content'],
    [$title, $brief, $date, $content]
  );
}

$old_posts = $view->db->Select('news');

$view->Header('Aktualności');

$form = new Form(false, 'POST', '#');
$form->Textbox('title','Tytuł wpisu: ', "", true);
$form->Textarea('content', 'Treść wpisu:', "", true);
$form->Date('date', 'Data wpisu:', true);

$view->Custom($form->Render('Dodaj wpis', 'addpost'));

$view->Table([
  "name"          => "Stare wpisy",
  "ordinal"       => false,
  "class"         => "default-table news-table",
  "column_names"  => ["ID","Tytuł", "Skrót", "Data zamieszczenia", "Zawartość"],
  "data"          => $old_posts,
  "html"          => false
]);

$view->Render();
