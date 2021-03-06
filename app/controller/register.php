<?php

    // include the model file
    require_once(Config::$path['model'].'register.php');

    // user data of the form, empty by default
    $data = array();
    $errors = array();

    // check if the user posts the register form
    if (isset($_POST['register'])) {
        // Try to register
        $errors = TryRegister($_POST['email'], $_POST['username'], $_POST['password'], $_POST['passwordConfirm'],  $_POST['phone'],  $_POST['city']);
        if (sizeof($errors) == 0) {
            $_SESSION['messages'][] = "You have been register!";
            // If there are no errors, this means everything is ok and user should be able to sign in
            header('Location: index.php?page=login');
        } else {
            $data = $_POST;
        }
    }

    echo $twig->render('register.twig', array('connected' => 'False', 'errors' => $errors, 'data' => $_POST));
?>