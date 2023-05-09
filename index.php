<?php
require_once('config.php');
require_once('class/User.class.php');

$user = new User('jkowalski', 'tajneHaslo');
/*
if($user->register()){
    echo "zarejestrowano pomyslnie";
} else {
    echo "blad rejestracji uzytkownika"
}
*/

if($user->login()) {
    echo "zalogowano pomyslnie";
} else {
    echo "bledny login lub haslo";
}

?>