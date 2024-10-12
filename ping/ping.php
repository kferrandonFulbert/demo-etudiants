<?php
$ip = $_GET['ip'];
exec("ping -c 1 $ip", $output, $result);

//preg_match('/temps=([0-9]+)\sms/', $output[2], $matches);
//var_dump($matches);die;
if ($result == 0) {
    preg_match('/temps=([0-9]+)\sms/', $output[2], $matches);
    preg_match('/TTL=([0-9]+)/', $output[2], $matches_ttl);
    
    $response = array(
        'bytes' => $matches[1],
        'time' => $matches[1],
        'ttl' => $matches_ttl[1]
    );
    echo json_encode($response);
} else {
    echo json_encode(array('error' => 'IP injoignable'));
}
?>
