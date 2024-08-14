<?php 
$nam = trim($_POST['nam']);
$price = trim($_POST['price']);
// $image = trim($_POST['image']);
$type = trim($_POST['type']);
// if($image != ''){
  // . rand(00000,99999)
  print_r($_FILES['tmp_name']);
  print_r($_FILES['image']);
  echo "<br>";
  if(isset($_FILES['image']['tmp_name'])){
if(empty($_FILES)){
  $file = '../../shared/image/' . $_FILES['image']['name'];
  if(!move_uploaded_file($_FILES['image']['tmp_name'], $file)){
    echo 'изображение не перенесенно';
    // print_r($image . '; ' . $file . "<br>");
    // exit;
  }
}
  }

// $image = 'image/' . $image;
if($nam == ''){ 
  setcookie('massage', 'Форма не заполнена', time() + 60, "/");
  header('location: ../../pages/admin/admin.php');
  exit;
}

echo 'name = '.$nam . "<br>";
echo 'price = '.$price . "<br>";               
echo 'image = '.$image . "<br>";
echo 'type = '.$type . "<br>";
echo 'file = '.$file . "<br>";
// exit;


require_once '../../shared/connect/bd.php';

mysqli_query($bd, "INSERT INTO `product` (`name`, `price`, `image`, `type`) VALUES('$nam', '$price', '$file', '$type')");

setcookie('massage', 'Товар успешно добавлен', time() + 60, "/");

$bd->close();
header('location: ../../pages/admin/admin.php');

