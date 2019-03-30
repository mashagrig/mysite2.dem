

<?php

//
//$result = array();
//$from_ajax = array(
//    'login' => $_POST['login'],
//);
//
//$login = $from_ajax['login'];
//
//if (empty($login)) {
//
//    array_push($result, array(
//        'err_login_empty' => 'Логин не указан'
//    ));
//} else {
//    array_push($result, array(
//        'err_login_empty' => ''
//    ));
//}
//
//
//
//echo json_encode($result);
//




$result = array();
$from_ajax = array(
    'login' => $_POST['login'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'password_confirm' => $_POST['password_confirm']
);
//--------------------
$login = $from_ajax['login'];
$email = $from_ajax['email'];
$password = $from_ajax['password'];
$password_confirm = $from_ajax['password_confirm'];

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
//---------------------
if (empty($email)) {
    array_push($result, array(
        'err_email_empty' => 'E-mail не указан'
    ));

} else {
    array_push($result, array(
        'err_email_empty' => ''
    ));
}
//---------------------
if ($password === '') {
    array_push($result, array(
        'err_password_empty' => 'Пароль не указан'
    ));

} else {
    array_push($result, array(
        'err_password_empty' => ''
    ));
}
//---------------------
if ($password_confirm === '') {
    array_push($result, array(
        'err_password_confirm_empty' => 'Повтор пароля не указан'
    ));

} else {
    array_push($result, array(
        'err_password_confirm_empty' => ''
    ));
}
//---------------------

echo json_encode($result);

