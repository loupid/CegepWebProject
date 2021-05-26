function openModal(key, id) {
    $.ajax({
        url: '/job',
        method: 'post',
        data: {
            id: id,
        }
        ,
        success: function (result) {
            data = JSON.parse(result)
            $('#title').text(data['title']);
            $('#employer').text(data['employer']);
            $('#category').text(data['category']);
            $('#phone').text(data['phone']);
            $('#email_modal').text(data['email']);
            $('#salairy').text(data['salairy']);
            $('#duration').text(data['duration']);
            $('#description').text(data['description']);
            $('#skills').text(data['skills']);
            document.getElementById(key).showModal();
            document.body.setAttribute('style', 'overflow: hidden;');
            document.getElementById(key).children[0].scrollTop = 0;
            document.getElementById(key).children[0].classList.remove('opacity-0');
            document.getElementById(key).children[0].classList.add('opacity-100')

        }
        ,
        error: function ($result) {
            debugger
        }
    })
    ;

}

function modalClose(key) {
    document.getElementById(key).children[0].classList.remove('opacity-100');
    document.getElementById(key).children[0].classList.add('opacity-0');
    setTimeout(function () {
        document.getElementById(key).close();
        document.body.removeAttribute('style');
    }, 100);
}


$(document).ready(function (e) {
    $("#formulaireinscription").hide();
    $("#msgerreur").hide();

    $("#inscription").click(function (e) {
        $("#formulaireinscription").show();
    })

    $("#cancel").click(function (e) {
        $("#formulaireinscription").hide();
    })

    $("#inscription").click(function (e) {
        $("#formulaireinscription").show();
    })

    $("#errorclose").click(function (e) {
        $("#msgerreur").hide();
    })


    $("#confirm").click(function (e) {
        let matricule, nom, prenom, courriel, type, cours;

        matricule = $("#matricule").val().trim();
        nom = $("#nom").val().trim();
        prenom = $("#prenom").val().trim();
        courriel = $("#email").val().trim();
        type = $("#typeinscription").val().trim();
        cours = $("#cours").val().trim();


        if (matricule.length != 7) {
            $("#message").replaceWith('<span class="block sm:inline" id = "message">Le champs matricule doit contenir 7 chiffres.</span>');
            $("#msgerreur").show();
        } else if (prenom.length == 0) {
            $("#message").replaceWith('<span class="block sm:inline" id = "message">Le champs prénom ne peut pas être vide.</span>');
            $("#msgerreur").show();
        } else if (nom.length == 0) {
            $("#message").replaceWith('<span class="block sm:inline" id = "message">Le champs nom ne peut pas être vide.</span>');
            $("#msgerreur").show();
        } else if (courriel.length == 0) {
            $("#message").replaceWith('<span class="block sm:inline" id = "message">Le champs courriel ne peut pas être vide.</span>');
            $("#msgerreur").show();
        } else if (nom.length > 250) {
            $("#message").replaceWith('<span class="block sm:inline" id = "message">Le champs nom ne peut pas être excéder plus de 250 caractères.</span>');
            $("#msgerreur").show();
        } else if (prenom.length > 250) {
            $("#message").replaceWith('<span class="block sm:inline" id = "message">Le champs prénom ne peut pas être excéder plus de 250 caractères.</span>');
            $("#msgerreur").show();
        } else if (courriel.length > 250) {
            $("#message").replaceWith('<span class="block sm:inline" id = "message">Le champs courriel ne peut pas être excéder plus de 250 caractères.</span>');
            $("#msgerreur").show();
        } else {
            type = $('#typeinscription').find(":selected").val();
            cours = $('#cours').find(":selected").val();
        }


    })
})
