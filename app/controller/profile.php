<?php
     // include the model file
     require_once(Config::$path['model'].'profile.php');

     $dataUser = GetUser($_SESSION['pseudo']);
     $prefUser = GetUserPreferences($_SESSION['idUser']);
     $driverTrips = GetDriverTrips($_SESSION['idUser']);
     $passengerTrips = GetPassengerTrips($_SESSION['idUser']);
     $allPrefs = GetAllPreferences();

    echo $twig->render('profile.twig', array(
        'connected' => $_SESSION['login'],
        'user' => $dataUser,
        'preferences' => $prefUser,
        'drivertrips' => $driverTrips,
        'passtrips' => $passengerTrips,
        'allprefs' => $allPrefs,
        ));

    $_SESSION['previous_page'] = 'home';
?>