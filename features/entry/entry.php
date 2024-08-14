<?php
// header("Content-Type: application/json; charset=UTF-8");
// $array = json_decode(file_get_content("php://input"), true);
// extract($array);
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
// Проверкаа данных
if($login == ''){
  echo "<br>" .'Поле логина не заполнена';
  exit;
} else if($login == 'admin' && $password == 'admin'){
  setcookie('user', 'ADMIN', time() + 3600, "/");
  $js = ['admin'=> '/pages/admin/admin.php'];
  echo json_encode($js, JSON_UNESCAPED_UNICODE);
  // header('location: /pages/admin/admin.php');
  exit;
}
if($password == ''){
  echo "<br>" . 'заполните поле пароль!';
  exit;
}else if(mb_strlen($password) < 8){
  echo "<br> Пароль должен содержать не менее 8 символов";
}
$password = md5($password);
// подключение к базе
$mysql = new mysqli('localhost', 'root', '', 'dsn');
if(!$mysql){
  die("Ошибка подключения к базе данных" . mysqli_error());
}

// Проверка в базе
$result = $mysql->query("SELECT * FROM `user` WHERE `name` = '$login' AND `pass` = '$password'");
if(!$result){
  die("Ошибка подключения базы данных" . mysqli_error());
}
$user = $result->fetch_assoc();
/* echo $user;
exit; */
if(count($user) == 0){
  // setcookie('massage', 'такого пользователя не существует', time() + 40, "/");
  // header('location: /pages/index/index.php');
  // exit;
  $js = ['message'=> 'такого пользователя не существует'];
  echo json_encode($js, JSON_UNESCAPED_UNICODE);
  exit;
}

setcookie('user', $user['name'], time() + 3600, "/");
// setcookie('massage', 'Вы вошли под именем: '. '"' . $user['name'] . '"', time() + 60, "/");

$json = ['user' => $user['name'], 'status' => 'ok', 'message' => 'Вы вошли под именем: ' . '"' . $user['name'] . '"'];
echo json_encode($json, JSON_UNESCAPED_UNICODE);

// завершение сессии
$mysql->close();
// header('location: /pages/index/index.php');