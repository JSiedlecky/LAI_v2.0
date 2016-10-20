<?php
  $type = $_GET['type'];
  $validTypes = ['group','payment'];

  #POST HANDLING
  if(isset($_POST['groupsubmitted'])){
    #n... stands for new ...
    $nname = $_POST['groupname'];
    $nmodule = $_POST['groupmodule'];
    $nyears = (isset($_POST['groupyears']) ? $_POST['groupyears'] : "NULL");
    $ndays = (isset($_POST['groupdays']) ? $_POST['groupdays'] : "NULL");
    $nmaxstudents = $_POST['groupmaxstudents'];
    $nstart = $_POST['groupstart'];
    $nadditional = $_POST['groupadditional'];

    if(uniqueName('groups','group_name',$nname,'Ta nazwa jest już zajęta!')){
      if($view->db->Insert('groups',['group_name','module','years','days','students','max_students','active','start','end','additional'],
                      [$nname,$nmodule,$nyears,$ndays,0,$nmaxstudents,0,$nstart,date('Y-m-d'),$nadditional])) echo 'Pomyślnie dodano grupę!';
    } else echo 'Wystąpił błąd!';
  }


  #DISPLAYING RIGHT FORM
  if(in_array($type,$validTypes)){
    switch($type){
      case 'group':
        $form = new Form(false,"POST","/admin/index.php?page=add&type=group","default-form");
        $form->Textbox('groupname','Nazwa grupy:','CISCO_1',true);
        $form->Select('groupmodule','Moduł grupy:',[
          'cisco' => 'CISCO',
          'www'   => 'Aplikacje'
        ], true);
        $form->Select('groupyears','Ilość lat:',[
          '1'   => 'Jeden rok',
          '2'   => 'Dwa lata'
        ], true);
        $form->Select('groupdays','Dni tygodnia:',[
          'Tydzień'   => 'Tydzień roboczy',
          'Weekend'   => 'Weekendy'
        ], true);
        $form->Number('groupmaxstudents','Maksymalna ilość uczniów w grupie:','15', true,'1');
        $form->DateMin('groupstart','Data otwarcia grupy',date('Y-m-d'),true,'placeholder="yyyy-mm-dd"');
        $form->Textarea('groupadditional','Notatki dotyczące grupy:','',false,'maxlength="200"');

        $view->Header('Dodaj grupę');
        $view->Custom($form->Render('Dodaj','groupsubmitted'));
        $view->Render();
      break;
      case 'payment':
        $form = new Form(true,'post','#','default-form horizontal-form');
        $form->Number('amount', 'Wartość (zł)', '300', true, 0);
        $form->Textbox('payment_for','Płatność za','CISCO_42_2',true);
        $form->Textbox('payer','Uczeń','Jan Kowalski',true);
        $form->Date('payment_date','Data płatności', true);
        $form->Textarea('additional', 'Dodatkowe informacje','',false,'',1, 60);


        $view->Header("Dodaj płatności");
        $view->Custom('<div class="allrowsofforms"><div class="rowofform">'.$form->Render().'</div></div>');
        $view->Custom('<br><span id="addrowofform"> <i class="fa fa-plus" aria-hidden="true"></i> Dodaj kolejną płatność</span>');
        $view->Custom('<button id="addpayment"> Dodaj płatności </button>');
        $view->Render();
      break;
    }
  } else {
     header('Location: index.php');
  }
