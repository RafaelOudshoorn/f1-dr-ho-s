<?php
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://ergast.com/api/f1/current.json',
        CURLOPT_RETURNTRANSFER => false,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    var_dump(json_decode($response));
?>