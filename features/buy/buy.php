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

$user = $array['name']; 
$idTov = $array['idTov']; 
if($user == 'ВОЙТИ'){
  $message = ["message" => "Войдите в аккаунт"];
  echo json_encode($message, JSON_UNESCAPED_UNICODE);
  exit;
}

require_once '../../shared/connect/bd.php';

$query = $bd->query("SELECT `num` FROM `basket` WHERE `name` = '$user' AND `idTov` = '$idTov' AND `status` is NULL");
$res = $query->fetch_assoc();

if(isset($res)){
  $num = $res['num'];
  $num += 1;
  $bd->query("UPDATE `basket` SET `num` = '$num' WHERE `idTov` = '$idTov' AND `name` = '$user' AND `status` is NULL");
}else{
  $num = 1;
$queryUser = $bd->query("SELECT * FROM `user` WHERE `name` = '$user'");
$resultUser = $queryUser->fetch_assoc();
if(!isset($resultUser)){
  $message = ["message" => "Пользователь не найден"];
  echo json_encode($message, JSON_UNESCAPED_UNICODE);
  $bd->close();
  exit;
}
['id' => $idUser] = $resultUser;

$queryTov = $bd->query("SELECT * FROM `product` WHERE `id` = '$idTov'");
$resultTov = $queryTov->fetch_assoc();
if(!isset($resultTov)){
  setcookie('massage', 'товар не найден', time() + 60, "/");
  $message = ["message" => "Товар не найден"];
  echo json_encode($message, JSON_UNESCAPED_UNICODE);
  exit;
}
// extract($result); дестурезует ассоциативный массив по ключам
['name' => $nameTov, 'price' => $price, 'image' => $image] = $resultTov;
mysqli_query($bd, "INSERT INTO `basket` (`idUser`, `idTov`, `name`, `nameTov`, `image`, `price`, `num`) VALUE('$idUser', '$idTov', '$user', '$nameTov', '$image', '$price', '$num')");
}

$bd -> close();

$js = ['message' => 'Добавлено в корзину'];
$js = json_encode($json, JSON_UNESCAPED_UNICODE);
echo $js;
