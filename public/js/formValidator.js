$(document).ready(function () {
    $('#send').on('click', (e) => {
        e.preventDefault();

        while ($(".error-message").length) {
            $(".error-message").remove();
        }

        let title = $('#title');
        let link = $('#link');
        let category = $('#category');
        let description = $('#description');
        let firstname = $('#firstname');
        let lastname = $('#lastname');
        let cellphone = $('#cellphone');
        let workphone = $('#workphone');
        let email = $('#email');
        let desk = $('#desk');
        let price = $('#price');
        let password = $('#password');
        let confirm_password = $('#confirm_password');
        let address = $('#address');
        let organizer = $('#organizer');
        let start_date = $('#start_date');
        let end_date = $('#end_date');

        let emailRegex = new RegExp(/^[\w\-.]+@([\w-]+\.)+[\w-]{2,4}$/);
        let phoneRegex = new RegExp(/^\([0-9]{3}\) [0-9]{3}\-[0-9]{4}$/);

        if (title.val() !== undefined) {
            if (title.val().length > 256) {
                title.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le titre ne peut pas excéder 256 charactères. *</span>");
                title.select();
                return;
            } else if (title.val().trim().length === 0) {
                title.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le titre ne peut pas être vide. *</span>");
                title.select();
                return;
            }
        }

        if (organizer.val() !== undefined) {
            if (organizer.val().length > 128) {
                organizer.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* L'organisateur ne peut pas excéder 128 charactères. *</span>");
                organizer.select();
                return;
            } else if (organizer.val().trim().length === 0) {
                organizer.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* L'organisateur  ne peut pas être vide. *</span>");
                organizer.select();
                return;
            }
        }

        if (start_date.val() !== undefined) {
            if (start_date.val().trim().length === 0) {
                start_date.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* La date de départ ne peut pas être vide. *</span>");
                start_date.select();
                return;
            }
        }

        if (end_date.val() !== undefined) {
            if (end_date.val().trim().length === 0) {
                end_date.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* La date de fin ne peut pas être vide. *</span>");
                end_date.select();
                return;
            }
        }

        if (address.val() !== undefined) {
            if (address.val().length > 256) {
                address.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* L'adresse ne peut pas excéder 255 charactères. *</span>");
                address.select();
                return;
            } else if (address.val().trim().length === 0) {
                address.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* L'adresse ne peut pas être vide. *</span>");
                address.select();
                return;
            }
        }

        if (link.val() !== undefined) {
            if (link.val().length > 256) {
                link.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le lien ne peut pas excéder 256 charactères. *</span>");
                link.select();
                return;
            } else if (link.val().trim().length === 0) {
                link.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le lien ne peut pas être vide. *</span>");
                link.select();
                return;
            }
        }

        if (category.val() !== undefined) {
            if (category.val().length > 128) {
                category.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* La catégorie ne peut pas excéder 128 charactères. *</span>");
                category.select();
                return;
            } else if (category.val().trim().length === 0 || category.val().trim() === 'undefined') {
                category.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le catégorie ne peut pas être vide. *</span>");
                category.select();
                return;
            }
        }

        if (firstname.val() !== undefined) {
            if (firstname.val().length > 128) {
                firstname.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le prénom ne peut pas excéder 128 charactères. *</span>");
                firstname.select();
                return;
            } else if (firstname.val().trim().length === 0) {
                firstname.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le prénom ne peut pas être vide. *</span>");
                firstname.select();
                return;
            }
        }

        if (lastname.val() !== undefined) {
            if (lastname.val().length > 128) {
                lastname.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le nom de famille ne peut pas excéder 128 charactères. *</span>");
                lastname.select();
                return;
            } else if (lastname.val().trim().length === 0) {
                lastname.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le nom de famille ne peut pas être vide. *</span>");
                lastname.select();
                return;
            }
        }

        if (email.val() !== undefined) {
            if (email.val().length > 255) {
                email.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le courriel ne peut pas excéder 255 charactères. *</span>");
                email.select();
                return;
            } else if (email.val().trim().length === 0) {
                email.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le courriel ne peut pas être vide. *</span>");
                email.select();
                return;
            } else if (!emailRegex.test(email.val())){
                email.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le courriel n'est pas valide. *</span>");
                email.select();
                return
            }
        }

        if (workphone.val() !== undefined) {
            if (workphone.val().length > 15) {
                workphone.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le téléphone ne peut pas excéder 15 chiffres. *</span>");
                workphone.select();
                return;
            } else if (workphone.val().trim().length === 0) {
                workphone.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le téléphone ne peut pas être vide. *</span>");
                workphone.select();
                return;
            } else if (!phoneRegex.test(workphone.val())){
                workphone.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le téléphone invalide. *</span>");
                workphone.select();
                return;
            }
        }

        if (cellphone.val() !== undefined) {
            if (cellphone.val().length > 15) {
                cellphone.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le téléphone cellulaire ne peut pas excéder 15 chiffres. *</span>");
                cellphone.select();
                return;
            } else if (cellphone.val().trim().length === 0) {
                cellphone.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le téléphone cellulaire ne peut pas être vide. *</span>");
                cellphone.select();
                return;
            } else if (!phoneRegex.test(cellphone.val())){
                cellphone.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le téléphone cellulaire invalide. *</span>");
                cellphone.select();
                return;
            }
        }

        if (description.val() !== undefined) {
            // if (description.val().length > 256) {
            //     description.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* La description ne peut pas excéder 256 charactères. *</span>");
            //     description.select();
            //     return;
            // } else
            if (description.val().trim().length === 0) {
                description.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* La description ne peut pas être vide. *</span>");
                description.select();
                return;
            }
        }

        if (price.val() !== undefined) {
            if (price.val().toString().length >= 12 || price.val().toString().length === 0) {
                price.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le prix doit avoir maximum 10 chiffres avant la virgule et deux chiffres après. *</span>");
                price.select();
                return;
            }else if (price.val() < 0) {
                price.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le prix doit être plus grand ou égal à 0. *</span>");
                price.select();
                return;
            }
        }

        if (desk.val() !== undefined) {
            if (desk.val().length > 6) {
                desk.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* Le poste ne peut pas excéder 6 chiffres. *</span>");
                desk.select();
                return;
            }
        }

        if (password.val() !== undefined) {
            if (password.val().trim().length === 0) {
                password.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* La mot de passe ne peut pas être vide. *</span>");
                password.select();
                return;
            } else if (password.val().length > 128) {
                password.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* La mot de passe ne peut pas excéder 128 charactères. *</span>");
                password.select();
                return;
            }
        }

        if (confirm_password.val() !== undefined) {
            if (confirm_password.val().trim().length === 0) {
                confirm_password.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* La confirmation de mot de passe ne peut pas être vide. *</span>");
                confirm_password.select();
                return;
            } else if (confirm_password.val().length > 128) {
                confirm_password.after("<span class=\"text-sm leading-5 text-red-500 error-message\">* La confirmation de mot de passe ne peut pas excéder 128 charactères. *</span>");
                confirm_password.select();
                return;
            }
        }

        $('#Form').submit();
    });
});