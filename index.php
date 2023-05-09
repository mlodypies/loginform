<?php

use Steampixel\Route;

require_once('config.php');
require_once('class/User.class.php');


Route::add('/', function() {
    echo "Strona Glowna";
});

Route::add('/login', function() {
    echo "Strona logowania";
});

Route::add('/register', function() {
    echo "Strona rejestrowania";
});

Route::run('/loginform');
?>