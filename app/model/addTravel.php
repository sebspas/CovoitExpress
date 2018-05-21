<?php
    function TryCreateTravel($startcity, $endcity, $startdate, $enddate, $starthour, $endhour, $idcar, $price) {
        $BD = new BD('travel');
        $errors = array();

        if (empty($startcity)) {
            $errors[] = ("The start city must not be empty.");
        }
        if (empty($endcity)) {
            $errors[] = ("The end city must not be empty.");
        }
        if (empty($startdate)) {
            $errors[] = ("The start date must not be empty.");
        }
        if (empty($enddate)) {
            $errors[] = ("The end date must not be empty.");
        }
        if (empty($starthour)) {
            $errors[] = ("The start date must not be empty.");
        }
        if (empty($endhour)) {
            $errors[] = ("The end date must not be empty.");
        }
        if (empty($price) || !$price || $price == 0 ) {
            $errors[] = ("The price must not be null or empty.");
        }
        if (!$idcar) {
            $errors[] = ("you must select a car.");
        }

        if (!empty($startdate) && !empty($starthour)) {
            $startTime = DateTime::createFromFormat('m/d/Y G:i', $startdate . " " . $starthour, new DateTimeZone('America/New_York'));
            $startTime = $startTime->getTimestamp();
        }
       
        if (!empty($enddate) && !empty($endhour)) {
            $endTime = DateTime::createFromFormat('m/d/Y G:i', $enddate . " " . $endhour, new DateTimeZone('America/New_York'));
            $endTime = $endTime->getTimestamp();
            $date = new DateTime("now", new DateTimeZone('America/New_York'));
            if ($startTime <= $date->getTimestamp() || $startTime >= $endTime) {
                $errors[] = ("The date are not valid.");
            }
        }

        if(sizeof($errors) == 0){
            $BD->addTravel($startcity, $endcity, $startTime, $endTime, $idcar, $price);
        }

        return $errors;
    }

    function getVehicles() {
        $BD = new BD('vehicle');
        return $BD->selectAll('name');
    }

?>