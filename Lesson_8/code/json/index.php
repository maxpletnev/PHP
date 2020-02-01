<?php
$mas = ["good"=>"Audi","price"=>1000];
$str = json_encode($mas);
//echo $str;

$arr = json_decode($str,true);

print_r($arr);