<?php

$result = $view->db->Select('groups');

$custom = '';
foreach($result as $r){
  $custom .= '<section class="group_section">';
    $custom .= '<div class="group_vertical_separator">';
      $custom .= '<div class="group_id">'.$r['idg'].'</div>';
    $custom .= '</div>';
    $custom .= '<div class="group_vertical_separator">';
      $custom .= '<div class="group_name">'.GROUP_NAME.': \''.$r['group_name'].'\'</div>';
      $custom .= '<div class="group_module">'.GROUP_MODULE.': \''.$r['module'].'\'</div>';
    $custom .= '</div>';
    $custom .= '<div class="group_vertical_separator">';
      $custom .= '<div class="group_years">'.GROUP_YEARS.': '.$r['years'].'</div>';
      $custom .= '<div class="group_days">'.GROUP_DAYS.': '.$r['days'].'</div>';
    $custom .= '</div>';
    $custom .= '<div class="group_vertical_separator">';
      $custom .= '<div class="group_students">'.GROUP_STUDENTS.': '.$r['students'].'/'.$r['max_students'].'</div>';
      $custom .= '<div class="group_date">'.GROUP_DATE.': '.$r['start'].'</div>';
    $custom .= '</div>';
    $custom .= '<div class="group_vertical_separator">';
      $custom .= '<div class="group_status">'.GROUP_STATUS.': '.$r['active'].'</div>';
    $custom .= '</div>';
  $custom .= '</section>';
}

echo $custom;
