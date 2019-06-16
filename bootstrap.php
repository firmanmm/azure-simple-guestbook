<?php

if (!\defined('RUNNER')) {
    die("Direct execution not allowed");
}

require "vendor/autoload.php";

use Dotenv\Dotenv;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;


try {
    $dotenv = Dotenv::create(__DIR__);
    $dotenv->load();
} catch (\Exception $e){
    \define('PRODUCTION', true);
}
$connectionSetting =  array(
    'dbname' => \getenv('DB_NAME'),
    'user' => \getenv('DB_USER'),
    'password' => \getenv('DB_PASS'),
    'host' => \getenv('DB_HOST'),
    'post' => \getenv('DB_PORT'),
    'driver' => 'sqlsrv' 
);

//$conn = DriverManager::getConnection($connectionSetting, $config);
$conn = new PDO("sqlsrv:server = ".$connectionSetting['host']."; Database = ".$connectionSetting['dbname'], $connectionSetting['user'], $connectionSetting['password']);