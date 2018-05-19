<?php
     // include the model file
     require_once(Config::$path['model'].'home.php');

    echo $twig->render('home.twig', array(
        'name' => $_SESSION['pseudo'],
        'connected' => $_SESSION['login'],
        ));

    $_SESSION['previous_page'] = 'home';
?>