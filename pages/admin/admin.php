<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DSN</title>
  <link rel="stylesheet" href="../../shared/mainStyle/admin.css">
  <link rel="stylesheet" href="../../shared/mainStyle/Style.css">
  <link rel="stylesheet" href="../../shared/mainStyle/Block.css">
  <script src="../../features/js/admin.js" defer></script>
  <script src="../../features/js/adminRequest.js" defer></script>
  <script src="/features/js/search.js" defer></script>
  <!-- Против кэша -->
  <!-- <meta http-equiv="Cache-Control" content="no-cache">
  <meta http-equiv="Cache-Control" content="private"> -->
</head>
<body>
  <!-- шапка -->
  <?php
    if($_COOKIE['user'] == ''){
      $name = 'ADMIN';
    }else{
      $name = $_COOKIE['user'];
    }
    require_once '../../widgets/header/header.php';
    require_once '../../shared/connect/bd.php';?>
    <a class='top' id='up' href="#top"><img src="../../shared/image/up.png" alt=""></a>
  <!-- контейнер -->
  <div class="content contentLay">
 <?php require_once '../../widgets/filter/filter.php' ?>
  <!-- Товары -->
  <div class="main" id="main"> <!-- вывод товара из БД -->
 
     </div>

</div> <!-- Конец блока с товарами -->
<?php
  require_once '../../widgets/footer/footer.php'
  ?>
</body>
</html>