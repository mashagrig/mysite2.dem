<form novalidate id="form_reg" method="POST" action="../controllers/registration.php" enctype="multipart/form-data">

    <!--     name-->
    <div class="form-group row">
        <label for="login" class="col-md-4 col-form-label text-md-right">Логин</label>

        <div class="col-md-6">
            <input autocomplete="off" id="login" type="text" class="form-control" name="login" required autofocus>
        </div>
    </div>

    <!--    email-->
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Адрес</label>

        <div class="col-md-6">
            <input autocomplete="off" id="email" type="email" class="form-control" name="email" required>
        </div>
    </div>

    <!--     password-->
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>
        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" required>
        </div>
    </div>

    <!--    confirm password---------------------->
    <div class="form-group row">
        <label for="password_confirm" class="col-md-4 col-form-label text-md-right">Повторите пароль</label>

        <div class="col-md-6">
            <input id="password_confirm" type="password" class="form-control" name="password_confirm" required>
        </div>
    </div>

    <!--    files--------------------------------->
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Загрузить файл</label>
        <div class="col-sm-6">

            <div class="custom-file">
                <input type="file" class="custom-file-input" aria-describedby="fileHelp" id="file" name="file">
                <small class="custom-file-label" data-browse="Открыть">
                    Выберите файл...
                </small>
                <small id="fileHelp" class="form-text text-muted">Вы можете загрузить нужный файл.</small>
            </div>
        </div>
    </div>

    <!--    remember me---------------------------->
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right"> </label>
        <div class="col-md-6">

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkme" name="checkme" value="check">
                <label class="custom-control-label" for="checkme">Запомнить меня</label>
            </div>

        </div>
    </div>

    <!--    submit--------------------------------->
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button id="button_reg" type="submit" class="btn btn-primary">
                Зарегистрироваться
            </button>
        </div>
    </div>
</form>
<script src="/js/validate_ajax_reg.js" type="application/javascript"></script>