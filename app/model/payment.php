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
        $user = $BD->update("money",$money,"iduser",$iduser);
    }

    function AddPassenger($idtravel,$iduser,$nbseats) {
        // get user info from pseudo
        $BD = new BD('passengers');
        $BD->addPass($idtravel,$iduser,$nbseats);
    }

    function UpdateSeatsAvailable($idtravel,$nbseats) {
        // get user info from pseudo
        $BD = new BD('travel');
        $BD->update("places",$nbseats,"idtravel",$idtravel);
    }

    function UpdateMoneyDriver($idtravel) {
        // get user info from pseudo
        $BD = new BD('travel');
        $travel = $BD->select("idtravel",$idtravel);

        $BD->setUsedTable('user');
        $user = $BD->select("iduser",$travel->idowner);
        $BD->update("money",$user->money + $travel->price,"iduser",$user->iduser);
    }
    
?>