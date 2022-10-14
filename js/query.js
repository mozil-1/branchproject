
$(function () {
    var btnSubmit = $('#submit');
    btnSubmit.attr('disabled', 'disabled');
    $('input[name=terms]').change(function (e) {
        if ($(this).val() == 'agree') {
            btnSubmit.removeAttr('disabled');
        } else {
            btnSubmit.attr('disabled', 'disabled');
        }
    });
});