<?php
    function SeatsAvailable($id) {
        // get user info from pseudo
        $BD = new BD('travel');
        $travel = $BD->select("idtravel",$id);
        $nbSeat = $travel->places;
        return $nbSeat;
    }

    function PriceTravel($id) {
        // get user info from pseudo
        $BD = new BD('travel');
        $travel = $BD->select("idtravel",$id);
        $price = $travel->price;
        return $price;
    }

    function MoneyAvailable($id) {
        // get user info from pseudo
        $BD = new BD('user');
        $user = $BD->select("iduser",$id);
        $money = $user->money;
        return $money;
    }

    function CheckPassengers($idtravel,$iduser) {
        // get user info from pseudo
        $BD = new BD('passengers');
        $user = $BD->selectTwoParamPerso("idtravel",$idtravel,"iduser",$iduser);
        return $user;
    }

    function UpdateMoneyUser($iduser,$money) {
        // get user info from pseudo
        $BD = new BD('user');
        $user = $BD->update("iduser",$iduser,"money",$money);
    }

    function AddPassenger($idtravel,$iduser) {
        // get user info from pseudo
        $BD = new BD('passengers');
        $user = $BD->addPass($idtravel,$iduser);
    }

    function UpdateSeatsAvailable($idtravel,$nbseats) {
        // get user info from pseudo
        $BD = new BD('travel');
        $BD->update("idtravel",$idtravel,"places",$nbseats);
    }

    function UpdateMoneyDriver($idtravel) {
        // get user info from pseudo
        $BD = new BD('travel');
        $travel = $BD->select("idtravel",$idtravel);

        $BD2 = new BD('user');;
        $user = $BD2->select("iduser",$travel->idowner);
        $userFinal = $BD2->update("iduser",$user->iduser,"money",$user->money + $travel->price);
    }
    
?>