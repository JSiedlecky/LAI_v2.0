<?php
  $type = $_GET['type'];
  $validTypes = ['group'];

  #POST HANDLING
  if(isset($_POST['formsubmitted'])){
    #n... stands for new ...
    $nname = $_POST['groupname'];
    $nmodule = $_POST['groupmodule'];
    $nyears = (isset($_POST['groupyears']) ? $_POST['groupyears'] : "NULL");
    $ndays = (isset($_POST['groupdays']) ? $_POST['groupdays'] : "NULL");
    $nmaxstudents = $_POST['groupmaxstudents'];
    $nstart = $_POST['groupstart'];
    $nadditional = $_POST['groupadditional'];

    if(uniqueName('groups','group_name',$nname)){
      if($view->db->Insert('groups',['group_name','module','years','days','students','max_students','active','start','end','additional'],
                      [$nname,$nmodule,$nyears,$ndays,0,$nmaxstudents,0,$nstart,'0000-00-00',$nadditional])) echo 'Pomyślnie dodano grupę!';
    } else echo 'Grupa z taka nazwa już istnieje!';
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
        $view->Custom($form->Render('Dodaj','formsubmitted'));
        $view->Render();
        break;
    }
  } else {
     header('Location: index.php');
  }
