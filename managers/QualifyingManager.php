<?php
// ini_set('xdebug.var_display_max_depth', 10);
// ini_set('xdebug.var_display_max_children', 256);
// ini_set('xdebug.var_display_max_data', 1024);

    class QualifyingManager{
        public static function select(){
            global $con;
            $stmt = $con->prepare("SELECT * FROM qualifying");
            $stmt -> execute();
            
            return $stmt -> fetchAll(PDO::FETCH_OBJ);

        }
        public static function insert(){
            global $con;
            $stmt = $con->prepare("SELECT IDdrivers FROM drivers");
            $stmt -> execute();
            $stmt -> fetchAll(PDO::FETCH_OBJ);
            //$jsonArray[0] = $stmt;

            $data = file_get_contents('http://ergast.com/api/f1/2022/5/qualifying.json');
            $jsonObject = json_decode($data);
            $jsonArray[1] = $jsonObject->MRData->RaceTable->Races;
            
            var_dump($jsonArray[0]);
            //var_dump($jsonArray[0]);

            // foreach ($jsonArray as $jsonItem){
            //     $stmt = $con-> prepare("INSERT INTO qualifying (season, `round`, raceName, `date`, `time`, `number`, position, Q1, Q2, Q3)
            //     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            //     $stmt->bindValue(1, $jsonItem->season);
            //     $stmt->bindValue(2, $jsonItem->round);
            //     $stmt->bindValue(3, $jsonItem->raceName);
            //     $stmt->bindValue(4, $jsonItem->date);
            //     $stmt->bindValue(5, $jsonItem->time);
            //     $stmt->bindValue(6, $jsonItem->QualifyingResults->number);
            //     $stmt->bindValue(7, $jsonItem->QualifyingResults->position);
            //     $stmt->bindValue(8, $jsonItem->Q1);
            //     $stmt->bindValue(9, $jsonItem->Q2);
            //     $stmt->bindValue(10, $jsonItem->Q3);
            //     $stmt->bindValue(11, $jsonItem->id);
                
            //     $stmt->execute();
            // }
        }
    }
?>