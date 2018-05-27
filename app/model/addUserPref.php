<?php
	session_start();
	ini_set('error_reporting', E_ALL);
    ini_set('display_errors',1);
    require_once('../Config.class.php');
	require_once('../Bd.class.php');
	extract($_GET);

    $BD = new BD('user_preferences');
    $samepref = $BD->selectTwoParam('idpreference', $idpref, 'iduser', $_SESSION['idUser'], 'iduser');

    if (empty($samepref)){
        $BD->addPref($idpref, $_SESSION['idUser']);
        echo json_encode("preference added!");
    }
    else{
        echo json_encode("preference already exists!");
    }
    
?>