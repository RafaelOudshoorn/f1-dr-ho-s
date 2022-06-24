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
            $user = userManager::select();
            foreach($user as $U){
                $betstandings = BetManager::selectstandingsID($U->idperson);
                
                $points = 0;
                $totalpoints = 0;
                $id = 0;
                foreach($betstandings as $bet){
                    if($bet->user_idperson == $U->idperson){
                        if($bet->position == $bet->drivers_ending_position){
                            $points = 3;
                        }else{
                            $different = abs($bet->drivers_ending_position - $bet->position);
                            $points = 3 - $different;
                            if(strpos($points, "-") !== false) {
                                $points = 0;
                            }
                        }
                        $totalpoints = $points + $totalpoints;
                        $id = $betstandings[0]->user_idperson;

                    }else{
                        $totalpoints = 0;
                        $id = $U->idperson;
                    }
                }
                $userid = userManager::selectOnId($id);
                var_dump($id);
                var_dump($id = $U->idperson);

                if(isset($userid->total_points)){
                    $databasepoints = 0;
                }else{
                    $databasepoints = $userid->total_points + $totalpoints;
                    var_dump($databasepoints);
                }
                //var_dump($userid->total_points);

                

                $stmt = $con->prepare("UPDATE user SET `total_points` = ? WHERE (`idperson` = ?);");
                $stmt->bindValue(1, $databasepoints);
                $stmt->bindValue(2, $id);
                //$stmt->execute();
                
            }
        }
    }
?>