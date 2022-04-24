<?php
    $data = file_get_contents('http://ergast.com/api/f1/current/last/results.json');
    $jsonObject = json_decode($data);
    $jsonArray = $jsonObject->MRData->RaceTable->Races[0]->Results;

    foreach ($jsonArray as $jsonItem) {
        echo "<br>";

        echo "Position: ".$jsonItem->position;
        echo "<br>";

        echo "Driver: ".$jsonItem->number;
        echo "<br>";

        echo "Race: ".$jsonObject->MRData->RaceTable->round;
        echo "<br>";


        echo "Points: ".$jsonItem->points;
        echo "<br>";

        echo "<br>";
    }
?>