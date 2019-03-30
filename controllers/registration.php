<?php

require_once "../db.php";
include_once "../global_functions.php";
include_once "../session.php";
my_session_start();

$paramsPost_Names = [
    'login',
    'email',
    'password',
    'password_confirm'
];

foreach ($paramsPost_Names as $param) {
        if (isset($_POST[$param]) && $_POST[$param] !== '') {
            $paramsPost_Names[$param] = $_POST[$param];
        } else  {
            redirectAndErrors('view/registration_view', 'empty');
            exit();
        }
    $paramsPost_Names[$param]  = one_paramPost_Cleaning($paramsPost_Names[$param]);
}

$login = $paramsPost_Names['login'];
$email = $paramsPost_Names['email'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$password = $paramsPost_Names['password'];
$password_confirm = $paramsPost_Names['password_confirm'];

if (isset($login) && isset($password)){
    if (isset($_POST['checkme'])){
        $checkme = $_POST['checkme'];
    }else $checkme = '';
}

//------------------------------------------------------------------

include_once "../controllers/validate_form.php";
isInvalidForm_reg($login, $email, $password, $password_confirm, 'view/registration_view');

//------------------------------------------------------------------

//$password = md5($password);
$password = password_hash($password, PASSWORD_DEFAULT);

try {
    //проверяем есть ли такой login в базе?
    $selectUser_byLogin = selectUser_byLogin($db, $login);

    if (!empty($selectUser_byLogin)) {    //нашли такой login, нельзя допустить ДУБЛЬ
        redirectAndErrors('view/registration_view', 'dubble_login');

    } else {// если login такого нет, то сохраняем данные

        $file_name = getFileNameAndUpload();
        //work
        $remember_token = '';//потом перезапишем в check-блоке

        $insertUser = insertUser($db, [
            'login' => $login,
            'email' => $email,
            'file_name' => $file_name,
            'password' => $password,
            'remember_token' => $remember_token,
            'role_id' => '',
        ]);

        }
        // Проверяем, есть ли ошибки
        if ($insertUser === true) {
            //Заносим в сессию имя пользователя, кот только что зарегался

            //---------------------работаем с запоминалкой--------------------------------
            remember_token_check($login, $checkme);
           // include_once "../controllers/remember_token_check.php";

            //----------------------------------------------------------------------------

            /////////////////////////////////////////////////
            redirectAndSuccess('', 'reg_success');
            ///////////////////////////////////////////////

        } elseif ($insertUser === false) {//$insertUser === false - только так работает проверка на уникальный пароль
            redirectAndErrors('view/registration_view', 'insert_fail');
        }

        session_write_close();

    }
catch
    (PDOException $exception) {
        redirectAndErrors('view/registration_view', 'pdo_fail');
    }





