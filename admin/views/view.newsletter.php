<?php

  if(!$user->getPermissions()[$_GET['page']]){
    header("location: index.php");
  }

  require 'includes/PHPMailer/PHPMailerAutoload.php';

  //READING ALL THE MAILS ON THE LIST
  $listmails = $view->db->Select('newsletter',['email']);
  $mails = [];
  foreach($listmails as $index => $array){
    foreach($array as $k => $v){
      $mails[] = $v;
    }
  }

  //READING ALL PREVIOUS NEWSLETTERS
  $nwltrs = $view->db->Select('send_newsletters');

  //SETTING UP THE MAILER
  $mail = new PHPMailer;

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;

  $mail->Username = "lai.tryout@gmail.com";
  $mail->Password = 'lailai123';

  $mail->setFrom('lai.tryout@gmail.com','LAI GLIWICE');
  foreach($mails as $m){
    $mail->addAddress($m);
  }

  //POST HANDLING

  if(isset($_POST['sendthehorde'])){
    $m_subject = $_POST['mail_subject'];
    $m_content = $_POST['mail_content'];

    $mail->Subject = $m_subject;
    $mail->msgHTML($m_content);

    $view->db->Insert('send_newsletters', [
                                            "subject",
                                            "content",
                                            "date"
                                          ],[
                                            $m_subject,
                                            $m_content,
                                            date("Y-m-d H:i:s")
                                          ]);

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">
                    &times;
                  </span>
                </button>
                Wysłano wiadomość!
                <a href="index.php?page=newsletter">Odświerz strone</a>
              </div>';
    }
  }

  $form = new Form();
  $form->Textbox('mail_subject','Nagłówek','Promocja wrześniowa w LAI Gliwice!', true);
  $form->Textarea('mail_content','Treść wiadomości','',true,'',7,100);

  //RENDERING VIEW
  $view->Header('Newsletter');
  $view->Custom($form->Render('Wyślij','sendthehorde').'<br>');
  if($user->getPermissions()['isGm'] || $user->getPermissions()['nl_old']){
    $view->Table([
                  "name"          => "Wczesniejsze newslettery",
                  "ordinal"       => false,
                  "class"         => "default-table",
                  "column_names"  => ['ID', 'Nagłówek', 'Treść wiadomości', 'Data'],
                  "data"          => $nwltrs,
                  "html"          => false
    ]);
  }
  $view->Render();
