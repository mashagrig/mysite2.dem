

<nav class="navbar navbar-expand-sm navbar-light bg-light rounded">

    <a class="navbar-brand" href="?newsrc=index" id="nav-main">
        ЦИТИС
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09"
            aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExample09">
        <ul class="navbar-nav mr-auto">



<?php

if(!isset($_COOKIE['user'])){//пользователь гость
    include_once "view/includes/navbar_guest.php";
}
else{ //пользователь зашел - auth
    include_once "view/includes/navbar_auth.php";
}

?>

        </ul>
    </div>
</nav>

