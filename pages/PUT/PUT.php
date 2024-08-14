<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/shared/optionStyle/PUT.css">
  <!-- <link rel="stylesheet" href="/shared/mainStyle/Style.css">
  <link rel="stylesheet" href="/shared/mainStyle/Block.css"> -->
  <title>Пользователь</title>
</head>
<!-- Сообщения -->
<?php
if(isset($_COOKIE['massage'])){?>
  <script defer>
    setTimeout(() => {
      alert('<?=$_COOKIE["massage"]?>')
    }, 100);
  </script>
<?php
 setcookie('massage', '', time() - 60, "/");
 }
 ?>
<!-- Пользователь -->
<?php require_once "../../shared/connect/bd.php";
if(isset($_COOKIE['user'])){
  $name = $_COOKIE['user'];
$result = $bd->query("SELECT * FROM `user` WHERE `name` = '$name'");
$user = $result->fetch_assoc();
if(!isset($user)){
  ?>
  <script defer>setTimeout(()=>{
  alert('Данные не найдены')
  }, 200)
  </script>
<?php }
}else{?>
  <script defer>setTimeout(()=>{
  alert('Войдите в аккаунт')
  }, 200)
  </script>
<?php } ?>
<body>
  <div class="conteiner contentLay">
    <form action="/features/put/put.php" method='POST'>
      <div class="img"></div>
      <div class="text">
        <input type="hidden" name='id' value='<?=$user['id']?>'>
        <div>
          <label for="name">имя пользователя</label>
          <input type="text" name='name' placeholder='Введите желаемое имя' value='<?=$user['name']?>'>
        </div>
        <div>
          <label for="email">Email</label>
          <input type="email" name='email' placeholder='Введите email' value='<?=$user['email']?>'>
        </div>
        <div>
          <label for="number">номер</label>
          <input type="number" name='number' placeholder='Введите номер телефона' value='<?=$user['number']?>'>
        </div>
        <button type="submit">Отправить</button>
        <a href="/pages/index/index.php">Назад</a>
      </div>
    </form>
  </div>
</body>
</html>