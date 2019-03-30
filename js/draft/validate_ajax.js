$(document).ready(function () {

    var isValid_login;
    var isValid_email;
  //  var isValid_login = false;
   // var isValid_login = false;


    $('#login').on('input', function (event) {

        var elem_l = $("#login");
        var el_l = $("#login").val().trim();

        $.ajax(
            {
                type: "POST",
                url: "../controllers/ajax/login.php",
                data: {
                    'login': el_l,
                },
                dataType: "json",
                success: function (data) {

                    if (data[0].err_login === 'login_err_length') {
                        $(".invalid-feedback").remove();
                        elem_l.after('<div class="invalid-feedback">Логин должен быть не менее 4 и не более 8 символов</div>');
                        $("#login").toggleClass('is-invalid', true);

                        $('#form_reg').on('submit', function (event) {
                            event.preventDefault();
                        });
                        isValid_login = false;
                    }
                    else {
                         $("#login").toggleClass('is-invalid', false);
                        isValid_login = true;
                    }
                }
                ,
                error: function (e) {
                    alert(console.log(e.responseText));
                }
            }
        );
    });

    $('#email').on('input', function (event) {

        var elem_e = $("#email");
        var el_e = $("#email").val().trim();

        $.ajax(
            {
                type: "POST",
                url: "../controllers/ajax/email.php",
                data: {
                  //  'login': el_l,
                    'email': el_e
                },
                dataType: "json",
                success: function (data) {

                    if (data[0].err_email === 'email_err') {
                        $(".invalid-feedback").remove();
                        elem_e.after('<div class="invalid-feedback">e-mail введен не корректно!</div>');
                        $("#email").toggleClass('is-invalid', true);

                        $('#form_reg').on('submit', function (event) {
                            event.preventDefault();
                        });
                        isValid_email = false;
                    }
                    else {
                        $("#email").toggleClass('is-invalid', false);
                        isValid_email = true;
                    }
                }
                ,
                error: function (e) {
                    alert(console.log(e.responseText));
                }
            }
        );
    });


    $('#form_reg').on('input', function (event) {

        if (isValid_login && isValid_email){
            $("#form_reg").off("submit");
        }

    });





});


//
//         var elem = $("#login");
//         var el_l = $("#login").val().trim();
//
//         $.ajax(
//             {
//                 type: "POST",
//                 url: "../controllers/validate_ajax.php",
//                 //url: "../controllers/validate_ajax/validate_login.php",
//                 data: {
//                     'login': el_l
//                 },
//                 dataType: "json",
//                 success: function (data) {
//                     if (data.err_login === 'login_err_length') {
//                        $(".invalid-feedback").remove();
//                         elem.after('<div class="invalid-feedback">Логин должен быть не менее 4 и не более 8 символов</div>');
//                         $("#login").toggleClass('is-invalid', true);
//
//                         $('#form_reg').on('submit', function (event) {
//                             event.preventDefault();
//                         });
//                     } else {
//                         $("#login").toggleClass('is-invalid', false);
//                         $("#form_reg").off("submit");
//                     }
//                 }
//             }
//         );
// });


//-----------------Проверка формы регистрации------------------------------

//     $('#form_reg').on('input', function (event) {
//
// //
// //         var elem = $("#login");
// //         var el_l = $("#login").val().trim();
// //
// //         $.ajax(
// //             {
// //                 type: "POST",
// //                 url: "../controllers/validate_ajax.php",
// //                 //url: "../controllers/validate_ajax/validate_login.php",
// //                 data: {
// //                     'login': el_l
// //                 },
// //                 dataType: "json",
// //                 success: function (data) {
// //                     if (data.err_login === 'login_err_length') {
// //                        $(".invalid-feedback").remove();
// //                         elem.after('<div class="invalid-feedback">Логин должен быть не менее 4 и не более 8 символов</div>');
// //                         $("#login").toggleClass('is-invalid', true);
// //
// //                         $('#form_reg').on('submit', function (event) {
// //                             event.preventDefault();
// //                         });
// //                     } else {
// //                         $("#login").toggleClass('is-invalid', false);
// //                         $("#form_reg").off("submit");
// //                     }
// //                 }
// //             }
// //         );
// // });
//
//
//         var elem = $("#login");
//         var el_l = $("#login").val().trim();
//         var elem_e = $("#email");
//         var el_e = $("#email").val().trim();
//
//         $.ajax(
//             {
//                 type: "POST",
//                 url: "../controllers/validate_ajax.php",
//                 data: {
//                     'login': el_l,
//                     'email': el_e
//                 },
//                 dataType: "json",
//                 success: function (data) {
//                  //   if ($.parseJSON(data.err_login) === 'login_err_length') {
//                    // console.log(data[0].err_login);
//                     if (data[0].err_login === 'login_err_length') {
//                         $(".invalid-feedback").remove();
//                         elem.after('<div class="invalid-feedback">Логин должен быть не менее 4 и не более 8 символов</div>');
//                         $("#login").toggleClass('is-invalid', true);
//
//                         $('#form_reg').on('submit', function (event) {
//                             event.preventDefault();
//                         });
//                     }
//                     if (data[1].err_email === 'email_err') {
//                         $(".invalid-feedback").remove();
//                         elem_e.after('<div class="invalid-feedback">e-mail введен не корректно!</div>');
//                         $("#email").toggleClass('is-invalid', true);
//
//                         $('#form_reg').on('submit', function (event) {
//                             event.preventDefault();
//                         });
//                     }
//
//
//                     else {
//                         $("#login").toggleClass('is-invalid', false);
//                         $("#email").toggleClass('is-invalid', false);
//                         $("#form_reg").off("submit");
//                     }
//                 }
//                 ,
//                 error: function (e) {
//                     alert(console.log(e.responseText));
//                 }
//             }
//         );
//     });

