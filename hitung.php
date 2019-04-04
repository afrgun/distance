<?php
function counts($param1, $param2){
    $city = array("A", "B", "C", "D", "E", "F");
    $distance = array(45, 51, 38, 104, 93, 0);
    $hasil = 0;

    if($param1 < $param2){
        for($i = $param1; $i < $param2; $i++){
            $hasil += $distance[$i];
        }
        $consume = $hasil / 9;
        return array($consume, $hasil);

    } else {
        for($i = $param1-1; $i >= $param2; $i--){
            $hasil += $distance[$i];
        }
        $consume = $hasil / 9;
        return array($consume, $hasil);
    }
} 
?>