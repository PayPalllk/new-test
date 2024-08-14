    <!-- Проверка пользователя -->
    <?php if(!isset($_COOKIE['user'])){ /* эквивалентно if($_COOKIE['user'] == '') */
      $name = 'ВОЙТИ';
    }else{
      $name = $_COOKIE['user'];
    }
if(isset($_COOKIE['massage'])){?>
  <script defer>
    setTimeout(() => {
      alert('<?=$_COOKIE["massage"]?>')
    }, 100);
  </script>
<?php
 setcookie('massage', '', time() - 60, "/");
 }

 if($_COOKIE['user'] == 'ADMIN'){
  $basket = "<a href='../../pages/applications/adminApplications.php'>ЗАЯВКИ</a>";
  $home = '/pages/admin/admin.php';
 }else{
  $basket = "<a class='relative' href='../../pages/basket/basket.php'>КОРЗИНА 
  <div class='kol' id='kol'>1</div>
  </a>";
  $home = '/pages/index/index.php';
 }
 ?>

 
 <!-- Шапка -->
 <a name="top"></a>
<header>  
    <a href="<?=$home?>" class='row'><div class="logo"><img src="../../shared/logo/logoNew.png" alt=""></div><dir class='logo-text'>homeLAN</dir></a>
    <!-- ДУХОВОК.NET -->
    <div class="blockSearch" id="blockSearch">
      <input id="search" class="search" type="search" placeholder="поиск">
      <div class="find" id='find'>
        <!-- Подсказки в поиске -->
      </div>
    </div>

    <menu>
    <!-- <a href="../../pages/basket/basket.php"><button class="katalog">Корзина</button></a> -->
    <!-- <a href="../../pages/basket/basket.php">КОРЗИНА</a> -->
     <?=$basket?>
    <a href="../../pages/about/About.php">О НАС</a>
    <div class="reg">
      <button class="button" id="vition"><?=$name?></button>
      <!-- Выход -->
  <div id="exit" class="exit"><form action="../../features/exit/exit.php" method="post">
    <h2 id="user"><?=$name?></h2>
    <input type="submit" value="выйти">
  </form><?php 
  if($name != 'ADMIN'){
  ?>
  <!-- <hr>
    <a href="/pages/PUT/PUT.php">Настройки аккаунта</a> -->
    <!-- <div class='topic'>
      Темная тема
      <lable class='switch'>
        <input type="checkbox">
        <span class='move'></span>
  </lable>
  <input type="checkbox">
    </div> -->
  </div><?php }else{ ?></div><?php } ?>
    </menu>
    <!-- </div> -->
  </header>

   <!-- Вход -->
   <div class="entry" id="entry">
    <form id='formEntry' name='entry' action="../../features/entry/entry.php" method="post">
      <h3>ВХОД</h3>
      <div>
      <input type="text" required name='login' class='inp' placeholder="Логин" size="35">
      </div>
      <div>
      <input type="password" required name='pass' class='inp' placeholder="Пароль" size="35">
      </div>
      <button type="button" id='sub-entry'>ВОЙТИ</button>
      <div class="row">
        <a href="../../pages/reg/reg.php">Зарегистрироваться</a>
        <input type="reset" id="left" value="Назад">
      </div>
    </form>
  </div>
