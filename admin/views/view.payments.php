<?php

if(!$user->getPermissions()[$_GET['page']]){
  header("location: index.php");
}

$payments = $view->db->Select('payments');

foreach($payments as $count => $row){
  foreach($row as $k => $v){
    if($k == 'amount') $payments[$count][$k] = $v.' zł';
    if($user->getPermissions()['isGm'] || $user->getPermissions()['pay_modify']) $payments[$count]['action'] = '<span class="payment-actions" data-action="modify">Modyfikuj</span>';
    if($user->getPermissions()['isGm'] || $user->getPermissions()['pay_delete']) $payments[$count]['action'] .= '<span class="payment-actions" style="margin-left: 15px;" data-action="delete">Usuń</span>';
  }
}

$view->Header('Płatności       '.($user->getPermissions()['isGm'] || $user->getPermissions()['pay_add'] ?'<a class="addgroup" href="index.php?page=add&type=payment">Dodaj płatność <i class="fa fa-plus" aria-hidden="true"></i></a>' : ''));
if($user->getPermissions()['isGm'] || $user->getPermissions()['pay_modify'] || $user->getPermissions()['pay_delete']){
  $view->Table([
                'name'          => 'Lista wszystkich płatności',
                'ordinal'       => false,
                'class'         => 'default-table payments-table',
                'column_names'  => ['ID','Wartość','Za co','ID płatnika','Od kogo','Data','Dodatkowe informacje','Akcje'],
                'data'          => $payments,
                'html'          => false
              ]);
} else {
  $view->Table([
                'name'          => 'Lista wszystkich płatności',
                'ordinal'       => false,
                'class'         => 'default-table payments-table',
                'column_names'  => ['ID','Wartość','Za co','Od kogo','Data','Dodatkowe informacje'],
                'data'          => $payments,
                'html'          => false
              ]);
}
$view->Render();
