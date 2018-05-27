<?php
	session_start();
	ini_set('error_reporting', E_ALL);
    ini_set('display_errors',1);
    require_once('../Config.class.php');
	require_once('../Bd.class.php');
	extract($_GET);

    $BD = new BD('user_preferences');
    $BD->deleteTwoParam('idpreference', $idpref, 'iduser', $_SESSION['idUser']);

    echo json_encode("preference deleted!");
?>