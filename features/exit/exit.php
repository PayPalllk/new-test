<?php
if($_COOKIE['user'] != ''){
  setcookie('user', $user['name'], time() - 3600, "/");
}
  header('location: /pages/index/index.php');