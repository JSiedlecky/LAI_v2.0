<?php

class Form {

  private $content = "";
  private $ajax = false;

  public function __construct($ajax = false, $method = "POST", $action = "#", $class = "default-form", $novalidate = false){
    if($ajax) {
      $form = '<form onsubmit="return false;" ';
      $this->ajax = $ajax;
    }
    else $form = '<form method="'.$method.'" action="'.$action.'"';

    $form .= ' class="'.$class.'"';

    if($novalidate) $form .= " novalidate>";
      else $form .= ">";

    $this->content .= $form;
  }

  #TEXT-ISH INPUTS

  public function Hidden($name, $value){
    $this->content .= '<input type="hidden" name="'.$name.'" value="'.$value.'">';
  }

  public function Textbox($name, $display_name, $placeholder = "", $required = false, $add = "") {
    $input = $this->buildStandardInput('text', $name, $display_name, $placeholder, $required, $add);

    $this->content .= $input;
  }

  public function Email($name, $display_name, $placeholder = "", $required = false, $add = "") {
    $input = $this->buildStandardInput('email', $name, $display_name, $placeholder, $required, $add);

    $this->content .= $input;
  }

  public function Password($name, $display_name, $placeholder = "", $required = false, $add = ""){
    $input = $this->buildStandardInput('password', $name, $display_name, $placeholder, $required, $add);

    $this->content .= $input;
  }

  public function Textarea($name, $display_name, $placeholder = "", $required = false, $add = "", $rows = 7, $cols =  40){
    $input = '<div class="form_section">';
      $input .= '<div class="input_name">'.$display_name.'</div>';
      $input .= '<textarea name="'.$name.'" rows="'.$rows.'" cols="'.$cols.'" '.($required ? 'required ' : '').''.$add.'>';
        $input .= ($placeholder != "" ? $placeholder : '');
      $input .= '</textarea>';
    $input .= '</div>';

    $this->content .= $input;
  }

  #HTML5 SPECIFIC INPUTS

  public function Number($name, $display_name, $placeholder = "", $required = false, $min = 'false', $max = 'false', $add = ""){
    $add = ''.($min !== 'false'  ? ' min="'.$min.'"' : '').($max !== 'false' ? ' max="'.$max.'"' : '').' '.$add;
    $input = $this->buildStandardInput('number',$name,$display_name,$placeholder,$required, $add);

    $this->content .= $input;
  }

  public function Range($name, $display_name, $min = 0, $max = 10, $required = false, $add = ""){
    $add = ' min="'.$min.'" max="'.$max.'" '.$add;
    $input = $this->buildStandardInput('range',$name,$display_name,'',$required, $add);

    $this->content .= $input;
  }

  //NOT VALID ON SAFARI/EDGE
  public function Color($name, $display_name, $required = false, $add = ""){
    $input = $this->buildStandardInput('color',$name,$display_name,'', $required, $add);

    $this->content .= $input;
  }

  #DATES

  public function Date($name, $display_name, $required = false, $add = ''){
    $input = $this->buildStandardInput('date', $name, $display_name, '', $required, $add);

    $this->content .= $input;
  }

  public function DateMin($name, $display_name, $min, $required = false, $add = ""){
    $add .= ' min="'.$min.'"';
    $input = $this->buildStandardInput('date', $name, $display_name, "", $required, $add);

    $this->content .= $input;
  }

  public function DateMax($name, $display_name, $max, $required = false){
    $add = 'max="'.$max.'"';
    $input = $this->buildStandardInput('date', $name, $display_name, "", $required, $add);

    $this->content .= $input;
  }

  public function DateMinMax($name, $display_name, $min, $max, $required = false){
    $add = 'min="'.$min.'" max="'.$max.'"';
    $input = $this->buildStandardInput('date', $name, $display_name, "", $required, $add);

    $this->content .= $input;
  }

  #CHOISES

  public function Radio($name, $display_name, $data = [], $checked = "", $horizontal = false){
    $input = '<div class="form_section">';
      $input .= '<div class="input_name">'.$display_name.'</div>';
      foreach($data as $v => $d){
        $input .= '<input type="radio" value="'.$v.'" '.($checked == $v ? 'checked' : '').'> '.$d.(!$horizontal? '<br>' : ' ');
      }
    $input .='</div>';

    $this->content .= $input;
  }

  public function Select($name, $display_name, $data = [], $required = false, $selected = "", $multiple = false, $size = 0){
    $input = '<div class="form_section">';
      $input .= '<div class="input_name">'.$display_name.'</div>';
      $input .= '<select name="'.$name.'"'.($size > 0 ? 'size="'.$size.'"' : '').($multiple ? ' multiple' : '').($required ? ' required' : '').'>';
        $input .= '<option value="">Wybierz</option>';
        foreach($data as $v => $d){
          $input .= '<option value="'.$v.'"'.($v == $selected ? ' selected' : '').'>';
            $input .= $d;
          $input .= '</option>';
        }
      $input .= '</select>';
    $input .= '</div>';

    $this->content .= $input;
  }

  public function Checkbox($name, $display_name, $data = [], $checked = "", $horizontal = false){
    $input = '<div class="form_section">';
      $input .= '<div class="input_name">'.$display_name.'</div>';
      foreach($data as $v => $d){
        $input .= '<input type="checkbox" name="'.$name.'" value="'.$v.'"'.($v == $checked ? 'checked' : '').'> '.$d.(!$horizontal ? '<br>' : ' ');
      }
    $input .= '</div>';

    $this->content .= $input;
  }

  #BUTTONS

  public function ResetBtn($value){
    $input = '<div class="form_section">';
      $input .= '<input type="reset" value="'.$value.'">';
    $input .='</div>';

    $this->content .= $input;
  }

  public function Button($name,$value) {
    $input = '<div class="form_section">';
      $input .= '<input type="button" name="'.$name.'" value="'.$value.'">';
    $input .= '</div>';

    $this->content .= $input;
  }

  private function buildStandardInput($type, $name, $display_name, $placeholder = "", $required = false, $add = ""){
    $input = '<div class="form_section">';
      $input .= '<div class="input_name">'.$display_name.'</div>';
      $input .= '<input type="'.$type.'" name="'.$name.'"'.($placeholder != "" ? ' placeholder="'.$placeholder.'" ' : '').($required ? 'required' : '').' '.$add.'/>';
    $input .= '</div>';

    return $input;
  }

  public function Custom($custom){
    $this->content .= $custom;
  }

  public function Render($submit = "Wyślij", $name = false, $debug = false){
    if(!$this->ajax){
      $this->content .= '<div class="form_section">';
        $this->content .= '<input type="submit" value="'.$submit.'" '.($name != false ? 'name="'.$name.'"' : '').'>';
      $this->content .= '</div>';
    }
    $this->content .= '</form>';

    if($debug){
      die(htmlspecialchars($this->content));
    }

    return $this->content;
    $this->content = "";
  }
}
