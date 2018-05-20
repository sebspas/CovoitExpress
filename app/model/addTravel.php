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

        if (!empty($startdate) && !empty($starthour)) {
            $startTime = DateTime::createFromFormat('m/d/Y G:i', $startdate . " " . $starthour);
            $startTime = $startTime->getTimestamp();
        }
       
        if (!empty($enddate) && !empty($endhour)) {
            $endTime = DateTime::createFromFormat('m/d/Y G:i', $enddate . " " . $endhour);
            $endTime = $endTime->getTimestamp();

            if ($startTime <= time() || $startTime >= $endTime) {
                $errors[] = ("The date are not valid.");
            }
        }

        if(sizeof($errors) == 0){
            $BD->addTravel($startcity, $endcity, $startdate, $enddate, $starthour, $endhour, $idcar, $price);
        }

        return $errors;
    }

?>