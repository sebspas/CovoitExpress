<?php
     // include the model file
     require_once(Config::$path['model'].'profile.php');

     $dataUser = GetUser($_SESSION['pseudo']);
     $prefUser = GetUserPreferences($_SESSION['idUser']);

    echo $twig->render('profile.twig', array(
        'connected' => $_SESSION['login'],
        'user' => $dataUser,
        'preferences' => $prefUser,
        ));

    $_SESSION['previous_page'] = 'home';
?>