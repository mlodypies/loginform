<?php 


require_once('config.php');


$v = array(
    'testVariable' => "Wartosc testowa",
);
$twig->display('test.html.twig', $v);

?>