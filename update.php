<?php
    $nextRace = RaceManager::AankomendeRace();
    if($nextRace){
        
    }
    DriverManager::update();
    QualifyingManager::update();
    LastraceManager::update();
?>