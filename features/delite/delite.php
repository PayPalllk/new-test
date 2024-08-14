<?php require_once '../../shared/connect/bd.php';
header("Content-Type: application/json; charset=UTF-8");
$json = file_get_contents("php://input");
$array = Json_decode($json);
$id = $array;

// $id = $_POST['id'];

// $rec = mysqli_query($bd,"SELECT DISTINCT * FROM `product` WHERE `id` = '$id'");
// $result = mysqli_fetch_assoc($rec);
// $nam = $result['name'];
// $price = $result['price'];
// $image = $result['image'];
// $type = $result['type'];

// mysqli_query($bd, "DELETE FROM `product` WHERE `id` = '$id' AND `name` = '$nam'");
mysqli_query($bd, "DELETE FROM `product` WHERE `id` = '$id'");
$bd->close();

$js = ["message" => "Удалено"];
  $json = json_encode($js, JSON_UNESCAPED_UNICODE);
  echo $json;