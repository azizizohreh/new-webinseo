//global ******************************************************************
jQuery(document).ready(function ($) {
    $(".footer-menus .menu-name").on("click", function (e) {
        $(this).parent().toggleClass("active");
    });

    $(".menu-bar").on("click", function (e) {
        $("body").toggleClass("menu-open");
    });
    $(".overlay").on("click", function (e) {
        $("body").toggleClass("menu-open");
    });

    $(".header-top .menu li.menu-item-has-children").append('<span class="caret"></span>');
    $(".header-bottom .menu li.menu-item-has-children").append('<span class="caret"></span>');
    $(".mobile-menu .menu li.menu-item-has-children").append('<span class="m-after">+</span>');

    $(".m-after").on("click", function (e) {
        $(this).parent().toggleClass("active");
        if ($(this).parent().hasClass('active')) {
            $(this).html('-');
        } else {
            $(this).html('+');
        }
    });

    $(".faq").on("click", function (e) {
        $(this).toggleClass("active");
    });

    $(".more-box-btn").on("click", function (e) {
        $(this).parent().toggleClass("show");
        if ($(this).parent().hasClass("show")) {
            $(this).html("بستن");
        } else {
            $(this).html("مشاهده بیشتر...");
        }
    });

    $(".notif .close").click(function (e) {
        $(".notif").slideUp();
    });

});

const togglePassword = document.querySelector('#togglePassword');
if(togglePassword) {
    const password = document.querySelector('#user-pass');
    togglePassword.addEventListener('click', () => {

        // Toggle the type attribute using
        // getAttribure() method
        const type = password
            .getAttribute('type') === 'password' ?
            'text' : 'password';

        password.setAttribute('type', type);

        // Toggle the eye and bi-eye icon
        togglePassword.classList.toggle(`slash`);

    });
}


