<?php
    function GetUser($pseudo) {
        // get user info from pseudo
        $BD = new BD('user');
        $User = $BD->select("pseudo",$pseudo);
        return $User;
    }

    function GetAllPreferences(){
        // get all preferences from BD order by name
        $BD = new BD('preference');
        $Preferences = $BD->selectAll("name");
        return $Preferences;
    }
     
    function GetUserPreferences($iduser) {
        // get preferences from user id
        $BD = new BD('user_preferences');
        $UserPref = $BD->selectPreferencesByUserID($iduser);

        if (empty($UserPref)){
            return NULL;
        }
        return $UserPref;
    }

    function GetDriverTrips($iduser){
        // get trips where user is the driver
        $BD = new BD('travel');
        $trips = $BD->selectMult("idowner",$iduser);

        if (empty($trips)){
            return NULL;
        }
        return $trips;
    }

    function GetPassengerTrips($iduser){
        // get trips where user is a passenger
        $BD = new BD('passengers');
        $trips = $BD->selectTravelsAsPassenger($iduser);

        if (empty($trips)){
            return NULL;
        }
        return $trips;
    }
?>