<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../shared/mainStyle/Block.css">
  <link rel="stylesheet" href="../../shared/mainStyle/Style.css">
  <link rel="stylesheet" href="../../shared/optionStyle/aboutSt.css">
  <link rel="stylesheet" href="../../shared/optionStyle/layout.css">
  <script src="/features/js/entry.js" defer></script>
  <!-- <script src="../../features/js/script.js" defer></script> -->
  <title>О нас</title>
</head>
<body>
  <?php require_once '../../widgets/header/header.php'?>
  <div class="content contentLay column">
    <div class="block1">
      <div class="gradient">
        <h2>homeLAN</h2>
        <p>Российская компания, созданная в 2019 году. С этого времени мы зарекомендовали себя на рынке как производитель качественной бытовой техники, у нас Вы сможете найти технику с разных уголков света, на любой вкус и по доступной цене!</p>
      </div>
    </div>
    <div class="block2">
      <div>
        <img src="/shared/image/качество.png" alt="">
        <p>продаем качество</p>
      </div>
      <div>
        <img src="/shared/image/сертификат.png" alt="">
        <p>сертифицированный товар</p>
      </div>
      <div>
        <img src="/shared/image/оформление.png" alt="">
        <p>простое оформление</p>
      </div>
      <div>
        <img src="/shared/image/вложение.png" alt="">
        <p>выгодные цены</p>
      </div>
      <div>
        <img src="/shared/image/планета.png" alt="">
        <p>товар со всего мира</p>
      </div>
      <div>
        <img src="/shared/image/новое.png" alt="">
        <p>новинки индустрии</p>
      </div>
    </div>
  <main>
    <div class="map">
      <script type="text/javascript" charset="utf-8" async src = "https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A13b5a196434cb076202544dee34bda4a72e6f71cd7490f8dace6081740b932ce&amp;width=856&amp;height=691&amp;lang=ru_RU&amp;scroll=true"

    ></script>
    </div>
    <div class="info">
      <h2>СВЯЗАТЬСЯ С НАМИ МОЖНО ПО КОНТАКТАМ:</h2>
      <div>Адрес: Проспект Ленина 109</div>
      <div>Тел.: 8-999-858-45-89</div>
      <div>email: YanGPT.ru@yandex.ru</div>
    </div>
  </main>
</div>
  <?php require_once '../../widgets/footer/footer.php'?>
</body>
</html>

<!-- async function method(){
  document.querySelector('.map').innerHTML = `<div clase='loading'>Загрузка...</div>`
  try{
   return src = await "https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A13b5a196434cb076202544dee34bda4a72e6f71cd7490f8dace6081740b932ce&amp;width=856&amp;height=691&amp;lang=ru_RU&amp;scroll=true"
}catch(err){console.error(err)}
finally{
  document.querySelector('.loading').innerHTML = src
}
}
method() -->