<?php

class View {

    private $header;
    private $content;

    public function Header($string){
        $this->header = '<h2>'.$string.'</h2>';
    }

    public function AppendContent($appending){
        $this->content .= $appending;
    }

    public function Table($options = ["name"=>"","ordinal"=>false,"class"=>"default-table","column_names"=>[],"data"=>[]]){
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
                        if($options['ordinal']) $table .= '<td class="t-ordinal">'.$k++.'</td>';
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
            echo $this->content;
            die();
        } else {
            echo $this->header;
            echo $this->content;
        }
    }

}

?>