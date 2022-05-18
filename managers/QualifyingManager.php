<?php
    class QualifyingManager{
        public static function select(){
            global $con;
            $stmt = $con->prepare("SELECT * FROM qualifying");
            $stmt -> execute();
            
            return $stmt -> fetchAll(PDO::FETCH_OBJ);

        }
        public static function insert(){
            global $con;
            $data = file_get_contents('http://ergast.com/api/f1/2022/5/qualifying.json');
            $jsonObject = json_decode($data);
            $jsonArray = $jsonObject->MRData->RaceTable->Races[0]->QualifyingResults;


            foreach ($jsonArray as $jsonItem){
                $stmt = $con->prepare("SELECT IDdrivers FROM drivers where permanentNumber = ?");
                $stmt->bindValue(1, $jsonItem->Driver->permanentNumber);
                $stmt -> execute();
                $result = $stmt -> fetchObject();
                $iddrivers = strval($result->IDdrivers);
                

                $stmt = $con->prepare("SELECT IDrace FROM race where `round` = ?");
                $stmt->bindValue(1, $jsonObject->MRData->RaceTable->Races[0]->round);
                $stmt -> execute();
                $result = $stmt -> fetchObject();
                $idrace = strval($result->IDrace);

                $time = $jsonObject->MRData->RaceTable->Races[0]->time;
                $timeq = substr($time, 0,5);

                if(isset($jsonItem->Q1)){
                    $Q1 = $jsonItem->Q1;
                }else{
                    $Q1 = 0;
                }
                if(isset($jsonItem->Q2)){
                    $Q2 = $jsonItem->Q2;
                }else{
                    $Q2 = 0;
                }
                if(isset($jsonItem->Q3)){
                    $Q3 = $jsonItem->Q3;
                }else{
                    $Q3 = 0;
                }

                $stmt = $con-> prepare("INSERT INTO qualifying (season, `round`, raceName, `date`, `time`, `number`, permanentNumber, position, Q1, Q2, Q3, Drivers_idDrivers, race_idRace)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bindValue(1, $jsonObject->MRData->RaceTable->Races[0]->season);
                $stmt->bindValue(2, $jsonObject->MRData->RaceTable->Races[0]->round);
                $stmt->bindValue(3, $jsonObject->MRData->RaceTable->Races[0]->raceName);
                $stmt->bindValue(4, $jsonObject->MRData->RaceTable->Races[0]->date);
                $stmt->bindValue(5, $timeq);
                $stmt->bindValue(6, $jsonItem->number);
                $stmt->bindValue(7, $jsonItem->Driver->permanentNumber);
                $stmt->bindValue(8, $jsonItem->position);
                $stmt->bindValue(9, $Q1);
                $stmt->bindValue(10, $Q2);
                $stmt->bindValue(11, $Q3);
                $stmt->bindValue(12, $iddrivers);
                $stmt->bindValue(13, $idrace);
                
                $stmt->execute();
            };
        }
    }
?>