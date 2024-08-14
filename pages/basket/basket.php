<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../shared/mainStyle/Block.css">
  <link rel="stylesheet" href="../../shared/mainStyle/Style.css">
  <link rel="stylesheet" href="../../shared/optionStyle/layout.css">
  <link rel="stylesheet" href="../../shared/optionStyle/basket.css">
  <script src="../../features/js/entry.js" defer></script>
  <script src="/features/js/userBasket.js" defer></script>
  <!-- <script src="/features/js/search.js" defer></script> -->
  <title>Корзина</title>
</head>
<?php require_once '../../shared/connect/bd.php'?>
<body>
  <?php require_once '../../widgets/header/header.php'?>
  <div class="href">
    <a href="" class='hover'>Корзина</a>
    <a href="/pages/basket/userApplic.php">Заказы</a>
  </div>
  <form id="cont" class="cont">

</form>
<?php require_once '../../widgets/footer/footer.php'; ?>
</body>
</html>
