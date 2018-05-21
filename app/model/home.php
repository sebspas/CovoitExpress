<?php
    
    function getAllTravels() {
        $BD = new BD('travel');
        return $BD->selectTravels();
    }
     
?>