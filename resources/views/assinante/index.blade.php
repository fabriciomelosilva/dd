<?php

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

//print_r($menu);


foreach($menu as $key => $value){
    $year = $key;
    echo '<div>'.$year.'</div>';
        foreach($value as $month){
            $month = date(mktime(0, 0, 0, $month));
            $month = ucwords(strftime('%B',$month));
            echo '<div>'.$month.'</div>';
        }
}

print_r($edicao);


