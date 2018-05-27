<?php
// include the model file
require_once(Config::$path['model'] . 'travel.php');
require_once (Config::$path['model'] . 'payment.php');

$travel = GetTravel($_GET['idtravel']);

if (empty($travel)) {
    header("Location: index.php?page=home");
}

$error = array();
$owner = GetTravelOwner($_GET['idtravel']);

if (isset($_GET['booked'])) {
    $nbSeats = SeatsAvailable($_GET['idtravel']);
    $money = MoneyAvailable($_SESSION['idUser']);
    $price = PriceTravel($_GET['idtravel']);
    $dejaLa = CheckPassengers($_GET['idtravel'], $_SESSION['idUser']);

    if ($nbSeats < $_GET['booked']) {
        $error[] = "There is not enough seats available for this travel.";
    } else if ($money < $price) {
        $error[] = "You do not have enough money to pay for this travel.";
    } else if ($dejaLa != NULL) {
        $error[] = "You are already on this travel.";
    } else {
        $newMoney = $money - $price;
        $newSeats = $nbSeats - 1;
        UpdateMoneyUser($_SESSION['idUser'], $newMoney);
        UpdateMoneyDriver($_GET['idtravel']);
        UpdateSeatsAvailable($_GET['idtravel'], $newSeats);
        AddPassenger($_GET['idtravel'], $_SESSION['idUser']);
        $_SESSION['messages'][] = "Seat properly booked.";
    }
}

echo $twig->render('travel.twig', array(
    'connected' => $_SESSION['login'],
    'user' => $_SESSION['idUser'],
    'travel' => $travel,
    'owner' => $owner,
    'errors' => $error
));

$_SESSION['previous_page'] = 'home';
?>