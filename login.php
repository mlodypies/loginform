
<?php
require_once('config.php');

if(isset($_REQUEST['login']) && isset($_REQUEST['password'])){
    
    
    $user = new User($_REQUEST['login'], $_REQUEST['password']);
    if($user->login()) {
        //echo "zalogowano pomyslnie uzytkownika: ".$user->getName();
        $v = array(
            'message' => "zalogowano pomyslnie uzytkownika: " .$user->getName(),
        );
        $twig->display("message.html.twig", $v);
    } else {
       //echo "bledny login lub haslo";
       $twig->display('message.html.twig', 
                        ["message" => "bledny login lub haslo"]);
    }
} else {
    $twig->display('login.html.twig');
}
?>
