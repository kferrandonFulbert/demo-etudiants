<?php
require_once "ILog.php";

class LogScreen implements ILog{
    const E_WARNING="warning";
    const E_ERROR="error";
    const E_INFO="info";

    public function write($message, $criticity=E_ERROR)
    {
        echo date("YY-m-d")."$criticity : $message";
    }
}