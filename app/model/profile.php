<?php
    function GetUser($pseudo) {
        // get user info from pseudo
        $BD = new BD('user');
        $User = $BD->select("pseudo",$pseudo);
        return $User;
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
?>