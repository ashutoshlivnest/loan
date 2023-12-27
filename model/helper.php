<?php

function trimAndSecure($value) {
    $value = trim($value, ' ');
    $value = trim($value, ',');
    $value = addslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

function sanitizeJSON($data) {
    foreach ($data as &$value) {
        if(gettype($value) === "string") {
            $value = trimAndSecure($value);
        }
    }
    return $data;
}

function queryMaker($table, $data, $queryType) {
    $columns = array();
    $values = array();
    
    foreach($data as $key => $value) {
        if($value) {
            $columns[] = $key;
            $values[] = $value;
        }
    }
    
    if($queryType === "Insert") {
        if(!empty($columns) && !empty($values)) {
            $sql = "INSERT INTO $table (" . implode(', ', $columns) . ") VALUES ('" . implode("', '", $values) . "')";
        }
    }
    
    return $sql;
}
    
/* function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
} */

/* function iPDetails($ip) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://ipinfo.io/$ip/geo");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $json = curl_exec($ch);
    $json = json_decode($json, true);
    
    $GLOBALS['clientCountry'] = isset($json['country']) && !empty($json['country']) ? $json['country'] : '';
    $GLOBALS['clientRegion'] = isset($json['region']) && !empty($json['region']) ? $json['region'] : '';
    $GLOBALS['clientCity'] = isset($json['city']) && !empty($json['city']) ? $json['city'] : '';
}
    
$encryptionKey = 'LN_PVT_LTD';
$iv = hex2bin('28556756410751579648994175831138');

function manualEncryption($plainText) {
    return openssl_encrypt($plainText, 'aes-256-cbc', $GLOBALS['encryptionKey'], 0, $GLOBALS['iv']);
}

function manualDecryption($encryptedText) {
    return openssl_decrypt($encryptedText, 'aes-256-cbc', $GLOBALS['encryptionKey'], 0, $GLOBALS['iv']);
} */

?>