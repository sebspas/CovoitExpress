<?php
    function searchTravels($startcity, $endcity, $startdate, $starthour, $placesLeft, $minPrice) {
        $BD = new BD('travel');
        return $BD->searchTravels($startcity, $endcity, $startdate, $starthour, $placesLeft, $minPrice);
    }

    function getAllTravels() {
        $BD = new BD('travel');
        return $BD->selectTravels();
    }
?>