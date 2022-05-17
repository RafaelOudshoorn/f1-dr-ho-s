<?php
    class Driverstandings_overall{
        public static function select(){

        }
        public static function insert(){

            $data = file_get_contents('http://ergast.com/api/f1/current/last/results.json');
            $jsonObject = json_decode($data);
            $jsonArray = $jsonObject->MRData->RaceTable->Races[0]->QualifyingResults;


        }
    }


?>