<?php
  class Form{

    private $method;
    private $url;
    private $radioName = '';

    public function __construct($method = "POST",$typeOfDataTransport = "submit",$url = "#"){
      if(strtolower($typeOfDataTransport) != "get"){

      }
      $this->method = $method;
      $this->url = $url;
    }
    public function start($formClass = ''){
      return '<form action="'.$this->url.'" class="'.$formClass.'" method="'.$this->method.'">';
    }
    public function close(){
      return '</form>';
    }
    public function getRadiName(){
      return $this->radioName;
    }
    public function getTextbox($name,$placeholder){
      $html = '<input type="text" name="'.$name.'" placeholder="'.$placeholder.'"/>';
      return $html;
    }
    public function getPassword($name,$placeholder){
      $html = '<input type="text" name="'.$name.'" placeholder="'.$placeholder.'"/>';
      return $html;
    }
    public function getSubmit($name,$value){
      $html = '<input type="submit" name="'.$name.'" value="'.$value.'"/>';
      return $html;
    }
    public function getReset(){
      $html = '<input type="reset" />';
      return $html;
    }
    public function setRadioName($name){
      $this->radioName = $name;
    }
    //allways add @ befor this function
    public function getRadio($value,$displayName,$checked,$name){
      if($this->radioName == ''){
        $this->radioName = $name;
      }
      if($checked != null){
        $checked = "checked";
      }
      return '<input type="radio" name="'.$this->radioName.'" value="'.$value.'" '.$checked.'/>'.$displayName;
    }
    public function getCheckbox($name, $value,$displayName){
      return '<input type="checkboc" name="'.$name.'" value="'.$value.'" />'.$displayName;
    }
    public function getButton($name,$value){
      return '<input type="button" name="'.$name.'" value="'.$value.'"/>';
    }
    public function getNumber($name,$value){
      if($value == null){
        $value = 0;
      }
      return '<input type="number" name="'.$name.'" value="'.$value.'">';
    }
    public function getNumberMinMax($name,$min,$max,$value){
      if($value == null){
        $value = 0;
      }
      return '<input type="number" name="'.$name.'" min="'.$min.'" max="'.$max.'" value="'.$value.'">';
    }
    public function getNumberMin($name,$min,$value){
      if($value == null){
        $value = 0;
      }
      return '<input type="number" name="'.$name.'" min="'.$min.'" value="'.$value.'">';
    }
    public function getNumberMax($name,$max,$value){
      if($value == null){
        $value = 0;
      }
      return '<input type="number" name="'.$name.'" max="'.$max.'" value="'.$value.'">';
    }
    public function getNumberWithSteps($name,$min,$max,$value,$step){
      if($value == null){
        $value = 0;
      }
      return '<input type="number" name="'.$name.'" min="'.$min.'" max="'.$max.'" value="'.$value.'" step="'.$step.'"/>';
    }
    public function getUrl($name){
      return '<input type="url" name="'.$name.'" />';
    }
    public function getDate($name){
      return '<input type="date" name="'.$name.'" />';
    }
    public function getDateMin($name,$min){
      return '<input type="date" name="'.$name.'" min="'.$min.'"/>';
    }
    public function getDateMax($name,$max){
      return '<input type="date" name="'.$name.'" max="'.$max.'"/>';
    }
    public function getDateMinMax($name,$min,$max){
      return '<input type="date" name="'.$name.'"min="'.$min.'" max="'.$max.'"/>';
    }
    public function getColor($name){
      return '<input type="color" name="'.$name.'">';
    }

  }
?>
