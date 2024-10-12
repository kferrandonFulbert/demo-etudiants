<?php 
header('Content-Type: application/json');
echo json_encode(["id"=>stripslashes($_GET['id'])]);

//var_dump($_GET['question1']);
