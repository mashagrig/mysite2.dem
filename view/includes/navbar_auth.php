
<?php
if(!isset($_COOKIE['user'])){//пользователь гость
    $login = '';
}
else{ //пользователь зашел - auth
    $login = base64_decode($_COOKIE['user']);
}

?>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="dropdown09" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <?=$login ?>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdown09">
                    <a class="dropdown-item" href="?newsrc=view/account_view">
                        Личный кабинет
                    </a>
                    <a class="dropdown-item" href="?newsrc=view/logout_view">
                        Выйти
                    </a>
                </div>
            </li>



