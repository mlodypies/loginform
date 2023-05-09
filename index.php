<?php
require_once('class/User.class.php');

$user = new User('jkowalski', 'tajneHaslo');

echo '<pre>';
var_dump($user);
?>