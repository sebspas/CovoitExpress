<?php
	session_start();
	ini_set('error_reporting', E_ALL);
    ini_set('display_errors',1);
    require_once('../Config.class.php');
	require_once('../Bd.class.php');

    $BD = new BD('user_preferences');
    $UserPref = $BD->selectPreferencesByUserID($_SESSION['idUser']);
    
    echo json_encode($UserPref);
?>