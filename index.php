<?php


require_once "db.php";
include_once "global_functions.php";
include_once "session.php";
my_session_start();

include_once "controllers/remember_token_verify.php";
include_once "global_vars.php";

include_once "view/includes/header.php";
 ?>

    <div class="jumbotron">
        <div class="col-sm-8 mx-auto">

            <h1>ЦИТИС</h1>
            <h6></h6>
            <p>

                <?php
                //Отображение сообщений об ошибках
                echo "<div class='badge-warning'>";
                if (isset($_GET['errors'])) {
                    foreach ($global_vars["errors"] as $k => $v) {
                        if ($_GET['errors'] == $k) {
                            echo $v;
                        }
                    }
                }
                echo "</div>";
                //Отображение сообщений об успехе
                echo "<div class='badge-success'>";
                if (isset($_GET['success'])) {
                    foreach ($global_vars["success"] as $k => $v) {
                        if ($_GET['success'] == $k) {
                            echo $v;
                        }
                    }
                }
                echo "</div>";
                echo "<p></p>";

                //подгружаем вьюху для редиректа из меню
                if (isset($_GET['newsrc']) && $_GET['newsrc']) {
                    $s = "{$_GET['newsrc']}.php";
                    include_once $s;
                } else {
                    include_once "index.php";
                }
                ?>

            </p>
            <p>cookie 240 sec</p>
            <p>session 15 sec</p>
            <p>Хранение токена в cookie</p>
            <p>Проверка токена по секретному ключу</p>
            <p>Для авторизованных пользователей (с токеном и без) генерируется уникальный session_id, хранящийся в cooke</p>
            <p>Валидация полей с включенным расширением mbstring</p>
        </div>
    </div>

<?php
print_r($_SESSION);
print_r($_COOKIE['user']);
    session_write_close();
include_once "view/includes/footer.php";
?>