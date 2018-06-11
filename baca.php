<?php

    $myFile = "traffic_bulanan/traffic_1290_2018-05.html";
    $lines = file($myFile);//file in to an array
    echo $lines[197]; //persen up
    echo $lines[198]; //persen down
    // print_r($list);

    $string_1 = explode(" %", $lines[197]);
    $string_2 = explode('">', $string_1[0]);
    $persen_up = $string_2[1];

    die("selesai\n");

?>
