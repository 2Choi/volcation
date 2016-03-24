<?php
$min = (int)date("i");
$sec = (int)date("s");
$min=$min%5;

echo $min.":".$sec;
?>