<?php
    class Driverstandings_overall{
        public static function select(){
            global $con;

        }
        public static function insert(){
            global $con;
            $data = file_get_contents('http://ergast.com/api/f1/2022/5/driverStandings.json');
            $jsonObject = json_decode($data);
            $jsonArray = $jsonObject->MRData->RaceTable->Races[0]->QualifyingResults;

            
        }
    }


?>