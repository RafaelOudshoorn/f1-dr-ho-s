<?php
    class PuntenManager{
        public static function before(){
            global $con;
            $now = date("Y-m-d/H:i",(strtotime("now")));
            $sun = date("Y-m-d",(strtotime("this sun")));
            $nextRace = RaceManager::AankomendeRace();

            //var_dump($nextRace->race_date);
            //var_dump($now);

        }
        public static function after(){
            
        }
    }
?>