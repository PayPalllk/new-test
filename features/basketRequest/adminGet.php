<?php 
header("Content-Type: application/json; charset=UTF-8");
$json = file_get_contents("php://input");
$array = json_decode($json);


if(!isset($array)){
  $js = ['message'=> 'Ошибка в данных'];
  echo json_encode($js, JSON_UNESCAPED_UNICODE);
  exit;
}
// extract($array);
// $id = $array['id'];
require_once '../../shared/connect/bd.php';

// mysqli_query($bd, "DELETE FROM `basket` WHERE `id` = '$array'");
mysqli_query($bd, "UPDATE `basket` SET `status` = 'get' WHERE `id` = '$array'");
$bd->close();

$js = ['message'=> 'Успешно!'];
  echo json_encode($js, JSON_UNESCAPED_UNICODE);