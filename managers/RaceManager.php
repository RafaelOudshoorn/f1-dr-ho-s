<?php
    $data = file_get_contents('http://ergast.com/api/f1/current.json');
    $jsonObject = json_decode($data);
    $jsonArray = $jsonObject->MRData->RaceTable->Races;

    class RaceManager{
        public static function select(){
            global $con;
            $stmt = $con->prepare("SELECT * FROM race");
            $stmt -> execute();
            
            return $stmt -> fetchAll(PDO::FETCH_OBJ);

        }
        public static function insert(){

        }
    }

?>