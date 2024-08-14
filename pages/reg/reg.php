<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../shared/optionStyle/reg-style.css">
  <link rel="stylesheet" href="../../shared/optionStyle/reg-block.css">
  <!-- <script src="JS/index.js" defer></script> -->
</head>
<body>
  <form action="../../features/registr/regis.php" method="post" class="form">
    <div class="Box">
      <div>
        <div><label for="fio">логин</label></div>
        <input type="text" name="login" id="login" class='inp' size="35">
        <div class="Valid">Не коректное имя</div>
      </div>
      <div >
        <div><label for="email">email</label></div>
        <input type="email" name="email" id="email" class='inp' size="35">
        <div class="Valid">Не коректный email</div>
      </div>
      <div >
        <div><label for="password">пароль</label></div>
        <input id="password" name="password" class='inp' type="password" size="35">
        <div class="Valid">Не коректный пароль</div>
      </div>
      <input type="submit" id="submit" value="РЕГИСТРАЦИЯ" onSubmit="this.disabled=true;">
      <a style='color: red; text-decoration: none; text-align: center;' href="/pages/index/index.php">Назад</a>
    </div>
  </form>
</body>
</html>