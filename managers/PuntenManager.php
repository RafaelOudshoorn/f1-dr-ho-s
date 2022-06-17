<?php
    class PuntenManager{
        public static function before(){
            global $con;
            date_default_timezone_set("Europe/Amsterdam");
            $nowdate = date("Y-m-d",(strtotime("now")));
            $nowtime = date("H",(strtotime("now")));
            $sun = date("Y-m-d",(strtotime("this sun")));
            $nextRace = RaceManager::AankomendeRace();

            $time = substr($nextRace->race_time,0,2);

            //var_dump();
            
            if($nextRace->race_date == $nowdate){
                if($time == $nowtime){
                    echo "punten stop zetten";
                    

                }else{
                    echo "wel de zelfde dag maar niet de tijd";
                }
            }else{
                echo "niet de tijd niet de dag";
            }
        }
        public static function after(){
            global $con;


        }
    }
?>