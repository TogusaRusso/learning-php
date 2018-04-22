<?php
function restaurant_check($meal, $tax, $tip, $include_tax_in_tip = false) { 
    $tax_amount = $meal * ($tax / 100);
    $tip_base = $meal;
    if ($include_tax_in_tip) {
        $tip_base += $tax_amount;
    }
    $tip_amount = $tip_base * ($tip / 100); 
    $total_amount = $meal + $tax_amount + $tip_amount; 
    return $total_amount; 
}