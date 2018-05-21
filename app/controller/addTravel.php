<?php
    // include the model file
    require_once(Config::$path['model'].'addTravel.php');

    // check if the user posts the createTravel form
    if (isset($_POST['createTravel'])) {
        $idcar = isset($_POST['idcar']) ? $_POST['idcar'] : false;
        $errors = TryCreateTravel(
            $_POST['startcity'], $_POST['endcity'], 
            $_POST['startdate'], $_POST['enddate'],  
            $_POST['starthour'],  $_POST['endhour'],
            $idcar,
            $_POST['price']
        );

        if (sizeof($errors) == 0) {
            header('Location: index.php?page=home');
        } else {
            $data = $_POST;
        }
    }

    echo $twig->render('addTravel.twig', array(
        'name' => $_SESSION['pseudo'],
        'connected' => $_SESSION['login'],
        'errors' => $errors,
        'data' => $_POST
        ));

    $_SESSION['previous_page'] = 'home';
?>