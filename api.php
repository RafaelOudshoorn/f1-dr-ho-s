<?php
    $data = file_get_contents('http://ergast.com/api/f1/current.json');
    $jsonObject = json_decode($data);
    $jsonArray = $jsonObject->MRData->RaceTable->Races;

    $driver = file_get_contents('http://ergast.com/api/f1/2022/drivers.json');
    $jsonObjectdriver = json_decode($driver);
    $jsonArraydriver = $jsonObjectdriver->MRData->DriverTable->Drivers;

    foreach ($jsonArray as $jsonItem) {
        echo "<br>";
        echo "season ".$jsonItem->season;

        echo "<br>";
        echo "round ".$jsonItem->round;

        echo "<br>";
        echo "raceName ".$jsonItem->raceName;

        echo "<br>";
        echo "circuitid ".$jsonItem->Circuit->circuitId;

        echo "<br>";
        echo "circuitName ".$jsonItem->Circuit->circuitName;

        echo "<br>";
        echo "coutry ".$jsonItem->Circuit->Location->country;

        echo "<br>";
        echo "date ".$jsonItem->date;

        echo "<br>";
        echo "time ".$jsonItem->time;

        echo "<br>";
        echo "firstpractice date ".$jsonItem->FirstPractice->date;

        echo "<br>";
        echo "firstpractice time ".$jsonItem->FirstPractice->time;

        echo "<br>";
        echo "secondpractice date ".$jsonItem->SecondPractice->date;

        echo "<br>";
        echo "secondpractice time ".$jsonItem->SecondPractice->time;

        if (isset($jsonItem->ThirdPractice)){
            echo "<br>";
            echo "thirdpractice date ".$jsonItem->ThirdPractice->date;

            echo "<br>";
            echo "thirdpractice time ".$jsonItem->ThirdPractice->time;
        }else{
            echo "<br>";
            echo "sprint date ".$jsonItem->Sprint->date;

            echo "<br>";
            echo "sprint time ".$jsonItem->Sprint->time;
        }
        
        echo "<br>";
        echo "qualifying date ".$jsonItem->Qualifying->date;

        echo "<br>";
        echo "qualifying time ".$jsonItem->Qualifying->time;

        echo "<br>";
        echo "<br>";
    }
    foreach($jsonArraydriver as $jsonDriver){
        echo "<br>";
        echo "driver ID ".$jsonDriver->driverId;

        echo "<br>";
        echo "Number ".$jsonDriver->permanentNumber;

        echo "<br>";
        echo "Firstname ".$jsonDriver->givenName;

        echo "<br>";
        echo "Lastname ".$jsonDriver->familyName;

        echo "<br>";
        echo "Birthday ".$jsonDriver->dateOfBirth;

        echo "<br>";
        echo "Land ".$jsonDriver->nationality;
        echo "<br>";
        echo "<br>";

    }
?>