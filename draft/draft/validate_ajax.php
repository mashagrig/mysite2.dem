<?php
$result = array();
$from_ajax = array(
    'login' => $_POST['login'],
    'email' => $_POST['email']
);

$login = $from_ajax['login'];
$email = $from_ajax['email'];

if (strlen($login) < 4 || strlen($login) > 8) {

    array_push($result, array(
        'err_login' => 'login_err_length'
    ));

} else {
    array_push($result, array(
        'err_login' => ''
    ));
}

if (!preg_match('/^\w+([\.-]?\w+)*@(((([a-z0-9]{2,})|([a-z0-9][-][a-z0-9]+))[\.][a-z0-9])|([a-z0-9]+[-]?))+[a-z0-9]+\.([a-z]{2}|(com|ru|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum))$/i', $email)) {

    array_push($result, array(
        'err_email' => 'email_err'
    ));

} else {
    array_push($result, array(
        'err_email' => ''
    ));
}

echo json_encode($result);



//if (
//    (strlen($login) < 4)
//    //|| !preg_match("/[a-zA-Z\x20]/", $paramsPost_Cleaning['login'])
//    //|| !preg_match("/[а-яА-ЯЁё\x20]/u", $paramsPost_Cleaning['login'])
//) {
//    redirectAndErrors('view/registration_view', 'login_err_length');
//}

//function isInvalidLogin($login){
//    if (strlen($login) < 4 || strlen($login) > 8) {
//        echo json_encode(['err' => 'login_err_length']);
//    }else echo json_encode(['err' => '']);
//}
//$login = $_POST['login'];
//isInvalidLogin($login);
//
//
//
//function isInvalidEmail($email){
//    if (!preg_match('/^\w+([\.-]?\w+)*@(((([a-z0-9]{2,})|([a-z0-9][-][a-z0-9]+))[\.][a-z0-9])|([a-z0-9]+[-]?))+[a-z0-9]+\.([a-z]{2}|(com|ru|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum))$/i', $email)) {
//        echo json_encode(['err' => 'email_err']);
//    }else echo json_encode(['err' => '']);
//}
//$email = $_POST['email'];
//isInvalidEmail($email);
//

//
//function isInvalidEmail($email, $newsrc = ''){
//    // if (filter_var($email, FILTER_VALIDATE_EMAIL)=== false) {
//    if (!preg_match('/^\w+([\.-]?\w+)*@(((([a-z0-9]{2,})|([a-z0-9][-][a-z0-9]+))[\.][a-z0-9])|([a-z0-9]+[-]?))+[a-z0-9]+\.([a-z]{2}|(com|ru|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum))$/i', $email)) {
//        redirectAndErrors($newsrc, 'email_err');
//        exit();
//    }
//}
//
//function isInvalidPassword($password, $password_confirm, $newsrc = ''){
//    if(strlen($password) < 4){
//        redirectAndErrors($newsrc, 'pass_err_length');
//        exit();
//    }
//    if(strlen($password) > 8){
//        redirectAndErrors($newsrc, 'pass_err_length');
//        exit();
//    }
//
//    if(strlen($password_confirm) < 4){
//        redirectAndErrors($newsrc, 'pass_err_length');
//        exit();
//    }
//    if(strlen($password_confirm) > 8){
//        redirectAndErrors($newsrc, 'pass_err_length');
//        exit();
//    }
//
//    if($password !== $password_confirm){
//        redirectAndErrors($newsrc, 'pass_not_equals');
//        exit();
//    }
//}
//
//
//function isInvalidForm_reg($login, $email, $password, $password_confirm, $newsrc = ''){
//    isInvalidLogin($login, $newsrc);
//    isInvalidEmail($email, $newsrc);
//    isInvalidPassword($password, $password_confirm, $newsrc);
//
//}
//
//function isInvalidForm_auth($login, $email, $password, $password_confirm, $newsrc = ''){
//    isInvalidLogin($login, $newsrc);
//    isInvalidPassword($password, $password_confirm, $newsrc);
//
//}
//


//// делаем ответ для клиента
//if(empty($errorContainer)){
//    // если нет ошибок сообщаем об успехе
//    echo json_encode(array('result' => 'success'));
//}else{
//    // если есть ошибки то отправляем
//    echo json_encode(array('result' => 'error', 'text_error' => $errorContainer));
//}