


$(document).ready(function () {

//-------------- флаги на полях для блокировки сабмита -----------------------------------------------------

    var isValid_login = false;
    var isValid_email = false;
    var isValid_password = false;
    var isValid_password_confirm = false;

// //-------------- login -----------------------------------------------------

    $('#login').on('input' , function (event) {

        $(".badge-warning").remove();

        var elem_l = $("#login");
        var el_l = $("#login").val().trim();

        $.ajax(
            {
                type: "POST",
                url: "../controllers/ajax/login.php",
                data: {
                    'login': el_l,
                },
                async: false,
                dataType: "json",
                success: function (data) {
                    //-----------------------------------------------------
                    if (data[0].err_login_empty !== '') {
                        $(".invalid-feedback").remove();
                        elem_l.after('<div class="invalid-feedback">' + data[0].err_login_empty + '</div>');
                        $("#login").toggleClass('is-invalid', true);

                        $('#form_auth').on('submit', function (event) {
                            event.preventDefault();
                        });
                        isValid_login = false;
                    }
                    //-----------------------------------------------------
                    // else if (data[1].err_login_length !== '') {
                    //     $(".invalid-feedback").remove();
                    //     elem_l.after('<div class="invalid-feedback">' + data[1].err_login_length + '</div>');
                    //     $("#login").toggleClass('is-invalid', true);
                    //
                    //     $('#form_auth').on('submit', function (event) {
                    //         event.preventDefault();
                    //     });
                    //     isValid_login = false;
                    // }
                    //-----------------------------------------------------
                    else if (data[2].err_login_not_reg !== '') {
                        $(".invalid-feedback").remove();
                        elem_l.after('<div class="invalid-feedback">' + data[2].err_login_not_reg + '</div>');
                        $("#login").toggleClass('is-invalid', true);

                        $('#form_auth').on('submit', function (event) {
                            event.preventDefault();
                        });
                        isValid_login = false;
                    }
                    //-----------------------------------------------------
                    else {
                        $("#login").toggleClass('is-invalid', false);
                        isValid_login = true;
                    }
                    //-----------------------------------------------------
                }
                ,
                error: function (e) {
                    alert(console.log(e));
                }
            }
        );
    });

//---------------- email ---------------------------------------------------

    // $('#email').on('input', function (event) {
    //
    //     var elem_e = $("#email");
    //     var el_e = $("#email").val().trim();
    //
    //     $.ajax(
    //         {
    //             type: "POST",
    //             url: "../controllers/ajax/email.php",
    //             data: {
    //                 'email': el_e
    //             },
    //             dataType: "json",
    //             success: function (data) {
    //                 //-----------------------------------------------------
    //                 if (data[0].err_email_empty !== '') {
    //                     $(".invalid-feedback").remove();
    //                     elem_e.after('<div class="invalid-feedback">' + data[0].err_email_empty + '</div>');
    //                     $("#email").toggleClass('is-invalid', true);
    //
    //                     $('#form_reg').on('submit', function (event) {
    //                         event.preventDefault();
    //                     });
    //                     isValid_email = false;
    //                 }
    //                 //-----------------------------------------------------
    //                 else if (data[1].err_email !== '') {
    //                     $(".invalid-feedback").remove();
    //                     elem_e.after('<div class="invalid-feedback">' + data[1].err_email + '</div>');
    //                     $("#email").toggleClass('is-invalid', true);
    //
    //                     $('#form_reg').on('submit', function (event) {
    //                         event.preventDefault();
    //                     });
    //                     isValid_email = false;
    //                 }
    //                 //-----------------------------------------------------
    //                 else {
    //                     $("#email").toggleClass('is-invalid', false);
    //                     isValid_email = true;
    //                 }
    //                 //-----------------------------------------------------
    //             }
    //             ,
    //             error: function (e) {
    //                 alert(console.log(e.responseText));
    //             }
    //         }
    //     );
    // });

//-------------- password -----------------------------------------------------
    var el_p = '';

    $('#password').on('input', function (event) {

        $(".badge-warning").remove();

        var elem_p = $("#password");
        el_p = $("#password").val().trim();

        $.ajax(
            {
                type: "POST",
                url: "../controllers/ajax/password.php",
                data: {
                    'password': el_p
                },
                async: false,
                dataType: "json",
                success: function (data) {
                    //-----------------------------------------------------
                    if (data[0].err_password_empty !== '') {
                        $(".invalid-feedback").remove();
                        elem_p.after('<div class="invalid-feedback">' + data[0].err_password_empty + '</div>');
                        $("#password").toggleClass('is-invalid', true);

                        $('#form_auth').on('submit', function (event) {
                            event.preventDefault();
                        });
                        isValid_password = false;
                    }
                    //-----------------------------------------------------
                    else if (data[1].err_password_length !== '') {
                        $(".invalid-feedback").remove();
                        elem_p.after('<div class="invalid-feedback">' + data[1].err_password_length + '</div>');
                        $("#password").toggleClass('is-invalid', true);

                        $('#form_auth').on('submit', function (event) {
                            event.preventDefault();
                        });
                        isValid_password = false;
                    }
                    //-----------------------------------------------------
                    else {
                        $("#password").toggleClass('is-invalid', false);
                        isValid_password = true;
                    }
                    //-----------------------------------------------------
                }
                ,
                error: function (e) {
                    alert(console.log(e));
                }
            }
        );

    });

//--------------- password_confirm ----------------------------------------------------


    $('#password_confirm').on('input', function (event) {

        $(".badge-warning").remove();

        var elem_pc = $("#password_confirm");
        var el_pc = $("#password_confirm").val().trim();

        $.ajax(
            {
                type: "POST",
                url: "../controllers/ajax/password_confirm.php",
                data: {
                    'password': el_p,
                    'password_confirm': el_pc
                },
                async: false,
                dataType: "json",
                success: function (data) {
                    //---------------------------------------------------
                    if (data[0].err_password_empty !== '') {
                        $(".invalid-feedback").remove();
                        elem_pc.after('<div class="invalid-feedback">' + data[0].err_password_empty + '</div>');
                        $("#password_confirm").toggleClass('is-invalid', true);

                        $('#form_auth').on('submit', function (event) {
                            event.preventDefault();
                        });
                        isValid_password_confirm = false;
                    }
                    //---------------------------------------------------
                    // else if (data[1].err_password_length !== '') {
                    //     $(".invalid-feedback").remove();
                    //     elem_pc.after('<div class="invalid-feedback">' + data[1].err_password_length + '</div>');
                    //     $("#password_confirm").toggleClass('is-invalid', true);
                    //
                    //     $('#form_auth').on('submit', function (event) {
                    //         event.preventDefault();
                    //     });
                    //     isValid_password_confirm = false;
                    // }
                    //---------------------------------------------------
                    else if (data[2].err_password_equals !== '') {
                        $(".invalid-feedback").remove();
                        elem_pc.after('<div class="invalid-feedback">' + data[2].err_password_equals + '</div>');
                        $("#password_confirm").toggleClass('is-invalid', true);

                        $('#form_auth').on('submit', function (event) {
                            event.preventDefault();
                        });
                        isValid_password_confirm = false;
                    }
                    //---------------------------------------------------
                    else {
                        $("#password_confirm").toggleClass('is-invalid', false);
                        isValid_password_confirm = true;
                    }
                    //---------------------------------------------------
                }
                ,
                error: function (e) {
                    alert(console.log(e));
                }
            }
        );
    });

//------------Снимаем блокировку если нет ошибок-------------------------------------------------------

    $('#button_auth').on('click', function (event) {

        var i = 1;
        console.log(i++);


        if (isValid_login && isValid_password && isValid_password_confirm){
            $(".badge-warning").remove();
            $("#form_auth").off("submit");
        }else {
            event.preventDefault();
            $(".badge-warning").remove();
            $('h6').append('<div class="badge-warning">Поля не заполнены или введенные данные не корректны!!!</div>');
        }

    });
});


