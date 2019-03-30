<?php
require_once "db.php";

//function one_paramPost_Isset($param, $newsrc = '')
//{
//
//        if (isset($_POST[$param]) && $_POST[$param] !== '') {
//            $parameter = $_POST[$param];
//            return $parameter;
//        } elseif (!isset($_POST[$param]) || $_POST[$param] === '') {
//            redirectAndErrors($newsrc, 'empty');
//            exit();
//        }
//}


////-------------------- Валидация на пустоту полей ----------------------------
//
//function paramsPostIsset($params = [], $newsrc = '')
//{
//
//    $paramsPostIsset = array();
//
//    foreach ($params as $param) {
//        if (isset($_POST[$param]) && $_POST[$param] !== '') {
//                $paramsPostIsset[$param] = $_POST[$param];
//        } else {
//            unset($_POST[$param]);
//            unset($paramsPostIsset[$param]);
//            redirectAndErrors($newsrc, 'empty');
//        }
//    }
//    return $paramsPostIsset;
//}
//
////----------------------- POST[] Cleaning -------------------------
////если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
//
//function paramsPost_Cleaning($paramsPost)
//{
//    foreach ($paramsPost as $param) {
//        $param = trim($param);
//        $param = stripslashes($param);
//        $param = strip_tags($param);
//        $param = htmlspecialchars($param);
//    }
//    return $paramsPost;
//}

function one_paramPost_Cleaning($param)
{
    //ini_set('extension=php_mbstring');
    $param = trim($param);
    $param = stripslashes($param);
    $param = strip_tags($param);
    $param = htmlspecialchars($param);
    return $param;
}

//---------------- redirect --------------------------------

function redirectAndErrors($newsrc, $errors)
{
    header('Location: ../?' . http_build_query(
            [
                'newsrc' => $newsrc,
                'errors' => $errors
            ]
        ));
}

function redirectAndSuccess($newsrc = "", $success = "")
{
    header('Location: ../?' . http_build_query(
            [
                'newsrc' => $newsrc,
                'success' => $success
            ]
        ));
}

//-------------------- INSERT ----------------------------

//проверено - работает!
function insertUser($db, $params)
{
    try {
        $insert = $db->prepare("INSERT INTO `registration`.`users` (`login`, `email`, `file_name`, `password`, `remember_token`, `role_id`) VALUES (:login, :email,  :file_name, :password, :remember_token, :role_id);");

        $insert->bindParam(":login", $params['login']);
        $insert->bindParam(":email", $params['email']);
        $insert->bindParam(":file_name", $params['file_name']);
        $insert->bindParam(":password", $params['password']);
        $insert->bindParam(":remember_token", $params['remember_token']);
        $insert->bindParam(":role_id", $params['role_id']);

        $execute = $insert->execute();

//        $sBirthDate = intval($params['birth_year'])."-".intval($params['birth_month'])."-".intval($params['birth_day']);
//        $oStmt->bindParam(":photo",$params['photo']);
//        $oStmt->bindParam(":city_id", intval($params['city']));
//        $gender = ($params['gender'])? 'male' : 'female';

    } catch (PDOException $e) {
        echo 'insert error';
    }
    return $execute;
}


//-------------------- UPDATE remember_token----------------------------

//проверено - работает!
function updateRememberToken($db, $params)
{
    try {
        //$update = $db->prepare("UPDATE `registration`.`users` SET `remember_token`= :remember_token WHERE  `email`= :email;");
        $update = $db->prepare("UPDATE `registration`.`users` SET `remember_token`= :remember_token WHERE  `login`= :login");

        // $update->bindParam(":email", $params['email']);
        $update->bindParam(":login", $params['login']);
        $update->bindParam(":remember_token", $params['remember_token']);

        $execute = $update->execute();

    } catch (PDOException $e) {
        echo 'insert error';
    }
    return $execute;
}


