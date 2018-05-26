<?php
     // include the model file
     require_once(Config::$path['model'].'travel.php');

     $travel = GetTravel($_GET['idtravel']);

    echo $twig->render('travel.twig', array(
        'connected' => $_SESSION['login'],
        'user' => $_SESSION['idUser'],
        'travel' => $travel,
        ));

    $_SESSION['previous_page'] = 'home';
?>