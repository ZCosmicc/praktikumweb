<?php
    $celcius = 37.841;
    $fahrenheit = ($celcius * 9/5) + 32;
    $reamur = $celcius * 4/5;
    $kelvin = $celcius + 273.15;
    $formated_F = number_format($fahrenheit, 4);
    $formated_R = number_format($reamur, 4);
    $formated_K = number_format($kelvin, 4);

    echo "Fahrenheit (F)= $formated_F<br>";
    echo "Reamur (R)= $formated_R<br>";
    echo "Kelvin (K)= $formated_K<br>";
?>