<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$file = 'competition_sites.csv';
$data = [];

if (($handle = fopen($file, 'r')) !== false) {
    // Ignorer la première ligne (en-têtes de colonnes)
    fgetcsv($handle, 1000, ';');

    while (($row = fgetcsv($handle, 1000, ';')) !== false) {
        $data[] = [
            'code_site' => $row[0],
            'nom_site' => mb_convert_encoding($row[1], "UTF-8"),
            'category_id' => $row[2],
            'sports' => mb_convert_encoding($row[3], "UTF-8"),
            'start_date' => $row[4],
            'end_date' => $row[5],
            'adress' => mb_convert_encoding($row[6], "UTF-8"),
            'latitude' => $row[7],
            'longitude' => $row[8],
            'point_geo' => $row[9],
        ];
    }
    fclose($handle);
}

$json_data = json_encode($data, JSON_UNESCAPED_UNICODE);
if ($json_data === false) {
    echo json_last_error_msg();
} else {
    header('Content-Type: application/json; charset=UTF-8');
    if (headers_sent()) {
        echo "Headers already sent.";
    } else {
        echo $json_data;
    }
}
