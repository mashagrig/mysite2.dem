<?php



//$user_remember_token = $_COOKIE['remember_token'];//из новой куки
//$selectUser_byRememberToken = selectUser_byRememberToken($db, $user_remember_token);
//$_SESSION['userName'] = $selectUser_byRememberToken['login'];
//echo $selectUser_byRememberToken['login'];


echo $_SESSION['userName'];

$selectUser_byEmail = selectUser_byEmail($db, 'n@n.ru');
echo $selectUser_byEmail['login'];