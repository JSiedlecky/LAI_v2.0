<?php

$id = $_GET['id'];

if(isset($_POST['editted'])){
  $title = $_POST['title'];
  $brief = $_POST['brief'];
  $content = $_POST['content'];
  $date = $_POST['date'];

  if($view->db->Update('news',
    ['title'=>$title,'brief'=>$brief,'content'=>$content,'date'=>$date],
    ['idn'=>$id]
  )){
    header('location: index.php?page=news');
    die();
  }
}

$post = $view->db->Select('news',['*'],['idn'=>$id])[0];

$form = new Form(false, 'POST', '#');
$form->Textbox('title','Tytuł wpisu: ', "", true, 'value="'.$post['title'].'"');
$form->Textarea('brief', 'Skrót wpisu:', $post['brief'], true);
$form->Textarea('content', 'Treść wpisu:', $post['content'], true);
$form->Date('date', 'Data wpisu:', true, 'value="'.$post['date'].'"');

$view->Header('Edytujesz wpis do aktualności: #'.$id);

$view->Custom($form->Render('Wyślij','editted'));

$view->Render();
