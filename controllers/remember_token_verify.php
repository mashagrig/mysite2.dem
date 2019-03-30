<?php

//если в прошлый раз он ставил галку
if (
    isset($_COOKIE['remember_token']) && $_COOKIE['remember_token'] !== ''
    //   isset($_COOKIE['refresh_token']) && $_COOKIE['refresh_token'] !== '' &&
    //  isset($_COOKIE['user']) && $_COOKIE['user'] !== ''
) {
    if (isset($_COOKIE['user']) && $_COOKIE['user'] !== '') {

        $user_remember_token = base64_decode($_COOKIE['remember_token']);//из новой куки
        $user_login = base64_decode($_COOKIE['user']);//из новой куки

        if (isset($_SERVER["HTTP_USER_AGENT"])) {
            $user_agent = $_SERVER["HTTP_USER_AGENT"] . 'ZgCbRvAtQm3pJkVM1q0ojhP8W7XDBCtiTredbtAn';
        } else $user_agent = '';

        $token_arr = explode("vwteAoli3w2bv6rK||", $user_remember_token);

        if (
            password_verify($user_login, $token_arr[0]) &&
            password_verify($user_agent, $token_arr[1])//главная валидация по секрету и агенту
        ) {
            if (//токен на грани протухания
                base64_decode($token_arr[2]) < time() - 20
            ) {//перевыдаем токен
                remember_token_check($user_login, 'check');

            }//если свежий
            else {//просто стартуем сессию


                if (!isset($_SESSION['new_session_id'])) {
                    my_session_regenerate_id();
                }

            }
        } //если поддельные данные
        else {
            setcookie("remember_token", 'fake_token');
        }
    }
} // НЕ нашли такой же токен в базе как в браузере у юзера - поддельный
elseif (isset($_COOKIE['remember_token']) && $_COOKIE['remember_token'] === '') {
    redirectAndErrors('', 'token_not_found');
}

//если в прошлый раз он не ставил галку, но хочет авторизоваться
//или окончательно протух токен
//elseif (!isset($_COOKIE['remember_token'])) {

//пусть авторизуется заново!
