$(document).ready(function () {
    $("#send").on('click', function (e) {
        e.preventDefault();

        while ($(".error-message").length) {
            $(".error-message").remove();
        }

        if ($("#title").val() > 256) {
            $("#title").after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le titre ne peut pas excéder 256 charactères. *</span>");
            return;
        } else if ($("#title").val().trim().length == 0) {
            $("#title").after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le titre ne peut pas être vide. *</span>");
            return;
        }

        if ($("#link").val() > 256) {
            $("#link").after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le lien ne peut pas excéder 256 charactères. *</span>");
            return;
        } else if ($("#link").val().trim().length == 0) {
            $("#link").after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le lien ne peut pas être vide. *</span>");
            return;
        }

        if ($("#category").val() > 128) {
            $("#category").after("<span class=\"text-sm leading-5 text-red-500 error-message\">* La catégorie ne peut pas excéder 128 charactères. *</span>");
            return;
        } else if ($("#category").val().trim().length == 0) {
            $("#category").after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le lien ne peut pas être vide. *</span>");
            return;
        }

        if ($("#description").val() > 256) {
            $("#description").after("<span class=\"text-sm leading-5 text-red-500 error-message\">* La description ne peut pas excéder 256 charactères. *</span>");
            return;
        } else if ($("#description").val().trim().length == 0) {
            $("#description").after("<span class=\"text-sm leading-5 text-red-500 error-message\">* La description ne peut pas être vide. *</span>");
            return;
        }

        $("#linkForm").submit()
    });
});