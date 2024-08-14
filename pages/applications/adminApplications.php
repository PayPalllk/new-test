<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Заявки</title>
  <link rel="stylesheet" href="../../shared/mainStyle/Block.css">
  <link rel="stylesheet" href="../../shared/mainStyle/Style.css">
  <link rel="stylesheet" href="../../shared/optionStyle/layout.css">
  <link rel="stylesheet" href="../../shared/optionStyle/basket.css">
  <script src="../../features/js/entry.js" defer></script>
  <script src="../../features/js/adminApplic.js" defer></script>
</head>
<body>
  <?php 
    require_once '../../widgets/header/header.php';
  ?>
  <form action='../../features/basketRequest/adminReady.php' method='post' class="content column contentLay" id='form'>
  <div class="row">
      <span id='waiting'>Лист ожидания</span>
      <span id='ready'>Выдача</span>
    </div>
  <div id='table' class='container column'>
</div>
<div class="row end">
  <button id='buttonTable' type='sub'>Отправить</button>
  <button id='resetFilter' type='button'>Сбросить фильтр</button>
</div>
</form>
  <?php require_once '../../widgets/footer/footer.php';
  ?>
</body>
</html>