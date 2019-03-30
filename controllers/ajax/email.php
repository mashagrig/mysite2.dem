<?php
$result = array();
$from_ajax = array(
    'email' => $_POST['email']
);
//---------------------
$email = $from_ajax['email'];

//---------------------
if (empty($email)) {
    array_push($result, array(
        'err_email_empty' => 'e-mail не указан'
    ));
}
else {
    array_push($result, array(
        'err_email_empty' => ''
    ));
}
//---------------------
if (!preg_match('/^\w+([\.-]?\w+)*@(((([a-z0-9]{2,})|([a-z0-9][-][a-z0-9]+))[\.][a-z0-9])|([a-z0-9]+[-]?))+[a-z0-9]+\.([a-z]{2}|(com|ru|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum))$/i', $email)) {

    array_push($result, array(
        'err_email' => 'e-mail не корректного формата'
    ));

} else {
    array_push($result, array(
        'err_email' => ''
    ));
}
//---------------------
echo json_encode($result);
//---------------------
