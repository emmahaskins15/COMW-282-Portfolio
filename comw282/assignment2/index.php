<?php
$subtotal = 0;

function CalcTax ($subtotal){
    $total = $subtotal * 1.06;
    return $total;
}

function CalculateCost (&$ship_method){
    switch ($ship_method){
        case 1:
            $subtotal = 6.7;
            break;
        case 2:
            $subtotal = 7.2;
            break;
        case 3:
            $subtotal = 13.65;
            break;
        case 4:
            $subtotal = 18.9;
            break;
    }
    return $subtotal;
}
?>