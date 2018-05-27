<?php
     // include the model file
     require_once(Config::$path['model'].'travel.php');

     $travel = GetTravel($_GET['idtravel']);

     if (empty($travel)) {
         header("Location: index.php?page=home");
     }

     $owner = GetTravelOwner($_GET['idtravel']);

    echo $twig->render('travel.twig', array(
        'connected' => $_SESSION['login'],
        'user' => $_SESSION['idUser'],
        'travel' => $travel,
        'owner' => $owner
        ));

    $_SESSION['previous_page'] = 'home';
?>