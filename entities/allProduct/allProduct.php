<?php
require_once '../../shared/connect/bd.php';
$result = $bd -> query("SELECT * FROM `product`");
$tov = $result -> fetch_assoc();
if(isset($tov)){
  if(count($tov) == 0){
    setcookie('massage', 'По запросу ничего не найдено', time() + 60, "/");
    // header('location: /');
    $bd ->close();
    exit;
  }else{
    $array[] = $tov;
    while($tov = $result -> fetch_assoc()){
      array_push($array, $tov);
    }
    $json = json_encode($array, JSON_UNESCAPED_UNICODE);
    echo $json;
  }
}else{
  setcookie('massage', 'Ошибка в запросе', time() + 60, "/");
  $bd -> close();
}

$bd->close();


