<?php

require_once "db.php";
include_once "global_functions.php";

if(isset($login)){
    $selectUser_byLogin = selectUser_byLogin($db, $login);

    $login = $selectUser_byLogin['login'];
    $email = $selectUser_byLogin['email'];
    $file_name = $selectUser_byLogin['file_name'];
    echo "<h3>Личный кабинет</h3>";
    echo "Логин: " . $login;
    echo "</br>";
    echo "E-mail: " . $email;
    echo "</br>";
    echo "Файл: " . $file_name;
    echo "</br>";
}

