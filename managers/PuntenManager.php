<?php
    class PuntenManager{
        public static function before($post){
            global $con;
            date_default_timezone_set("Europe/Amsterdam");
            $nowdate = date("Y-m-d",(strtotime("now")));
            $nowtime = date("H",(strtotime("now")));
            $nextRace = RaceManager::AankomendeRace();
            $user = $_SESSION["user_id"];
            $selectid = BetManager::selectID($user);
            $round = $nextRace->round;
            $time = substr($nextRace->race_time,0,2);

            if($nextRace->race_date == $nowdate){
                if($time == $nowtime){
                    echo "Je mag geen punten in zetten";
                }else{
                    if(!$selectid->raceID == $round){
                        $id = 1;
                        foreach($post as $p){
                        $stmt = $con -> prepare("INSERT INTO bet (`position`, `driverID`, `raceID`, `user_idperson`) VALUES (?, ?, ?, ?);");
                        $stmt->bindValue(1,$p);
                        $stmt->bindValue(2,$id);
                        $stmt->bindValue(3,$round);
                        $stmt->bindValue(4,$selectid);
                        $stmt->execute();

                        $id++;
                        }
                    }
                }
            }else{
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
        public static function after(){
            global $con;
            $select = BetManager::select();
            $selectrace = LastraceManager::select();

                // var_dump($select);
                var_dump($selectrace);

            foreach($select as $bet){
                var_dump(in_array($bet->))
            }
            
            //var_dump($select->driverID, $select->position);
            //var_dump($selectrace->position, $selectrace->Drivers_idDrivers);

            // foreach($select as $s){
            //     foreach($selectrace as $race){
            //         echo "race";
            //         if($s->position ){

            //         }
                    
            //         echo "einde race";
            //     }
                
            // }
        }
    }
?>