<?php
   	//Подключается к базе

//    $db = new PDO('mysql:host=localhost;dbname=registration;charset=utf8', 'root', '',
//        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
//    ) or die("Невозможно установить соединение с базой данных!");




$host = 'localhost';
$db = 'registration';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host; dbname=$db;charset=$charset";
//try{
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $db = new PDO($dsn, $user, $pass, $opt) or die("Невозможно установить соединение с базой данных!");

//}catch (PDOException $e){
//   // include_once "global_functions.php";
//
//    function log($sError) {
//        file_put_contents("log_db.txt", $sError, FILE_APPEND);
//    }
//    log($e->getMessage());
//}

