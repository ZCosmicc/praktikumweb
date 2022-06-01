<?php 
    $r = 4.2;
    $v = 4/3 * M_PI * pow($r, 3);
    $formated = number_format($v, 3);

    echo "$formated m3";
?>