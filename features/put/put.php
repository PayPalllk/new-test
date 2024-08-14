<?php
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];

if($number != NULL && $number != ''){
  // $number = number_format($number);
  }else{
    $number = NULL;
  }
  echo $id . ' ' . $name.' '.$email.' '.$number;
  
require_once '../../shared/connect/bd.php';
$result = $bd->query("SELECT * FROM `user` WHERE `id` = '$id'");
$res = $result->fetch_assoc();
if($res['name'] == $name && $res['email'] == $email && $res['number'] == $number){
  $bd -> close();
  setcookie('massage', 'Данные совпадают с уже имеющимися', time() + 60, "/");
  header('location: /pages/index/index.php');
  exit;
}
if(!isset($res)){
  echo 'Нету такого пользователя';
  exit;
}else{
  if($name != $res['name']){
    $bd->query("UPDATE `user` SET `name` = '$name' WHERE `id` = '$id'");
  }
  if($email != $res['email']){
    $bd->query("UPDATE `user` SET `email` = '$email' WHERE `id` = '$id'");
  }
  if($number != $res['number'] && $number != NULL){
    $bd->query("UPDATE `user` SET `number` = '$number' WHERE `id` = '$id'");
  }else if($number == NULL){
    $bd->query("UPDATE `user` SET `number` = NULL WHERE `id` = '$id'");
  }
}


// $bd->query("UPDATE `user` SET `name` = '$name', `email` = '$email', `number` = '$number' WHERE `id` = '$id'");
// echo $res['name'];
setcookie('user', '', time() - 3600, "/");
setcookie('user', $name, time() + 3600, "/");
setcookie('massage', 'Изменения применины', time() + 60, "/");
$bd -> close();
// header('location: /pages/PUT/PUT.php');
header('location: /pages/index/index.php');