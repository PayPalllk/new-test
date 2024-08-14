<?php
header("Content-Type: application/json; charset=UTF-8");
$json = file_get_contents("php://input");
$array = json_decode($json);
// print_r($array);


// extract($array);
// print_r($data, $day);
$day = date('y-m-d');
// print_r($day);


if(!isset($array)){
  $js = ['message'=> 'Корзина пуста'];
  echo json_encode($js, JSON_UNESCAPED_UNICODE);
  exit;
}

require_once '../../shared/connect/bd.php';

foreach ($array as $value) {
  $bd->query("UPDATE `basket` SET `status` = 'waiting', `toDay` = '$day' WHERE `id` = '$value' AND `status` is NULL");
  // echo $value . ' ' . $day . "<br>";
}
unset($value);

$js = ['message'=> 'Успешно'];
  echo json_encode($js, JSON_UNESCAPED_UNICODE);
$bd->close();