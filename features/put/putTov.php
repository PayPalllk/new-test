<?php
$id = $_POST['id'];
$nam = trim($_POST['nam']);
$price = trim($_POST['price']);
  
require_once '../../shared/connect/bd.php';
$result = $bd->query("SELECT * FROM `product` WHERE `id` = '$id'");
$res = $result->fetch_assoc();
if($res['name'] == $nam && $res['price'] == $price){
  $bd -> close();
  setcookie('massage', 'Данные совпадают с уже имеющимися', time() + 60, "/");
  header('location: /pages/admin/admin.php');
  exit;
}
if(!isset($res)){
  echo 'Нет';
  exit;
}else{
  if($nam != $res['name']){
    $bd->query("UPDATE `product` SET `name` = '$nam' WHERE `id` = '$id'");
  }
  if($price != $res['price']){
    $bd->query("UPDATE `product` SET `price` = '$price' WHERE `id` = '$id'");
  }
}

setcookie('massage', 'Изменения применины', time() + 60, "/");
$bd -> close();
header('location: /pages/admin/admin.php');