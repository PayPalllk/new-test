<?php
sleep(2);
require_once '../../shared/connect/bd.php';
$result = $bd -> query("SELECT `name` FROM `user`");
print_r($result);