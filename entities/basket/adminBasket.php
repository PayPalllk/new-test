<?php
require_once '../../shared/connect/bd.php';
$result = $bd -> query("SELECT * FROM `basket` WHERE `status` != ''");
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