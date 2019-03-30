<?php

$result = array();
$from_ajax = array(
    'login' => $_POST['login'],
);
//-------------------------
$login = $from_ajax['login'];

//---------------------
if (empty($login)) {
    array_push($result, array(
        'err_login_empty' => 'Логин не указан'
    ));
}
else {
    array_push($result, array(
        'err_login_empty' => ''
    ));
}

//-------------------------
if (mb_strlen($login) < 4 || mb_strlen($login) > 8) {

    array_push($result, array(
        'err_login_length' => 'Логин должен быть не менее 4 и не более 8 символов'
    ));

} else {
    array_push($result, array(
        'err_login_length' => ''
    ));
}

//---------------------

require_once "../../db.php";
include_once "../../global_functions.php";
//проверяем есть ли такой login в базе?
$selectUser_byLogin = selectUser_byLogin($db, $login);

if (!empty($selectUser_byLogin)) {    //нашли такой login, нельзя допустить ДУБЛЬ
    array_push($result, array(
        'err_login_dubble' => 'Введённый login уже зарегистрирован',
        'err_login_not_reg' => ''
    ));
}
else {
    array_push($result, array(
        'err_login_dubble' => '',
        'err_login_not_reg' => 'Введённый login НЕ зарегистрирован'
    ));
}

//-------------------------
echo json_encode($result);
//-------------------------
