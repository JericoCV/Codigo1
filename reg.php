<?php
$numbers = (int) 1234567890;
$lowercase = "abcdefghijklmnopqrstuvwxyz";
$uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$chars = "%áñ";

$patron = "/^9\d{8}/";
$expresion = 999666222;
preg_match($patron, $expresion, $values);
var_dump($values);
echo preg_match($patron, $expresion);
