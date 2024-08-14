<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DSN</title>
  <link rel="stylesheet" href="../../shared/mainStyle/Style.css">
  <link rel="stylesheet" href="../../shared/mainStyle/Block.css">
  <link rel="stylesheet" href="../../shared/optionStyle/layout.css">
  <link rel="stylesheet" href="../../shared/optionStyle/move.css"> 
  <script src="../../features/js/index.js" defer></script>
  <script src="/features/js/entry.js" defer></script>
  <script src="../../features/js/userRequest.js" defer></script>
  <script src="/features/js/search.js" defer></script>
  <!-- Против кэша -->
<!--   <meta http-equiv="Cache-Control" content="no-cache">
  <meta http-equiv="Cache-Control" content="private"> -->
</head>
<!-- тело -->
<body>
  <!-- шапка -->
    <?php require_once '../../widgets/header/header.php'?>
  <!-- контейнер -->
  <a class='top' id='up' href="#top"><img src="../../shared/image/up.png" alt=""></a>
  <div class="content contentLay layout" id="content">
   <?php require_once '../../widgets/filter/filter.php'?>
   <hr>
  <!-- Товары -->
  <div class="main" id="main">
    <!-- вывод товара из БД -->
  </div>
  </div> <!-- Конец блока с товарами -->
  <?php
    // $bd->close();
    require_once '../../widgets/footer/footer.php'
    ?>
</body>
</html>