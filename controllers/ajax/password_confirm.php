<?php
$result = array();
$from_ajax = array(
    'password' => $_POST['password'],
    'password_confirm' => $_POST['password_confirm'],
);
//--------------------
$password = $from_ajax['password'];
$password_confirm = $from_ajax['password_confirm'];

//---------------------
if (empty($password_confirm)) {
    array_push($result, array(
        'err_password_empty' => 'Не заполнено поле повтора пароля'
    ));
}
else {
    array_push($result, array(
        'err_password_empty' => ''
    ));
}

//---------------------
if (mb_strlen($password_confirm) < 4 || mb_strlen($password_confirm) > 8) {

    array_push($result, array(
        'err_password_length' => 'Пароль должен быть не менее 4 и не более 8 символов'
    ));

} else {
    array_push($result, array(
        'err_password_length' => ''
    ));
}

//---------------------
if ($password !== $password_confirm) {

    array_push($result, array(
        'err_password_equals' => 'Пароли не совпадают'
    ));

} else {
    array_push($result, array(
        'err_password_equals' => ''
    ));
}

//---------------------

echo json_encode($result);

