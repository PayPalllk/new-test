<?php
$arrayId = $_POST['id'];
$arrayStatus = $_POST['status'];
// print_r($arrayStatus);
// echo "<br>";
// print_r($arrayId);
// echo "<br>";
// echo "<br>";
$array = [];
for($i = 0; $i < count($arrayId); $i++){
  if($arrayStatus[$i] == 'ready'){
  array_push($array, ['id' => $arrayId[$i], 'status' => $arrayStatus[$i]]);
  }
}
print_r($array);
// echo count($array);

require_once '../../shared/connect/bd.php';

foreach ($array as $value) {
  $id = $value['id'];
  $bd->query("UPDATE `basket` SET `status` = 'ready' WHERE `id` = '$id' AND `status` = 'waiting'");
}
unset($value);
$bd->close();
header('location: ../../pages/applications/adminApplications.php');