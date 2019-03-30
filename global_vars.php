<?php

    $global_vars = array();
//$global_vars["title"]["main"] = "CITIS";
//$global_vars["title"]["registration"] = "Регистрация";
//$global_vars["title"]["login"] = "Авторизация";

//------------------------ registration ------------------------
    $global_vars["errors"]["empty"] = "Вы ввели не всю информацию, вернитесь назад и заполните все поля!";
    $global_vars["errors"]["dubble_email"] = "Извините, введённый вами e-mail уже зарегистрирован. Введите другой e-mail или авторизуйтесь!";
    $global_vars["errors"]["dubble_login"] = "Извините, введённый вами login уже зарегистрирован. Введите другой login или авторизуйтесь!";

    if (isset($_COOKIE['user'])) {
        $login_mes = base64_decode($_COOKIE['user']) . ',';
    } else {
        $login_mes = '';
    }
//    if (isset($_SESSION['login'])) {
//        $login_mes = $_SESSION['login'] . ',';
//    } else {
//        $login_mes = '';
//    }

    $global_vars["errors"]["insert_fail"] = "Ошибка сохранения (insert) данных в базу! Вы не зарегистрированы!";
    $global_vars["errors"]["pdo_fail"] = "Ошибка выплнения запроса!";
//------------------------ auth ------------------------
    $global_vars["errors"]["pass_not_reg"] = "Извините, введённый вами пароль не зарегистрирован!";
    $global_vars["errors"]["pass_not_equals"] = "Пароли не совпадают!";
    $global_vars["errors"]["pass_err_length"] = "Пароль должен быть не менее 4 и не более 8 символов!";
    $global_vars["errors"]["email_not_reg"] = "Извините, введённый вами e-mail не зарегистрирован!";
    $global_vars["errors"]["email_err"] = "e-mail введен не корректно!";
    $global_vars["errors"]["login_not_reg"] = "Извините, введённый вами login не зарегистрирован!";
    $global_vars["errors"]["login_err_length"] = "Логин должен быть не менее 4 и не более 8 символов!";


//------------------------ logout ------------------------

   // $global_vars["errors"]["logout_fail"] = "Ошибка! Вы не вышли из системы!";
    $global_vars["success"]["logout_success"] = "Вы вышли из системы!";


////------------------------ session_logout ------------------------
    $global_vars["errors"]["session_logout"] = "Ваша сессия закончилась!"."</br>"."Если Вы НЕ поставили галочку Запомнить меня - теперь Вам надо заново авторизоваться!"."</br>"."Если поставили - Вы все еще авторизованы!";

////------------------------ token  ------------------------
    $global_vars["errors"]["token_not_insert"] = "Ошибка добавления токена в базу!";
    $global_vars["errors"]["token_not_found"] = "Вы не стаавили галку запомнить меня!";
    $global_vars["errors"]["testik"] = "Вы не стаавили галку запомнить меня!";


//---------------------- all success --------------------------
    $global_vars["success"]["reg_success"] = "$login_mes Вы зарегистрированы!";
    $global_vars["success"]["auth_success"] = "$login_mes Вы авторизованы! Добро пожаловать в систему!!";


//	$main_trait["messages"]["page_accept"] = "Для просмотра этой страницы авторизируйтесь!";
//------------------------ file ------------------------
    $global_vars["errors"]["file"] = "Проблемы при загрузке файла!";



