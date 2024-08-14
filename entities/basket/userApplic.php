<?php
header("Content-Type: application/json; charset=UTF-8");
$json = file_get_contents("php://input");
$array = Json_decode($json, true);

if(!isset($array)){
  $js = ["message" => "Пока что ничего нету, возможно администратор ещё не ответил на ваш запрос"];
  $json = json_encode($js, JSON_UNESCAPED_UNICODE);
  echo $json;
  exit;
}
extract($array);

require_once '../../shared/connect/bd.php';
$result = $bd -> query("SELECT * FROM `basket` WHERE `name` = '$name' AND `status` != ''");
if(isset($result) && $result != '') {

  $array = [];
while($basket = $result -> fetch_assoc()){
  array_push($array, $basket);
}
 $json = json_encode($array, JSON_UNESCAPED_UNICODE);
    echo $json;
}else{
  echo 'Ошибка в запросе';
}

$bd->close();