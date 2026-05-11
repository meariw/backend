<?php
function calcTrig($funcName, $param)
{
    $rad = deg2rad($param);
    
    $sin = sin($rad);
    $cos = cos($rad);
    $tan = tan($rad);
    $cot = 1 / tan($rad);

    return $$funcName;
}
?>