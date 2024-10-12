<?php
error_reporting(E_ALL);
//require_once "ILog";
require_once "LogBdd.php";
require_once "LogScreen.php";

$params = parse_ini_file("conf.ini");

if($params['log']=='bdd'){
    $log = new LogBdd();
}else{
    $log = new LogScreen();
}

main($log);

function main(ILog $log){
    $log->write("Lancement de l\'application");

}