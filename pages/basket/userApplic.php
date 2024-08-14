<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../shared/mainStyle/Block.css">
  <link rel="stylesheet" href="../../shared/mainStyle/Style.css">
  <link rel="stylesheet" href="../../shared/optionStyle/layout.css">
  <link rel="stylesheet" href="../../shared/optionStyle/basket.css">
  <link rel="stylesheet" href="../../shared/optionStyle/back.css">
  <script src="../../features/js/entry.js" defer></script>
  <script src="/features/js/userApplic.js" defer></script>
  <title>Корзина</title>
</head>
<?php require_once '../../shared/connect/bd.php'?>
<body>
  <?php require_once '../../widgets/header/header.php'?>
  <div class="href">
    <a href="/pages/basket/basket.php">Корзина</a>
    <a href="" class='hover'>Заказы</a>
  </div>
  <div class="content contentLay column">
    <div class="row">
      <span id='waiting'>Ожидает</span>
      <span id='ready'>Готово</span>
    </div>
    <form id="container" class="container">
      <!-- Вывод из базы данных -->
    </form>
  </div>
<?php require_once '../../widgets/footer/footer.php'; ?>
</body>
</html>