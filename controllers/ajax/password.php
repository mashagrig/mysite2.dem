<?php
$result = array();
$from_ajax = array(
    'password' => $_POST['password'],
);
//---------------------
$password = $from_ajax['password'];
//---------------------
if (empty($password)) {
    array_push($result, array(
        'err_password_empty' => 'Пароль не указан'
    ));
}
else {
    array_push($result, array(
        'err_password_empty' => ''
    ));
}
//---------------------
if (mb_strlen($password) < 4 || mb_strlen($password) > 8) {

    array_push($result, array(
        'err_password_length' => 'Пароль должен быть не менее 4 и не более 8 символов'
    ));

} else {
    array_push($result, array(
        'err_password_length' => ''
    ));
}


//---------------------
echo json_encode($result);
//---------------------
