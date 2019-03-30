
$(document).ready(function() {




// -----------------Проверка формы регистрации------------------------------

$('#form_reg').on('input', function(event) {
    isInvalidLogin();
    isInvalidEmail();
    isInvalidPassword();
    if (
        isInvalidLogin() || isInvalidEmail() || isInvalidPassword()
    ) { // если есть ошибки возвращает true
        $('#form_reg').on('submit', function(event) {
            event.preventDefault();
        })
    }
    else $("#form_reg").off("submit");
});


// -----------------Проверка формы входа------------------------------

$('#form_auth').on('input', function(event) {
    isInvalidLogin();
    isInvalidPassword();
    if (
        isInvalidLogin() || isInvalidPassword()
    ) { // если есть ошибки возвращает true
        $('#form_auth').on('submit', function(event) {
            event.preventDefault();
        })
    }else $("#form_auth").off("submit");
});

// -----------------Проверка логина------------------------------
// если есть ошибки возвращает true
function isInvalidLogin() {
    $(".invalid-feedback").remove();

    var el_l = $("#login");
    if (el_l.val().trim().length < 4) {
        var v_login = true;
        el_l.after('<div class="invalid-feedback">Логин должен быть не менее 4 символов</div>');
    }
    else { var v_login = false;}

    $("#login").toggleClass('is-invalid', v_login);
    return v_login;
}

// ----------------Проверка e-mail-------------------------------
// если есть ошибки возвращает true
function isInvalidEmail() {
    $(".invalid-feedback").remove();

    var reg     = /^\w+([\.-]?\w+)*@(((([a-z0-9]{2,})|([a-z0-9][-][a-z0-9]+))[\.][a-z0-9])|([a-z0-9]+[-]?))+[a-z0-9]+\.([a-z]{2}|(com|ru|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum))$/i;
    var el_e    = $("#email");
    var v_email = el_e.val().trim()?false:true;

    if ( v_email ) {
        v_email = true;
        el_e.after('<div class="invalid-feedback">Поле e-mail обязательно к заполнению</div>');
    }
    else if ( !reg.test( el_e.val().trim() ) ) {
        v_email = true;
        el_e.after('<div class="invalid-feedback">Допустимый e-mail должен быть в формате e@ee.ee</div>');
    }
    else { var v_email = false;}

    $("#email").toggleClass('is-invalid', v_email );
    return v_email;
}

// ----------------Проверка паролей-------------------------------
// если есть ошибки возвращает true
function isInvalidPassword() {
    $(".invalid-feedback").remove();

    var el_p1    = $("#password");
    var el_p2    = $("#password-confirm");

    var v_pass1 = el_p1.val().trim()?false:true;
    var v_pass2 = el_p1.val().trim()?false:true;

    if ( el_p1.val().length < 6 ) {
        v_pass1 = true;
        //   v_pass2 = true;
        el_p1.after('<div class="invalid-feedback">Пароль должен быть не менее 6 символов</div>');
    }
    if ( el_p2.val().length < 6 ) {
        //   v_pass1 = true;
        v_pass2 = true;
        el_p2.after('<div class="invalid-feedback">Пароль должен быть не менее 6 символов</div>');

    }
    if ( el_p1.val().trim() !== el_p2.val().trim() ) {
        //  v_pass1 = true;
        v_pass2 = true;
        //  el_p1.after('<div class="invalid-feedback">Пароли не совпадают!</div>');
        el_p2.after('<div class="invalid-feedback">Пароли не совпадают!</div>');
    }
    $("#password").toggleClass('is-invalid', v_pass1 );
    $("#password-confirm").toggleClass('is-invalid', v_pass2 );

    return v_pass1 && v_pass2;
}






});