<?php
header("Content-Type: application/json; charset=UTF-8");

$json = file_get_contents("php://input");

$array = json_decode($json, true);

if(!isset($array)){
  $js = ["message" => "Товар не выбран"];
  $json = json_encode($js, JSON_UNESCAPED_UNICODE);
  echo $json;
  exit;
}
extract($array);
/* $data */

require_once '../../shared/connect/bd.php';

if(isset($m)){
  $rec = mysqli_query($bd,"SELECT `num` FROM `basket` WHERE `id` = '$data'");
  $result = mysqli_fetch_assoc($rec);
  if(!isset($result)){
    $js = ["message" => "Ошибка в запросе"];
    $json = json_encode($js, JSON_UNESCAPED_UNICODE);
    echo $json;
    $bd->close();
    exit;
  }
  if($m == 'plus'){
    $num = $result['num'];
  $num += 1;
  $bd->query("UPDATE `basket` SET `num` = '$num' WHERE `id` = '$data'");
  }else if($result['num'] > 1){
    $num = $result['num'];
  $num -= 1;
  $bd->query("UPDATE `basket` SET `num` = '$num' WHERE `id` = '$data'");
  }else{
    mysqli_query($bd, "DELETE FROM `basket` WHERE `id` = '$data'");
    // $bd->close();
    
    
    $js = ["message" => "Товар удален из корзины"];
      $json = json_encode($js, JSON_UNESCAPED_UNICODE);
      echo $json;
      $bd->close();
  }
}else{
    mysqli_query($bd, "DELETE FROM `basket` WHERE `id` = '$data'");
    // $bd->close();
    
    
    $js = ["message" => "Товар удален из корзины"];
      $json = json_encode($js, JSON_UNESCAPED_UNICODE);
      echo $json;
      $bd->close();
    
}


// print_r($result);
// $bd->close();
// exit;
// if($result['num'] > 1){
//   $num = $result['num'];
//   $num -= 1;
//   $bd->query("UPDATE `basket` SET `num` = '$num' WHERE `id` = '$data'");
// }else{
// mysqli_query($bd, "DELETE FROM `basket` WHERE `id` = '$data'");
// // $bd->close();
// }

// $js = ["message" => "Товар удален из корзины"];
//   $json = json_encode($js, JSON_UNESCAPED_UNICODE);
//   echo $json;
//   $bd->close();
