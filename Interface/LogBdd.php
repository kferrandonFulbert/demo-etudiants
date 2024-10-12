<?php
require_once 'ILog.php';
class LogBdd implements ILog{
    const E_WARNING="warning";
    const E_ERROR="error";
    const E_INFO="info";
    private $_db;
    public function __construct()
    {
        $this->_db = new \PDO('mysql:host=localhost;dbname=log;charset=utf8mb4', 'root', '', array(
            \PDO::ATTR_EMULATE_PREPARES => false,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ));   
    }

    public function write($message, $criticity=E_ERROR)
    {
        $sql = "insert into logme(criticity, message) value('$criticity', '$message')";
        $this->_db->exec($sql);
    }

}