//-------------------- SELECT by email ----------------------------
function selectUser_byEmail($db, $email)
{
    try {

        $select_user = $db->query("SELECT `id`, `login`, `email`, `file_name`, `password`, `remember_token`, `role_id` FROM `registration`.`users` WHERE `email`=\"$email\" LIMIT 1");
        $user = $select_user->fetch();

        //НЕ работает!!! не понятно почему
// $select = $db->query("SELECT `id` FROM `registration`.`users` WHERE `email`=:email");
//
//       $select->bindParam(":email", $email);
//       $select->execute();
//       // $fetch = $select->fetch(PDO::FETCH_ASSOC);
//        $selectUser_byEmail = $select->fetch();

    } catch (PDOException $e) {
        echo 'select error' . $e->getMessage();
    }
    return $user;
}

//-------------------- SELECT by login ----------------------------
function selectUser_byLogin($db, $login)
{
    try {

        $select_user = $db->query("SELECT `id`, `login`, `email`, `file_name`, `password`, `remember_token`, `role_id` FROM `registration`.`users` WHERE `login`=\"$login\" LIMIT 1");
        $user = $select_user->fetch();

    } catch (PDOException $e) {
        echo 'select error' . $e->getMessage();
    }
    return $user;
}

//-------------------- SELECT by token----------------------------
function selectUser_byRememberToken($db, $remember_token)
{
    try {

        $select_user = $db->query("SELECT `id`, `login`, `email`, `file_name`, `password`, `remember_token`, `role_id` FROM `registration`.`users` WHERE `remember_token`=\"$remember_token\" LIMIT 1");
        $user = $select_user->fetch();

    } catch (PDOException $e) {
        echo 'select error' . $e->getMessage();
    }
    return $user;
}


//-------------------- FILE Upload ----------------------------

function getFileNameAndUpload()
{
    // Проверяем был ли выбран файл
    if (isset($_FILES['file'])) {

        if (0 < $_FILES['file']['error']) {
            if ($_FILES['file']['name'] === '') {
                //  $file_name = 'error';
                $file_name = "Файл не выбран";

            }
        } else {
            try {
                $tmp_name = $_FILES["file"]["tmp_name"];
                $file_name = basename($_FILES["file"]["name"]);
                move_uploaded_file($tmp_name, "../uploads/img/" . $file_name);

            } catch (Exception $e) {
            }

        }
    } else {
        $file_name = "error-" . $_FILES['file']['error'];
        //$file_name = "свойство file из формы не попало в глобальную переменную _FILES";
    }

    return $file_name;
}

//------------------------------------------------
include_once "session.php";

function remember_token_check($login, $checkme)
{
    $remember_token = '';

    if ($checkme === 'check') {

        $expDate1 = time() + 240;//(60 * 15);//(3600 * 24 * 30);

        if (isset($_SERVER["HTTP_USER_AGENT"])) {
            $user_agent = $_SERVER["HTTP_USER_AGENT"] . 'ZgCbRvAtQm3pJkVM1q0ojhP8W7XDBCtiTredbtAn';
        } else $user_agent = 'ZgCbRvAtQm3pJkVM1q0ojhP8W7XDBCtiTredbtAn';//secret key

        $login_hash = password_hash($login, PASSWORD_DEFAULT);
        $user_agent_hash = password_hash($user_agent, PASSWORD_DEFAULT);
        $time = base64_encode(time());

        $token_arr = array(
            $login_hash,
            $user_agent_hash,
            $time
        );
        $remember_token = join("vwteAoli3w2bv6rK||", $token_arr);
    }


    $login = base64_encode($login);
    setcookie("user", $login, $expDate1, "/");

//обновляем COOKIE
    $remember_token = base64_encode($remember_token);
    setcookie("remember_token", $remember_token, $expDate1, "/");
   // setcookie("refresh_token", $time, $expDate1, "/");


    //просто рестартуем сессию
    if (!isset($_SESSION['new_session_id'])) {
        my_session_regenerate_id();
    }
}

//------------------------------------------------
//
//function log($sError) {
//				file_put_contents("log_db.txt", $sError, FILE_APPEND);
//		}
