<?php
include 'connect_db.php';
global $conn;
function fetch_weather_report($location){


    $key = '1d28eb66cb42983eb6b317c002bb078f';
    $query_params = http_build_query([
        'access_key'=>$key,
        'query'=>$location
    ]);
    $url = 'http://api.weatherstack.com/current?'.$query_params;
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Cookie: __cfduid=d388515329ba27af88f08537857f7a1ee1607403132'
        ),
    ));

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);

    curl_close($curl);
    return $response;

}
