<?php
    require_once "include/autoloader.php";
    $nextRace = RaceManager::AankomendeRace();
    $qualirace = RaceManager::Qualirace();
    $race = RaceManager::select();
    $quali = QualifyingManager::select();
    $over = Driverstandings_overall::select();
    $last = LastraceManager::select();

    $nextRacearray = $nextRace->round - 1;
    $qualiRacearray = $qualirace->round - 1;
    
    if(strval($nextRacearray) !== $race[1]->round){
        
        if($quali[1]->round !== strval($qualiRacearray)){
            echo "Qualifying update";
            QualifyingManager::update($qualiRacearray);
        }else{
            echo "Qualifying heeft al goede data";
        }
        if($over[1]->round !== strval($nextRacearray)){
            echo "Driverstandings update";
            Driverstandings_overall::update();
        }else{
            echo "Driverstandings heeft al goede data";
        };
        if($last[1]->round !== strval($nextRacearray)){
            echo "Lastrace update";
            LastraceManager::update();
        }else{
            echo "Lastrace heeft al goede data";
        };
    }else{
        echo "Race database heeft geen round";
    };
?>