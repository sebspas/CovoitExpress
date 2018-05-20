<?php
     // include the model file
     require_once(Config::$path['model'].'profile.php');

    echo $twig->render('profile.twig', array(
        'name' => $_SESSION['pseudo'],
        'connected' => $_SESSION['login'],
        ));

    $_SESSION['previous_page'] = 'home';
?>