// var elem_e = $("#email");
// var el_e = $("#email").val().trim();
//
// $.ajax(
//     {
//         type: "POST",
//         url: "../controllers/validate_ajax.php",
//         data: {
//             'email': el_e
//         },
//         dataType: "json",
//         success: function (data) {
//             if (data.err === 'email_err') {
//                 $(".invalid-feedback").remove();
//                 elem_e.after('<div class="invalid-feedback">e-mail введен не корректно!</div>');
//                 $("#email").toggleClass('is-invalid', true);
//
//                 $('#form_reg').on('submit', function (event) {
//                     event.preventDefault();
//                 });
//             } else {
//                 $("#email").toggleClass('is-invalid', false);
//                 $("#form_reg").off("submit");
//             }
//         }
//     }
// );
//

//   var id_input = $("#login");
//   var el_l = $("#login").val().trim();
//   var err_mark = 'login_err_length';
//   var err_mess = "Логин должен быть не менее 4 и не более 8 символов";
//   var id_form = $("#form_reg");
//
//   markInvalidInput(id_input, err_mark, err_mess);
// function markInvalidInput(id_form, id_input, el_l, err_mark, err_mess) {
//     var elem = id_input;
//     //var el_l = id_input.val().trim();
//
//     $.ajax(
//         {
//             type: "POST",
//             url: "../controllers/validate_ajax.php",
//             data: {
//                 'login': el_l
//             },
//             dataType: "json",
//             success: function (data) {
//                 if (data.err === err_mark) {
//                     $(".invalid-feedback").remove();
//                     elem.after('<div class="invalid-feedback">err_mess</div>');
//                     id_input.toggleClass('is-invalid', true);
//
//                     id_form.on('submit', function (event) {
//                         event.preventDefault();
//                     });
//                 } else {
//                     id_input.toggleClass('is-invalid', false);
//                     id_form.off("submit");
//                 }
//             }
//         }
//     );
// }

// -----------------Проверка формы входа------------------------------
//
//     $('#form_auth').on('input', function(event) {
//         isInvalidLogin();
//         isInvalidPassword();
//         if (
//             isInvalidLogin() || isInvalidPassword()
//         ) { // если есть ошибки возвращает true
//             $('#form_auth').on('submit', function(event) {
//                 event.preventDefault();
//             })
//         }else $("#form_auth").off("submit");
//     });

// -----------------Проверка логина------------------------------
// если есть ошибки возвращает true
// function isInvalidLogin() {
//     $(".invalid-feedback").remove();
//
//     var el_l = $("#login").val().trim();
//
//     $.ajax(
//         {
//             type: "POST",
//             url: "../controllers/validate_ajax.php",
//             data: {
//                 'login': el_l
//             },
//             dataType: "json",
//             success: function (data) {
//                 if (data !== '') {
//                     el_l.after('<div class="invalid-feedback">Логин должен быть не менее 4 символов</div>');
//                     $("#login").toggleClass('is-invalid', v_login);
//                     return true;
//                 }
//             }
//         }
//     );
// }

// // ----------------Проверка e-mail-------------------------------
// // если есть ошибки возвращает true
//     function isInvalidEmail() {
//         $(".invalid-feedback").remove();
//
//         var reg     = /^\w+([\.-]?\w+)*@(((([a-z0-9]{2,})|([a-z0-9][-][a-z0-9]+))[\.][a-z0-9])|([a-z0-9]+[-]?))+[a-z0-9]+\.([a-z]{2}|(com|ru|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum))$/i;
//         var el_e    = $("#email");
//         var v_email = el_e.val().trim()?false:true;
//
//         if ( v_email ) {
//             v_email = true;
//             el_e.after('<div class="invalid-feedback">Поле e-mail обязательно к заполнению</div>');
//         }
//         else if ( !reg.test( el_e.val().trim() ) ) {
//             v_email = true;
//             el_e.after('<div class="invalid-feedback">Допустимый e-mail должен быть в формате e@ee.ee</div>');
//         }
//         else { var v_email = false;}
//
//         $("#email").toggleClass('is-invalid', v_email );
//         return v_email;
//     }
//
// // ----------------Проверка паролей-------------------------------
// // если есть ошибки возвращает true
//     function isInvalidPassword() {
//         $(".invalid-feedback").remove();
//
//         var el_p1    = $("#password");
//         var el_p2    = $("#password-confirm");
//
//         var v_pass1 = el_p1.val().trim()?false:true;
//         var v_pass2 = el_p1.val().trim()?false:true;
//
//         if ( el_p1.val().length < 6 ) {
//             v_pass1 = true;
//             //   v_pass2 = true;
//             el_p1.after('<div class="invalid-feedback">Пароль должен быть не менее 6 символов</div>');
//         }
//         if ( el_p2.val().length < 6 ) {
//             //   v_pass1 = true;
//             v_pass2 = true;
//             el_p2.after('<div class="invalid-feedback">Пароль должен быть не менее 6 символов</div>');
//
//         }
//         if ( el_p1.val().trim() !== el_p2.val().trim() ) {
//             //  v_pass1 = true;
//             v_pass2 = true;
//             //  el_p1.after('<div class="invalid-feedback">Пароли не совпадают!</div>');
//             el_p2.after('<div class="invalid-feedback">Пароли не совпадают!</div>');
//         }
//         $("#password").toggleClass('is-invalid', v_pass1 );
//         $("#password-confirm").toggleClass('is-invalid', v_pass2 );
//
//         return v_pass1 && v_pass2;
//     }


