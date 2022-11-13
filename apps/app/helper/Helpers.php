<?php
if(!function_exists('currency_IDR')){
    function currency_IDR($value){
        return "Rp. " . number_format($value,0,',','.');
    }
}
