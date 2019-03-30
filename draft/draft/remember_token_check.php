<?php
require_once "../db.php";
include_once "../global_functions.php";
include_once "../session.php";


if (isset($login) && isset($password)){
    if (isset($_POST['checkme'])){
        $checkme = $_POST['checkme'];
    }
}
$remember_token = '';

if ($checkme === 'check') {

    $expDate1 = time() + 20;//(60 * 15);//(3600 * 24 * 30);
    //$expDate2 = date('Y-m-d H:i:s', $expDate1);
    //$expDate2 = $expDate1;

    if (isset($_SERVER["HTTP_USER_AGENT"])) {
        $user_agent = $_SERVER["HTTP_USER_AGENT"];
    }else $user_agent = 'kGKEh1dNzNnYQEo7icM5ShKavkm';//secret key


    $login_hash = password_hash($login, PASSWORD_DEFAULT);
    $user_agent_hash = password_hash($user_agent, PASSWORD_DEFAULT);
    $time = time();

    $token_arr = array(
        $login_hash,
        $user_agent_hash,
        $time
    );
    $remember_token = join("vwteAoli3w2bv6rK||", $token_arr);
}

//обновляем remember_token в базе - на пусто - или для надежности на новый
$updateRememberToken = updateRememberToken($db, [
    'remember_token' => $remember_token,
    'login' => $login
]);

if ($updateRememberToken === false) {
    redirectAndErrors('view/autherization_view', 'token_not_insert');
}

//обновляем COOKIE
setcookie("remember_token", $remember_token, $expDate1, "/");
//setcookie("refresh_token", time(), $expDate1, "/");
my_session_regenerate_id();
$_SESSION['login'] = $login;