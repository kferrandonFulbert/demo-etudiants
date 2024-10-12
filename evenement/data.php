<?php
error_reporting(E_ALL);
$file = 'evenements.csv';
$data = [];

if (($handle = fopen($file, 'r')) !== false) {
    // Ignorer la première ligne (en-têtes de colonnes)
    fgetcsv($handle, 1000, ';');

    while (($row = fgetcsv($handle, 1000, ';')) !== false) {
        $data[] = [
            'title' => mb_convert_encoding($row[2], "UTF-8"),
            'description' => mb_convert_encoding($row[4], "UTF-8"),
            'starting_date' => $row[5],
            'ending_date' => $row[6],
            'location' => mb_convert_encoding($row[8], "UTF-8"),
            'address' => mb_convert_encoding($row[9], "UTF-8"),
            'longitude' => $row[10],
            'latitude' => $row[11],
            'departement' => $row[13],
            'commune' => mb_convert_encoding($row[14], "UTF-8"),
            'tarif' => $row[15],
            'instagram_link' => $row[17],
            'facebook_link' => $row[18],
            'twitter_link' => $row[19],
            'disciplines' => mb_convert_encoding($row[20], "UTF-8"),
        ];
    }
    fclose($handle);
}

header('Content-Type: application/json');
echo json_encode($data);
