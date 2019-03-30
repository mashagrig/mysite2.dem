<form novalidate id="form_auth" method="POST" action="../controllers/autherization.php">

    <!--     login---------------------------->
    <div class="form-group row">
        <label for="login" class="col-md-4 col-form-label text-md-right">Логин</label>

        <div class="col-md-6">
            <input autocomplete="off" id="login" type="text" class="form-control" name="login" required>
        </div>
    </div>
    <!--     пароль---------------------------->
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>
        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" required>

        </div>
    </div>
    <!--    Повторите пароль---------------------------->
    <div class="form-group row">
        <label for="password_confirm" class="col-md-4 col-form-label text-md-right">Повторите пароль</label>

        <div class="col-md-6">
            <input id="password_confirm" type="password" class="form-control" name="password_confirm" required>
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
            <button id="button_auth" type="submit" class="btn btn-primary">
                Авторизоваться
            </button>
        </div>
    </div>
</form>
<script src="/js/validate_ajax_auth.js" type="application/javascript"></script>