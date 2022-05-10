<?php

ini_set('xdebug.var_display_max_depth', 10);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

    class DriverManager{
        public static function select(){
            global $con;
            $stmt = $con->prepare("SELECT * FROM drivers");
            $stmt -> execute();
            
            return $stmt -> fetchAll(PDO::FETCH_OBJ);
        }
        public static function update(){
            global $con;
            // $stmt = $con -> prepare("TRUNCATE TABLE drivers");
            // $stmt->execute();
            $stmt=$con->prepare("select IDdriver from drivers");
            $stmt->execute();
            
            $data = file_get_contents('http://ergast.com/api/f1/2022/drivers.json');
            $jsonObject = json_decode($data);
            $jsonArray = $jsonObject->MRData->DriverTable->Drivers;

            foreach ($jsonArray as $jsonItem){
                $stmt = $con-> prepare("INSERT INTO drivers (drivername, permanentNumber, givenName, familyName, dateOfBirth, nationality)
                VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bindValue(1, $jsonItem->driverId);
                $stmt->bindValue(2, $jsonItem->permanentNumber);
                $stmt->bindValue(3, $jsonItem->givenName);
                $stmt->bindValue(4, $jsonItem->familyName);
                $stmt->bindValue(5, $jsonItem->dateOfBirth);
                $stmt->bindValue(6, $jsonItem->nationality);
                
                $stmt->execute();
            }
        }
        public static function insert(){
            global $con;
            $data = file_get_contents('http://ergast.com/api/f1/2022/drivers.json');
            $jsonObject = json_decode($data);
            $jsonArray = $jsonObject->MRData->DriverTable->Drivers;

            foreach ($jsonArray as $jsonItem){
                $stmt = $con-> prepare("INSERT INTO drivers (drivername, permanentNumber, givenName, familyName, dateOfBirth, nationality)
                VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bindValue(1, $jsonItem->driverId);
                $stmt->bindValue(2, $jsonItem->permanentNumber);
                $stmt->bindValue(3, $jsonItem->givenName);
                $stmt->bindValue(4, $jsonItem->familyName);
                $stmt->bindValue(5, $jsonItem->dateOfBirth);
                $stmt->bindValue(6, $jsonItem->nationality);
                
                $stmt->execute();
            }
        }
    }
?>