// ajax ********************************************************************
jQuery(document).ready(function ($) {
    $("#register-ajax").on("click", function (e) {
        var name = $("#name-family").val();
        var phone = $("#user-tel").val();
        var email = $("#user-email").val();
        if (name.length > 0 && phone.length > 0) {
            $.ajax({
                url: ajax_login_object.ajaxurl,
                type: 'post',
                data: {
                    action: 'ws_register',
                    namefamily: name,
                    user_tel: phone,
                    user_email: email,
                },
                success: function (result) {
                    if (result.success) {
                        $("#phone").html(phone);
                        $("#register-modal .modal-content").addClass("d-none");
                        $("#register-modal .modal-content.send-msg").removeClass("d-none");
                        // $("#register-ajax").addClass("disabled");
                        var code = result.code;
                        $("#register-ajax2").on("click", function (e) {
                            var confirm_code = $("#confirm-code").val();
                            $.ajax({
                                url: ajax_login_object.ajaxurl,
                                type: 'post',
                                data: {
                                    action: 'ws_register2',
                                    namefamily: name,
                                    user_tel: phone,
                                    user_email: email,
                                    code: code,
                                    confirm_code: confirm_code,
                                },
                                success: function (result) {
                                    if (result.success) {
                                        alert(result.msg);
                                        setTimeout(function () {
                                            location.reload();
                                        }, 500);
                                    } else {
                                        alert(result.msg);
                                    }
                                },
                                error: function (error) {
                                    alert(error.msg);
                                }
                            });

                        });

                    } else {
                        alert(result.msg);
                    }
                },
                error: function (error) {
                    alert(error.msg);
                }
            });

        } else {
            alert("لطفا نام و شماره همراه خود را وارد کنید.");
        }
    });

    $("#send-again").on("click", function (e) {
        alert("کد تایید دوباره ارسال شد، لطفا صبر کنید.");
        $("#send-again").addClass("disabled");
        $("#register-ajax").trigger("click");
    });

    $(".back-to-reg").on("click", function (e) {
        $("#register-modal .modal-content").removeClass("d-none");
        $("#register-modal .modal-content.send-msg").addClass("d-none");
    });

    $("#forget-pass-ajax").on("click", function (e) {
        var phone = $(".forget-pass-ajax-form #user-name").val();
        if (phone.length > 0) {
            $.ajax({
                url: ajax_login_object.ajaxurl,
                type: 'post',
                data: {
                    action: 'ws_forget_pass',
                    user_tel: phone,
                },
                success: function (result) {
                    if (result.success) {
                        alert(result.msg);
                        setTimeout(function () {
                            location.reload();
                        }, 500);
                    } else {
                        alert(result.msg);
                    }
                },
                error: function (error) {
                    alert(error.msg);
                }
            });

        } else {
            alert("لطفا شماره همراه خود را وارد کنید.");
        }
    });

    $("#login-ajax").on("click", function (e) {
        var username = $("#user-name").val();
        var userpass = $("#user-pass").val();
        var usersave = false;
        if ($("#user-save").is(':checked')) {
            usersave = true;
        }
        debugger;
        $.ajax({
            url: ajax_login_object.ajaxurl,
            type: 'post',
            data: {
                action: 'ws_login',
                user_name: username,
                user_pass: userpass,
                user_save: usersave,
            },
            success: function (result) {
                if (result.success) {
                    setTimeout(function () {
                        location.reload();
                    }, 500);
                } else {
                    alert(result.msg);
                }
            },
            error: function (error) {
                alert(error.msg);
            }
        });
    });

    $(".consult-request .btn-closed").click(function (e) {
        $(".consult-request").slideUp();
        $("body").addClass("consult-dismiss");
    });

    $("#consult-ajax").on("click", function (e) {
        debugger;
        e.preventDefault();
        $("#consult-ajax").addClass('disabled');
        var name = $("#consult-name").val();
        var tel = $("#consult-tel").val();
        var site = $("#consult-site").val();
        var type = $('input[name="consult-type"]:checked').val();
        var page = $("#consult-page").val();
        $.ajax({
            url: ajax_login_object.ajaxurl,
            type: 'post',
            data: {
                action: 'ws_consult',
                consult_name: name,
                consult_tel: tel,
                consult_site: site,
                consult_type: type,
                consult_page: page,
            },
            success: function (result) {
                alert(result.msg);
                $("#consult-ajax").removeClass('disabled');
                $("#consult-modal .close-modal").trigger("click");
            },
            error: function (error) {
                alert(error.msg);
                $("#consult-ajax").removeClass('disabled');
            }
        });
    });

    $(".consult-request .open-box").on("click", function (e) {
        if ($(".consult-request").hasClass("opend")) {
            $(".consult-request-img-text").slideUp('slow', function () {
                $(".consult-request").removeClass("opend");
            });
        } else {
            $(".consult-request").addClass("opend");
            $(".consult-request-img-text").slideDown('slow');
        }
    });

    $(".consult-request .btn-close-box").on("click", function (e) {
        $(".consult-request-img-text").slideUp('slow', function () {
            $(".consult-request").removeClass("opend");
        });
    });

    $("#consult-mobile-btn").on("click", function (e) {
        e.preventDefault();
        $("#consult-mobile-btn").addClass('disabled');
        var name = $("#consult-mobile-name").val();
        var tel = $("#consult-mobile-tel").val();
        var site = $("#consult-mobile-site").val();
        var type = $('input[name="consult-mobile-type"]:checked').val();
        var page = $("#consult-mobile-page").val();
        $.ajax({
            url: ajax_login_object.ajaxurl,
            type: 'post',
            data: {
                action: 'ws_consult',
                consult_name: name,
                consult_tel: tel,
                consult_site: site,
                consult_type: type,
                consult_page: page,
            },
            success: function (result) {
                alert(result.msg);
                $("#consult-mobile-btn").removeClass('disabled');
                $(".consult-request .btn-close-box").trigger("click");
            },
            error: function (error) {
                alert(error.msg);
                $("#consult-mobile-btn").removeClass('disabled');
            }
        });
    });
});

//index ********************************************************************
jQuery(document).ready(function ($) {
    var splide = $("#product_splide");
    if (splide.length > 0) {
        splide = new Splide("#product_splide", {
            type: 'slide',
            perPage: 3,
            gap: '25px',
            pagination: true,
            breakpoints: {
                991: {
                    perPage: 2,
                    gap: '25px',
                },
                767: {
                    perPage: 1,
                    gap: '0px',
                }
            }
        }).mount();
    }

    var splide2 = $("#books_splide");
    if (splide2.length > 0) {
        splide2 = new Splide("#books_splide", {
            direction: 'ttb',
            type: 'slide',
            perPage: 1,
            arrows: false,
            pagination: true,
            heightRatio: 0.3,
            breakpoints: {
                991: {
                    direction: 'ltr',
                    heightRatio: 1,
                    height: 'auto',
                }
            }
        }).mount();
    }

    var splide3 = $("#post_splide");
    if (splide3.length > 0) {
        splide3 = new Splide("#post_splide", {
            type: 'slide',
            perPage: 3,
            gap: '25px',
            pagination: true,
            breakpoints: {
                991: {
                    perPage: 2,
                    gap: '25px',
                },
                767: {
                    perPage: 1,
                    gap: '0px',
                }
            }
        }).mount();
    }

    var splide4 = $("#comment_splide");
    if (splide4.length > 0) {
        splide4 = new Splide("#comment_splide", {
            type: 'slide',
            perPage: 3,
            gap: '14px',
            arrows: false,
            pagination: false,
            breakpoints: {
                991: {
                    perPage: 2,
                    gap: '14px',
                },
                767: {
                    perPage: 1,
                    gap: '0px',
                }
            }
        }).mount();
    }
});

