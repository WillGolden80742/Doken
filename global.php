<?php 
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    require "EnvLoad/Environment.php"; 
    $iniEnv = new Environment();
    $iniEnv->load(__DIR__);
?>