$(document).ready(function () {


    $('#buttonForm').click(function () {
        if (($gender = 'male') && ($('#spin').is(':checked')) && ($('#beginner').is(':checked'))) {
            $(location).attr('href', 'male_begin_spin.php');
        }
    });
    $('#buttonForm').click(function () {
        if (($gender = 'male') && ($('#cardio').is(':checked')) && ($('#beginner').is(':checked'))) {
            $(location).attr('href', 'male_begin_cardio.php');
        }
    });
    $('#buttonForm').click(function () {
        if (($gender = 'male') && ($('#spin').is(':checked')) && ($('#advanced').is(':checked'))) {
            $(location).attr('href', 'male_advanced_spin.php');
        }
    });
    $('#buttonForm').click(function () {
        if (($gender = 'male') && ($('#cardio').is(':checked')) && ($('#advanced').is(':checked'))) {
            $(location).attr('href', 'male_advanced_cardio.php');
        }
    });
    $('#buttonForm').click(function () {
        if (($gender = 'female') && ($('#spin').is(':checked')) && ($('#beginner').is(':checked'))) {
            $(location).attr('href', 'female_begin_spin.php');
        }
    });
    $('#buttonForm').click(function () {
        if (($gender = 'female') && ($('#cardio').is(':checked')) && ($('#beginner').is(':checked'))) {
            $(location).attr('href', 'female_begin_cardio.php');
        }
    });
    $('#buttonForm').click(function () {
        if (($gender = 'female') && ($('#cardio').is(':checked')) && ($('#inter').is(':checked'))) {
            $(location).attr('href', 'female_inter_cardio.php');
        }
    });
    $('#buttonForm').click(function () {
        if (($gender = 'female') && ($('#spin').is(':checked')) && ($('#inter').is(':checked'))) {
            $(location).attr('href', 'female_inter_spin.php');
        }
    });
    $('#buttonForm').click(function () {
        if (($gender = 'male') && ($('#cardio').is(':checked')) && ($('#inter').is(':checked'))) {
            $(location).attr('href', 'male_inter_cardio.php');
        }
    });
    $('#buttonForm').click(function () {
        if (($gender = 'male') && ($('#spin').is(':checked')) && ($('#inter').is(':checked'))) {
            $(location).attr('href', 'male_inter_spin.php');
        }
    });
    $('#buttonForm').click(function () {
        if (($gender = 'female') && ($('#spin').is(':checked')) && ($('#advanced').is(':checked'))) {
            $(location).attr('href', 'female_advanced_spin.php');
        }
    });
    $('#buttonForm').click(function () {
        if (($gender = 'female') && ($('#cardio').is(':checked')) && ($('#advanced').is(':checked'))) {
            $(location).attr('href', 'female_advanced_cardio.php');
        }
    });
});

