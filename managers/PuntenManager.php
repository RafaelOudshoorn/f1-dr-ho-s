<?php
    class PuntenManager{
        public static function before($post){
            global $con;
            date_default_timezone_set("Europe/Amsterdam");
            $nowdate = date("Y-m-d",(strtotime("now")));
            $nowtime = date("H",(strtotime("now")));
            $sun = date("Y-m-d",(strtotime("this sun")));
            $nextRace = RaceManager::AankomendeRace();
            $user = $_SESSION["user_id"];
            $selectid = BetManager::selectID($user);
            $round = $nextRace->round;

            $time = substr($nextRace->race_time,0,2);
            if($nextRace->race_date == $nowdate){
                if($time == $nowtime){
                    echo "punten stop zetten";
                    

                }else{
                    if($selectid->raceID == 1){
                        $id = 1;
                        foreach($post as $p){
                        $stmt = $con -> prepare("INSERT INTO bet (`position`, `driverID`, `raceID`, `user_idperson`) VALUES (?, ?, ?, ?);");
                        $stmt->bindValue(1,$p);
                        $stmt->bindValue(2,$id);
                        $stmt->bindValue(3,$round);
                        $stmt->bindValue(4,$user);
                        $stmt->execute();

                        $id++;
                        }
                    }
                }
            }else{
                $id = 1;
                foreach($post as $p){
                $stmt = $con -> prepare("INSERT INTO bet (`position`, `driver ID`, `race ID`, `user_idperson`) VALUES (?, ?, ?, ?);");
                $stmt->bindValue(1,$p);
                $stmt->bindValue(2,$id);
                $stmt->bindValue(3,$round);
                $stmt->bindValue(4,$user);
                $stmt->execute();

                $id++;
                }
            }
        }
        public static function after(){
            global $con;
            

        }
    }
?>