//blog *********************************************************************
jQuery(document).ready(function ($) {
    $(".content-panel-cats li").on("click", function (e) {
        $id = $(this).attr('id').replaceAll("cat-", "");
        $(".content-panel-cats li").removeClass("active");
        $("#cat-" + $id).addClass("active");
        $(".content-panel-content .post-list").removeClass("active");
        $("#content-list-" + $id).addClass("active");
        const d = new Date();
        d.setTime(d.getTime() + (24 * 60 * 60 * 1000));
        document.cookie = "nav-tab=" + $id + "; expires=" + d.toUTCString() + " ;path=/";
    });
    $(".blog-page .page-numbers a").on("click", function (e) {
        e.preventDefault();
        $page = $(this).attr("href");
        $page_num = $page[$page.length - 1];
        $page_num = parseInt($page_num) > 0 ? parseInt($page_num) : 1;
        $id = $(".content-panel-cats li.active").attr('id').replaceAll("cat-", "");
        const d = new Date();
        d.setTime(d.getTime() + (24 * 60 * 60 * 1000));
        document.cookie = "nav-page-" + $id + "=" + $page_num + "; expires=" + d.toUTCString() + " ;path=/";
        window.location.href = $page;
    });

});

//seo-tutorials ************************************************************
jQuery(document).ready(function ($) {
    $(".chapter-head-show").on("click", function (e) {
        $(this).parent().parent().parent().toggleClass("open");
    });
});

//web-design ***************************************************************
jQuery(document).ready(function ($) {
    var customer_splide = $("#customer_splide");
    if (customer_splide.length > 0) {
        splide = new Splide("#customer_splide", {
            type: 'slide',
            perPage: 1,
            pagination: true,
            arrows: true,
        }).mount();
    }

    $("#web-form-btn").on("click", function (e) {
        e.preventDefault();
        // $("#web-form-btn").text('صبرکنید...');
        $("#web-form-btn").attr('disabled',1);
        var name = $("#web-form-family").val();
        var tel = $("#web-form-tel").val();
        var type = $("#web-form-type").val();
        var site = $("#web-form-site").val();
        var page = $("#web-form-page").val();
        $.ajax({
            url: ajax_login_object.ajaxurl,
            type: 'post',
            data: {
                action: 'ws_consult',
                consult_name: name,
                consult_tel: tel,
                consult_site: site,
                consult_type: type,
                consult_page: page,
            },
            success: function (result) {
                alert(result.msg);
                // $("#web-form-btn").text('ثبت درخواست طراحی سایت');
                $("#web-form-btn").removeAttr('disabled');
            },
            error: function (error) {
                alert(error.msg);
                // $("#web-form-btn").text('ثبت درخواست طراحی سایت');
                $("#web-form-btn").removeAttr('disabled');
            }
        });
    });
});

//seo-consult **************************************************************
jQuery(document).ready(function ($) {

    $("#consult-btn").on("click", function (e) {
        e.preventDefault();
        $("#consult-btn").attr('disabled',1);
        var name = $("#consult-name").val();
        var tel = $("#consult-tel").val();
        $.ajax({
            url: ajax_login_object.ajaxurl,
            type: 'post',
            data: {
                action: 'ws_seo_consult',
                consult_name: name,
                consult_tel: tel,
            },
            success: function (result) {
                alert(result.msg);
                $("#consult-btn").removeAttr('disabled');
            },
            error: function (error) {
                alert(error.msg);
                $("#consult-btn").removeAttr('disabled');
            }
        });
    });

});

//analysis site ************************************************************
jQuery(document).ready(function ($) {

    $("#analysis-btn").on("click", function (e) {
        e.preventDefault();
        $("#analysis-btn").attr('disabled',1);
        var name = $("#analysis-name").val();
        var tel = $("#analysis-tel").val();
        var site = $("#analysis-url").val();
        $.ajax({
            url: ajax_login_object.ajaxurl,
            type: 'post',
            data: {
                action: 'ws_analysis',
                analysis_name: name,
                analysis_tel: tel,
                analysis_site: site,
            },
            success: function (result) {
                alert(result.msg);
                $("#analysis-btn").removeAttr('disabled');
            },
            error: function (error) {
                alert(error.msg);
                $("#analysis-btn").removeAttr('disabled');
            }
        });
    });

});

