<?php

require_once "../db.php";
include_once "../global_functions.php";
include_once "../session.php";
my_session_start();



//    //$remember_token = '' и $checkme = $_POST['checkme'] определяем не тут, а в check блоке


$paramsPost_Names = [
    'login',
    'password',
    'password_confirm'
];

foreach ($paramsPost_Names as $param) {
    if (isset($_POST[$param]) && $_POST[$param] !== '') {
        $paramsPost_Names[$param] = $_POST[$param];
    } else  {
        redirectAndErrors('view/autherization_view', 'empty');
        exit();
    }
    $paramsPost_Names[$param]  = one_paramPost_Cleaning($paramsPost_Names[$param]);
}
$login = $paramsPost_Names['login'];
$password = $paramsPost_Names['password'];
$password_confirm = $paramsPost_Names['password_confirm'];

include_once "../controllers/validate_form.php";
isInvalidForm_auth($login, $email, $password, $password_confirm, 'view/autherization_view');

if (isset($login) && isset($password)){
    if (isset($_POST['checkme'])){
        $checkme = $_POST['checkme'];
    }
    else $checkme = '';
}

    try {
        $selectUser_byLogin = selectUser_byLogin($db, $login);
        if (!empty($selectUser_byLogin)) { //нашли такой login, то $password(не хэшированный прям из формы!!!) сравниваем с паролем из базы(хэш)
            if (password_verify($password, $selectUser_byLogin['password'])) {
                //хэши совпадают

                //---------------------работаем с запоминалкой--------------------

                remember_token_check($login, $checkme);
                // require_once "../controllers/remember_token_check.php";

                //-----------------------------------------------------------------
//                my_session_regenerate_id();
//                $_SESSION['login'] = $login;

                ////////////////////////////////////////////////////////
                redirectAndSuccess( '', 'auth_success');
                //redirectAndSuccess('auth_success');
                ////////////////////////////////////////////////////////

            } else {
                redirectAndErrors('view/autherization_view', 'pass_not_reg');
            }
        } else {
            // если такого e-mail нет
            redirectAndErrors('view/autherization_view', 'login_not_reg');
        }

        session_write_close();

    } catch (PDOException $exception) {
        redirectAndErrors('view/autherization_view', 'pdo_fail');
    }






