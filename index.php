<?php

use Steampixel\Route;

require_once('config.php');
require_once('class/User.class.php');


Route::add('/', function() {
    echo "Strona Glowna";
});

Route::add('/login', function() {
    global $twig;
    $twig->display('login.html.twig');
});

Route::add('/login', function() {
    global $twig;
    if(isset($_REQUEST['login']) && isset($_REQUEST['password'])){
    
    
        $user = new User($_REQUEST['login'], $_REQUEST['password']);
        if($user->login()) {
            //echo "zalogowano pomyslnie uzytkownika: ".$user->getName();
            $v = array(
                'message' => "zalogowano pomyslnie uzytkownika: " .$user->getName(),
            );
            $twig->display('message.html.twig', $v);
        } else {
           //echo "bledny login lub haslo";
           $twig->display('login.html.twig', 
                            ['message' => "bledny login lub haslo"]);
        }
    } else {
        die("Nie otrzymano danych");
    }
    
}, 'post');

Route::add('/register', function() {
    global $twig;
    $twig->display('register.html.twig');
});

Route::add('/register', function() {
    global $twig;
    if(isset($_REQUEST['login']) && isset($_REQUEST['password'])){
        if(empty($_REQUEST['login']) || empty($_REQUEST['password'])
               || empty($_REQUEST['firstName']) || empty($_REQUEST['lastName'])) {
                  $twig->display('register.html.twig',
                                       ['message' => "Nie podano wymaganej wartosci"]);
                      exit();
               }
        $user = new User($_REQUEST['login'], $_REQUEST['password']);
        $user->setFirstName($_REQUEST['firstName']);
        $user->setLastName($_REQUEST['lastName']);
        if($user->register()){
            //echo "zarejestrowano pomyslnie";
            $twig->display('message.html.twig', 
                            ["message" => "zarejestrowano pomyslnie"]);
        } else {
            //echo "blad rejestracji uzytkownika";
            $twig->display('register.html.twig', 
                            ["message" => "blad rejestracji uzytkownika"]);
        }
    } else {
        die("Nie otrzymano danych");
    }
}, 'post');

Route::run('/loginform');
?>