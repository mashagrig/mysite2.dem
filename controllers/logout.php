<?php

//logout.php после вызова действует в корне, поэтому ему нужен доступ к функциям как из корня

include_once "global_functions.php";
include_once "session.php";
//my_session_start();

//setcookie("user", '');
if (
(isset($_COOKIE['remember_token']) && $_COOKIE['remember_token'] !== '') ||
  //  isset($_COOKIE['refresh_token']) && $_COOKIE['refresh_token'] !== '' &&
(isset($_COOKIE['user']) && $_COOKIE['user'] !== '')
) {
    //установка time() - 3600 не работает, т.к. устанавливается неое значение куки
        setcookie("remember_token", '');
       // setcookie("refresh_token", '');
        setcookie("user", '');

        unset( $_COOKIE['remember_token']);
     //   unset( $_COOKIE['refresh_token']);
        unset( $_COOKIE['user']);
    }

   session_destroy();
    redirectAndSuccess('', 'logout_success');
    session_start();



session_write_close();



