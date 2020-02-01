<?php
$arr = ["hour"=>date("H"),"min"=>date("i"),"sec"=>date("s")];
echo json_encode($arr);