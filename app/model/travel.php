<?php
    function GetTravel($id) {
        // get user info from pseudo
        $BD = new BD('travel');
        $travel = $BD->select("idtravel",$id);
        return $travel;
    }

    function GetTravelOwner($idtravel) {
        // get user info from pseudo
        $BD = new BD('user');
        $travel = $BD->selectOwnerFromTravel($idtravel);
        return $travel;
    }
?>