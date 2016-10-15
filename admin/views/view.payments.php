<?php

  $payments = $view->db->Select('payments');

  foreach($payments as $count => $row){
    foreach($row as $k => $v){
      if($k == 'amount') $payments[$count][$k] = $v.' zł';
      $payments[$count]['action'] = '<span class="payment-actions" data-action="modify">Modyfikuj</span>';
      $payments[$count]['action'] .= '<span class="payment-actions" style="margin-left: 15px;" data-action="delete">Usuń</span>';
    }
  }

  $view->Header('Płatności');
  $view->Table([
                'name'          => 'Lista wszystkich płatności',
                'ordinal'       => false,
                'class'         => 'default-table payments-table',
                'column_names'  => ['ID','Wartość','Za co','Od kogo','Data','Dodatkowe informacje','Akcje'],
                'data'          => $payments,
                'html'          => false
              ]);
  $view->Render();
