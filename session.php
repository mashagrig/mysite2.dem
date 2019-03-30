
<?php

function my_session_start() {
    session_start();
    if (isset($_SESSION['destroyed'])) {
        if (!empty($_SESSION['destroyed']) && $_SESSION['destroyed'] < time()-15) {
            // Обычно это не должно происходить. Это может быть атакой или результатом нестабильной сети.
            // Удаляем все статусы аутентификации пользователей этой сессии.
            if (isset($_SESSION['new_session_id'])) {
                unset($_SESSION['new_session_id']);
            }
            if (isset($_COOKIE['user'])) {
                if (!isset($_COOKIE['remember_token']) || $_COOKIE['remember_token'] === '') {
                    setcookie("user", '');
                }
            }
        session_destroy();
        redirectAndErrors('','session_logout');
        session_start();
        }
        if (session_status() === PHP_SESSION_ACTIVE) {
            if (isset($_SESSION['new_session_id'])) {
                // Срок действия ещё не полностью истёк. Cookie могли быть потеряны из-за нестабильной сети.
                // Заново пытаемся установить правильный cookie идентификатора сессиии.
                // ЗАМЕЧАНИЕ: Не пытайтесь заново установить идентификатор сессии если, вы предпочитаете
                // удалить флаг аутентификации.
                session_commit();
                session_id($_SESSION['new_session_id']);
                // Новый идентификатор сессии должен существовать.
                session_start();
                return;
            }
        }


    }
}

// Новый идентификатор сессии необходим для установки правильного идентификатора сессии,
// когда идентификатор сессии не был установлен из-за нестабильной сети.
function my_session_regenerate_id() {
        // Вызов session_create_id() пока сессия активна, чтобы
    // удостовериться в отсутствии коллизий.
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (session_status() === PHP_SESSION_ACTIVE) {
        // Записываем и закрываем текущую сессию.
        session_commit();

        $newid = session_create_id('unique-prefix-');
        $new_session_id = session_create_id($newid);
        session_id($new_session_id);    // Стартуем сессию с новым идентификатором.

// Убеждаемся в возможности установки пользовательского идентификатора сессии
// ЗАМЕЧАНИЕ: Вы должны включать опцию use_strict_mode для обычных операций.
        //   ini_set('session.use_strict_mode', 0);


        $_SESSION['new_session_id'] = $new_session_id;
        // Устанавливаем временную метку удаления.
        $_SESSION['destroyed'] = time();



        ini_set('session.use_strict_mode', 1);
        session_start();

        // Новой сессии не нужно это.
        // unset($_SESSION['destroyed']);
        // unset($_SESSION['new_session_id']);
    }

}
ini_set('session.use_strict_mode', 1);

//// Функция My session start с управлением на основе временных меток
//function my_session_start() {
//    session_start();
//    // Не разрешать использование слишком старых идентификаторов сессии
//    //устанавливаем сессию на .. сек!!
//    if (!empty($_SESSION['deleted_time']) && $_SESSION['deleted_time'] < time() - 15) {
//
//        session_destroy();
//        redirectAndErrors('','session_logout');
//        session_start();
//    }
//}
//
//// Функция My session regenerate id
//function my_session_regenerate_id() {
//    // Вызов session_create_id() пока сессия активна, чтобы
//    // удостовериться в отсутствии коллизий.
//    if (session_status() != PHP_SESSION_ACTIVE) {
//        session_start();
//    }
//    // ВНИМАНИЕ: Никогда не используйте конфиденциальные строки в качестве префикса!
//    $newid = session_create_id('unique-prefix-');
//    // Установка временной метки удаления. Данные активной сессии не должны удаляться сразу же.
//    $_SESSION['deleted_time'] = time();
////    // Завершение сессии
//    session_commit();
////    // Убеждаемся в возможности установки пользовательского идентификатора сессии
////    // ЗАМЕЧАНИЕ: Вы должны включать опцию use_strict_mode для обычных операций.
//    ini_set('session.use_strict_mode', 0);
////    // Установка нового пользовательского идентификатора сессии
//    session_id($newid);
////    // Старт сессии с пользовательским идентификатором
//    //session_start();
//}
//
//// Убеждаемся, что опция use_strict_mode включена.
//// Опция use_strict_mode обязательна по соображениям безопасности.
//ini_set('session.use_strict_mode', 1);
////my_session_start();
//
//// Идентификатор сессии должен генерироваться заново при:
////  - Входе пользователя в систему
////  - Выходе пользователя из системы
////  - По прошествии определённого периода времени
////my_session_regenerate_id();



// Далее основной код программы