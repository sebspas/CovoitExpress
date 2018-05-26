<?php
     // include the model file
     require_once(Config::$path['model'].'payment.php');

     $nbSeats = SeatsAvailable($_GET['idtravel']);
     $money = MoneyAvailable($_SESSION['idUser']);
     $price = PriceTravel($_GET['idtravel']);
     $dejaLa = CheckPassengers($_GET['idtravel'],$_SESSION['idUser']);

     $error = NULL;

     if($nbSeats == 0){
        $error = "There is no more seat available for this travel.";
     }else if($money < $price){
        $error = "You do not have enough money to pay for this travel.";
     }else if($dejaLa != NULL){
        $error = "You are already on this travel.";
     }else{
        $newMoney = $money-$price;
        $newSeats = $nbSeats - 1;
        UpdateMoneyUser($_SESSION['idUser'],$newMoney);
        UpdateMoneyDriver($_GET['idtravel'],$price);
        UpdateSeatsAvailable($_GET['idtravel'],$newSeats);
        AddPassenger($_GET['idtravel'],$_SESSION['idUser']);
        $error = "Seat properly booked.";
     }

    echo $twig->render('payment.twig', array(
        'connected' => $_SESSION['login'],
        'message' => $error
        ));

    $_SESSION['previous_page'] = 'home';
?>