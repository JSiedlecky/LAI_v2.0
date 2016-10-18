 <?php
  $type = $_GET['type'];
  $validTypes = ['group', 'payment'];
  if(isset($_GET['id'])) $id = $_GET['id'];

  #POST HANDLING
  if(isset($_POST['groupsubmitted'])){
    #n... stands for new ...
    $nname = $_POST['groupname'];
    $nmodule = $_POST['groupmodule'];
    $nyears = (isset($_POST['groupyears']) ? $_POST['groupyears'] : 'NULL');
    $ndays = (isset($_POST['groupdays']) ? $_POST['groupdays'] : 'NULL');
    $nmaxstudents = $_POST['groupmaxstudents'];
    $nactive = $_POST['groupactive'];
    $nstart = $_POST['groupstart'];
    $nend = $_POST['groupend'];
    $nadditional = $_POST['groupadditional'];

    if($view->db->Update('groups',
                        [ 'group_name'   => $nname,
                          'module'      => $nmodule,
                          'years'       => $nyears,
                          'days'        => $ndays,
                          'max_students'=> $nmaxstudents,
                          'active'      => $nactive,
                          'start'       => $nstart,
                          'end'         => $nend,
                          'additional'  => $nadditional],
                        [ 'idg' => $id ]))
      echo 'Pomyślnie edytowano grupę!';
    else echo 'Wystąpił błąd!';

  }

  if(isset($_POST['paymentsubmitted'])){
    $namount = $_POST['amount'];
    $npaymentfor = $_POST['payment_for'];
    $npayer =  $_POST['payer'];
    $npaymentdate = $_POST['payment_date'];
    $nadditional = (isset($_POST['additional']) ? $_POST['additional'] : '');

    if($view->db->Update('payments',
                        [ 'amount'        => $namount,
                          'payment_for'   => $npaymentfor,
                          'payer'         => $npayer,
                          'payment_date'  => $npaymentdate,
                          'additional'    => $nadditional],
                        [ 'idpay' => $_GET['payment']]))
      echo 'Pomyślnie edytowano płatność!';
    else echo 'Wystąpił błąd!';
  }

  #DISPLAYING RIGHT FORM
  if(in_array($type,$validTypes)){
    switch($type){
      case 'group':
        $group = $view->db->Select('groups',['*'],['idg'=>$id])[0];
        $students = $view->db->Select('students',['ids','name','surname','email','phone','activity'],[],'WHERE `'.$group['module'].'` IS NOT NULL AND '.$group['module'].'_group = '.$group['idg']);

        $stds = [];
        foreach($students as $k => $st){
          $stds[$k] = $st;
          $stds[$k]['elo'] = '<i class="fa fa-lg fa-trash delete-student" aria-hidden="true"></i>';
        }

        $form = new Form(false,'post','#','default-form');
        $form->Hidden('originalmodule',$group['module']);
        $form->Textbox('groupname','Nazwa grupy','',true,'value="'.$group['group_name'].'"');
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
        $form->Number('groupmaxstudents','Maksymalna ilość uczniów w grupie:','15', true,'1','','value="'.$group['max_students'].'"');
        $form->Range('groupactive','Aktywność',0,($group['module'] == 'cisco' ? 5 : 100),true,'step="1" value="'.$group['active'].'"');
        $form->DateMin('groupstart','Data otwarcia grupy',$group['start'],true,'value="'.$group['start'].'"');
        $form->DateMin('groupend','Data zamknięcia grupy',$group['start'],true,'value="'.$group['start'].'"');
        $form->Textarea('groupadditional','Notatki dotyczące grupy:',$group['additional'],false,'maxlength="200"');

        $stable = $view->Table([
          "name"          => 'Studenci należący do tej grupy',
          "ordinal"       => false,
          "class"         => 'default-table group_table',
          "column_names"  => ['ID',
                              'Imię',
                              'Nazwisko',
                              'Email',
                              'Telefon',
                              'Aktywność',
                              'Usuń'],
          "data"          => $stds,
          "html"          => true
        ]);

        $view->Header('Edytuj grupę: #'.$id);
        $view->Custom('<div style="float: left; width: 30%;">'.$form->Render('Zapisz zmiany.','groupsubmitted').'</div>');
        $view->Custom('<div style="float: left; width: 70%;">'.$stable."</div>");

        $view->Render();
      break;
      case 'payment':
        $pid = $_GET['payment'];
        $payment = $view->db->Select('payments',['*'],['idpay' => $pid])[0];

        $form = new Form(false,'post','#','default-form');
        $form->Number('amount', 'Wartość (zł)', $payment['amount'], true, 0, 'false', 'value="'.$payment['amount'].'"');
        $form->Textbox('payment_for','Płatność za',$payment['payment_for'],true, 'value="'.$payment['payment_for'].'"');
        $form->Textbox('payer','Uczeń',$payment['payer'],true, 'value="'.$payment['payer'].'"');
        $form->Date('payment_date','Data płatności', true, 'value="'.$payment['payment_date'].'"');
        $form->Textarea('additional', 'Dodatkowe informacje', $payment['additional'], false);


        $view->Header("Edytujesz płatność: #".$pid);
        $view->Custom($form->Render('Zapisz zmiany.', 'paymentsubmitted'));
        $view->Render();
      break;
    }
  } else {
     header('Location: index.php');
  }
