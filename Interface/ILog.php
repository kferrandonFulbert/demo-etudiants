<?php 
interface ILog{
    const E_WARNING="warning";
    const E_ERROR="error";
    const E_INFO="info";
    public function write($message);
}