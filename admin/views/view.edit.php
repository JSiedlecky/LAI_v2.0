<?php
  $type = $_GET['type'];
  $validTypes = ['group'];
  if(isset($_GET['id'])) $id = $_GET['id'];


  #DISPLAYING RIGHT FORM
  if(in_array($type,$validTypes)){
    switch($type){
      case 'group':
        $group = $view->db->Select('groups',['*'],['idg'=>$id])[0];
        print_obj($group);

        $form = new Form(false,'post','#','default-form');
        $form->Textbox('group_name','Nazwa grupy','',true,'value="'.$group['group_name'].'"');
        $form->Select('groupmodule','Moduł grupy:',[
          'cisco' => 'CISCO',
          'www'   => 'Aplikacje'
        ], true,$group['module']);
        $form->Select('groupyears','Ilość lat:',[
          '1'   => 'Jeden rok',
          '2'   => 'Dwa lata'
        ], true,$group['years']);
        $form->Select('groupdays','Dni tygodnia:',[
          'Tydzień'   => 'Tydzień roboczy',
          'Weekend'   => 'Weekendy'
        ], true,$group['days']);
        $view->Header('Edytuj grupę: #'.$id);
        $view->Custom($form->Render('Zapisz zmiany.'));
        $view->Render();
      break;
    }
  } else {
     header('Location: index.php');
  }
