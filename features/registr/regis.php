<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);


/* Проверка данных */

// echo $login . $email . $password;

if($login == '' || $login == 'admin'){
  echo "<br>" .'Поле логина не заполнена';
  exit;
}else{
  echo '✔'; 
}
if($email == ''){
  echo "<br>" . 'Поле email пустое';
  exit;
}else{
  echo '✔'; 
}
if($password == ''){
  echo "<br>" . 'заполните поле пароль!';
  exit;
}else if(mb_strlen($password) < 8){
  echo "<br> Пароль должен содержать не менее 8 символов";
} else{
  echo '✔'; 
}
$password = md5($password);
// подключение к базе
$mysql = new mysqli('localhost', 'root', '', 'dsn');
$result = $mysql->query("SELECT * FROM `user` WHERE `name` = '$login' OR `email` = '$email'");
$user = $result->fetch_assoc();
if(count($user) == 0){
$mysql->query("INSERT INTO `user` (`name`, `email`, `pass`) VALUES('$login', '$email', '$password')");

setcookie('user', $login, time() + 3600, "/");
setcookie('massage', 'Успешная регистрация', time() + 60, "/");
}else{
  setcookie('massage', 'Такой пользователь уже существует', time() + 60, "/");
}
// echo $user . ' ' . $result;
// завершене сеанса
$mysql->close();

header('location: /pages/index/index.php');