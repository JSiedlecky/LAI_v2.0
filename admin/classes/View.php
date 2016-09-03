<?php

class View {

    private $header;
    private $content;
    public  $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function Header($string){
        $this->header = '<h2 class="view-header">'.$string.'</h2>';
    }

    public function AppendContent($appending){
        $this->content .= $appending;
    }

    public function Section($options = ["name"=>"","content"=>"","class"=>"default-section"]) {
        $section =  '<section class="'.$options['class'].'">';
        $section .=   '<h3 class="section_header">'.$options['name'].'</h3>';

        $section .=   $options['content'];

        $section .= '</section>';

        $this->content .= $section;
    }

    public function Table($options = ["name"=>"","ordinal"=>false,"class"=>"default-table","column_names"=>[],"data"=>[],"column_class"=>[]]){
        $table = '<table class="'.$options['class'].'">';

            $table .= "<thead>";
            if($options['name'] !== ""){
                $colspan = count($options['column_names']);
                if($options['ordinal']) $colspan++;
                $table .= '<tr>';
                $table .= '<th class="t_name" colspan="'.$colspan.'">'.$options['name'].'</th>';
                $table .= '</tr>';
            }

            $table .= '<tr>';
            if($options['ordinal']) $table .= '<th class="t-ordinal">LP</th>';
                foreach($options['column_names'] as $item){
                    $table .= '<th class="t-columns">'.$item.'</th>';
                }
            $table .= '</tr>';

            $table .= '</thead>';
            $table .= '<tbody>';

                foreach ($options['data'] as $k => $r){
                    $table .= '<tr>';
                        $lp = $k + 1;
                        if($options['ordinal']) $table .= '<td class="t-ordinal">'.$lp.'</td>';
                        foreach ($options['data'][$k] as $col){
                            $table .= '<td class="t-columns">'.$col.'</td>';
                        }
                    $table .= '</tr>';
                }

            $table .= '</tbody>';
        $table .= '</table>';

        $this->content .= $table;
    }

    public function Render($options = ["debug"=>false]){
        if($options['debug']){
            die($this->content);
            $this->content = "";
        } else {
            echo $this->header;
            echo $this->content;
            $this->header = "";
            $this->content = "";
        }
    }

}

?>
