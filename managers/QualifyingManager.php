<?php
ini_set('xdebug.var_display_max_depth', 10);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

    class QualifyingManager{
        public static function select(){
            global $con;
            $stmt = $con->prepare("SELECT permanentNumber FROM qualifying");
            $stmt -> execute();
            
            return $stmt -> fetchAll(PDO::FETCH_OBJ);

        }
        public static function insert(){
            global $con;
            $stmt = $con->prepare("SELECT * FROM drivers");
            $stmt -> execute();
            $ID =$stmt -> fetchAll(PDO::FETCH_OBJ);



            $data = file_get_contents('http://ergast.com/api/f1/2022/5/qualifying.json');
            $jsonObject = json_decode($data);
            $jsonArray = $jsonObject->MRData->RaceTable->Races[0]->QualifyingResults;


            // foreach ($jsonArray as $jsonItem){
            //     $time = $jsonObject->MRData->RaceTable->Races[0]->time;
            //     $timeq = substr($time, 0,5);

            //     if(isset($jsonItem->Q1)){
            //         $Q1 = $jsonItem->Q1;
            //     }else{
            //         $Q1 = 0;
            //     }
            //     if(isset($jsonItem->Q2)){
            //         $Q2 = $jsonItem->Q2;
            //     }else{
            //         $Q2 = 0;
            //     }
            //     if(isset($jsonItem->Q3)){
            //         $Q3 = $jsonItem->Q3;
            //     }else{
            //         $Q3 = 0;
            //     }
            //     $k = 1;

            //     $stmt = $con-> prepare("INSERT INTO qualifying (season, `round`, raceName, `date`, `time`, `number`, permanentNumber, position, Q1, Q2, Q3, Drivers_idDrivers, race_idRace)
            //     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            //     $stmt->bindValue(1, $jsonObject->MRData->RaceTable->Races[0]->season);
            //     $stmt->bindValue(2, $jsonObject->MRData->RaceTable->Races[0]->round);
            //     $stmt->bindValue(3, $jsonObject->MRData->RaceTable->Races[0]->raceName);
            //     $stmt->bindValue(4, $jsonObject->MRData->RaceTable->Races[0]->date);
            //     $stmt->bindValue(5, $timeq);
            //     $stmt->bindValue(6, $jsonItem->number);
            //     $stmt->bindValue(7, $jsonItem->Driver->permanentNumber);
            //     $stmt->bindValue(8, $jsonItem->position);
            //     $stmt->bindValue(9, $Q1);
            //     $stmt->bindValue(10, $Q2);
            //     $stmt->bindValue(11, $Q3);
            //     $stmt->bindValue(12, $k);
            //     $stmt->bindValue(13, $k);
                
            //     $stmt->execute();
            // }

            $stmt = $con->prepare("SELECT permanentNumber FROM qualifying");
            $stmt -> execute();
            $number =$stmt -> fetchAll(PDO::FETCH_OBJ);

            //!var_dump(array_combine($number , $ID));


            // foreach($number as $id $ID as $id){
            //     if($ID->permanentNumber == $number->permanentNumber){
            //     var_dump($ID->permanentNumber, $number->number);

            //     }
            // }

            
            // foreach($ID as $id){
            //     $stmt = $con-> prepare("UPDATE `f1_db`.`qualifying` SET `Drivers_idDrivers` = ? WHERE (`idqualifying` = ?);")
            //     $stmt->bindValue(1, $id);
            // }
        }
    }
?>