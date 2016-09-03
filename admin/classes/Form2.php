<?php

class Form2 {

  private $content = "";

  public function __construct($ajax = false, $method = "POST", $action = "#", $class = "default-form", $novalidate = false){
    if($ajax) $form = '<form';
      else $form = '<form method="'.$method.'" action="'.$action.'"';

    $form .= ' class="'.$class.'"';

    if($novalidate) $form .= " novalidate>";
      else $form .= ">";

    $this->content .= $form;
  }

  public function Textbox($name, $placeholder = "", $add = "") {
    $input = $this->buildStandardInput('text',$name,$placeholder,$add);

    $this->content .= $input;
  }

  public function Email($name, $placeholder = "", $add = "") {
    $input = $this->buildStandardInput('email',$name,$placeholder,$add);

    $this->content .= $input;
  }

  public function Date($name, $placeholder = "", $add = ""){
    $input = $this->buildStandardInput('date',$name,$placeholder,$add);

    $this->content .= $input;
  }

  public function DateMin($name, $placeholder = "", $min){
    $add = 'min="'.$min.'"';
    $input = $this->buildStandardInput('date', $name, $placeholder, $add);

    $this->content .= $input;
  }

  public function DateMax($name, $placeholder = "", $max){
    $add = 'max="'.$max.'"';
    $input = $this->buildStandardInput('date', $name, $placeholder, $add);

    $this->content .= $input;
  }

  public function DateMinMax($name, $placeholder = "", $min, $max){
    $add = 'min="'.$min.'" max="'.$max.'"';
    $input = $this->buildStandardInput('date', $name, $placeholder, $add);

    $this->content .= $input;
  }

  private function buildStandardInput($type, $name, $placeholder, $add){
    $input = '<div class="form_section">';
      $input .= '<div class="textbox_name">'.$placeholder.'</div>';
      $input .= '<input type="'.$type.'" name="'.$name.'" placeholder="'.$placeholder.'" '.$add.' />';
    $input .= '</div>';

    return $input;
  }

  public function Render($debug = false){
    $this->content .= '</form>';

    if($debug){
      die(htmlspecialchars($this->content));
    }

    return $this->content;
    $this->content = "";
  }
}
