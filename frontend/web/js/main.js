// Поиск по сайту

$(document).on('click', function (e) {
    var nav = $('.navbar');
    if (!nav.is(e.target)
        && nav.has(e.target).length === 0) {
        $('.navbar-collapse').collapse('hide');
    }
});


$('#btnSearchHeader').on('click', function (e) {
    var elem = $(this).parents('.search_h');
    elem.children('.form_search').addClass('active');

    $(document).mouseup(function (e) {
        if (!elem.is(e.target)
            && elem.has(e.target).length === 0) {
            elem.children('.form_search').removeClass('active');
        }
    });
});


$('.form_search .input_search').on('change keyup input click', function (e) {
    var value = $(this).val();
    var elem = $(this).parents('.form_search');

    if (value.length >= 3) {
        $('.search_modal').load('/search?q=' + value);
        elem.children('.search_modal').slideDown(250);

    }

    closeSearchModal(elem, ".search_modal");
});
$('.form_search .btn_search').on('click', function (e) {
    var elem = $(this).parents('.form_search');
    elem.children('.search_modal').slideDown(250);
    closeSearchModal(elem, ".search_modal");

});

function closeSearchModal(elem, modal) {
    $(document).mouseup(function (e) {
        if (!elem.is(e.target)
            && elem.has(e.target).length === 0) {
            elem.children(modal).slideUp(250);
        }
    });
}

/****************************************************/


// Только цифры в поле телефона
$(document).ready(function () {
    $('[name=phone]').bind("change keyup input click", function () {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });
});
/****************************************************/


//Проверка формы во всплывашке
function send(form_id, url) {
    if (document.getElementById(form_id).name.value == "") {
        alert('Пожалуйста, укажите ваше имя');
        document.getElementById(form_id).name.focus();
        return false;
    }
    if (document.getElementById(form_id).email.value == "") {
        alert('Пожалуйста, укажите ваш E-mail');
        document.getElementById(form_id).email.focus();
        return false;
    }
    if (document.getElementById(form_id).phone.value == "") {
        alert('Пожалуйста, укажите ваш телефон');
        document.getElementById(form_id).phone.focus();
        return false;
    }

    jQuery.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: jQuery("#" + form_id).serialize(),
        success: function (response) { //Если все нормально
            jQuery(function ($) {

            });
        },
        error: function (response) { //Если ошибка
            jQuery(function ($) {

            });
        }
    });
}

/****************************************************/


// Проверка заполненных полей, стр1. отзывы
function reviewNextPage(id) {
    if (document.getElementById(id).first_name.value == "") {
        alert('Пожалуйста, укажите ваше имя');
        document.getElementById(id).first_name.focus();
        return false;
    }
    if (document.getElementById(id).last_name.value == "") {
        alert('Пожалуйста, укажите вашу фамилию');
        document.getElementById(id).last_name.focus();
        return false;
    }
    if (document.getElementById(id).position.value == "") {
        alert('Пожалуйста, укажите вашу должность');
        document.getElementById(id).position.focus();
        return false;
    }
    if (document.getElementById(id).email.value == "") {
        alert('Пожалуйста, укажите ваш E-mail');
        document.getElementById(id).email.focus();
        return false;
    }
    if (document.getElementById(id).using_time.value == "") {
        alert('Как долго пользуетесь программой?');
        document.getElementById(id).using_time.focus();
        return false;
    }

    $('#' + id + ' .tab1').hide();
    $('#' + id + ' .tab2').show();
}

/****************************************************/


// Проверка заполненных полей, стр2. отзывы
function reviewSend(id) {
    if (document.getElementById(id).rating_common.value == "0") {
        alert('Пожалуйста, поставьте общую оценку');
        document.getElementById(id).rating_common.focus();
        return false;
    }
    if (document.getElementById(id).rating_convenience.value == "0") {
        alert('Пожалуйста, оцените удобство');
        document.getElementById(id).rating_convenience.focus();
        return false;
    }
    if (document.getElementById(id).rating_functions.value == "0") {
        alert('Пожалуйста, оцените функционал');
        document.getElementById(id).rating_functions.focus();
        return false;
    }
    if (document.getElementById(id).rating_support.value == "0") {
        alert('Пожалуйста, поставьте оценку службе поддержки');
        document.getElementById(id).rating_support.focus();
        return false;
    }

    if (document.getElementById(id).pluses.value == "") {
        alert('Пожалуйста, укажите достоинства, что вам понравилось?');
        document.getElementById(id).pluses.focus();
        return false;
    }
    if (document.getElementById(id).minuses.value == "") {
        alert('Пожалуйста, укажите недостатки, что не оправдло ваши ожидания?');
        document.getElementById(id).minuses.focus();
        return false;
    }
    if (document.getElementById(id).common.value == "") {
        alert('Пожалуйста, укажите общие впечатления');
        document.getElementById(id).common.focus();
        return false;
    }
    $('form#review_form').submit();
}

/****************************************************/


// функция аналог in array in php
function in_array(needle, array) {
    if (array.indexOf(needle) !== -1) {
        return 1;
    } else return 0;
}






   