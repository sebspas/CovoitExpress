<?php
    // include the model file
    require_once(Config::$path['model'].'search.php');

    $travels = array();
    if (isset($_POST['search'])) {
        $travels = searchTravels(
            $_POST['startcity'],
            $_POST['endcity'], 
            $_POST['startdate'],  
            $_POST['starthour'], 
            intval($_POST['places']),
            intval($_POST['price']));
    } else {
        $travels = getAllTravels();
    }

    echo $twig->render('search.twig', array(
        'name' => $_SESSION['pseudo'],
        'connected' => $_SESSION['login'],
        'travels' => $travels,
        'data' => $_POST
        ));

    $_SESSION['previous_page'] = 'home';
?>