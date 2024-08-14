<?php
header("Content-Type: application/json; charset=UTF-8");
$array = json_decode(file_get_contents("php://input"));
echo $array;
exit;