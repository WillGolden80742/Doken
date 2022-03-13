<?php 
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    require "EnvLoad/Environment.php"; 
    require "vendor/autoload.php";
    $iniEnv = new Environment();
    $iniEnv->load(__DIR__);
?>