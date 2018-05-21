<?php
    // include the model file
    require_once(Config::$path['model'].'home.php');

    $travels = getAllTravels();

    echo $twig->render('home.twig', array(
        'name' => $_SESSION['pseudo'],
        'connected' => $_SESSION['login'],
        'travels' => $travels
        ));

    $_SESSION['previous_page'] = 'home';
?>