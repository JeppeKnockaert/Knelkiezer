<?php

function get( $url ){
    
    $c = curl_init($url);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_HTTPGET, 1);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, FALSE);
    
    $data = curl_exec($c);
    curl_close($c);

    if (!$data) {
        return FALSE;
    }
    return json_decode($data);
}

?>
