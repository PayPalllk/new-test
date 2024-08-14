<?php
// sleep(2);
require_once '../../shared/connect/bd.php';
$res = $bd -> query("SELECT `type` FROM `product` GROUP BY `type`");
$type = $res->fetch_assoc();
if(isset($type)){
  if(count($type) == 0){
    setcookie('massage', 'По запросу ничего не найдено', time() + 60, "/");
    // header('location: /');
    $bd ->close();
    exit;
  }else{
    $arrayType[] = $type;
    while($type = $res -> fetch_assoc()){
      array_push($arrayType, $type);
    }
    $jsonType = json_encode($arrayType, JSON_UNESCAPED_UNICODE);
    echo $jsonType;
  }
}else{
  setcookie('massage', 'Ошибка в запросе', time() + 60, "/");
  // header('location: /');
  $bd -> close();
  exit;
}