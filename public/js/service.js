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
            if (data['salairy'] === '0') {
                $('#salairy').text("À discuter");
            } else {
                $('#salairy').text(data['salairy'] + "$/h");
            }
            $('#duration').text(data['duration'] + " semaines");
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
    $("#formulaireinscriptioni").hide();
    $("#msgerreur").hide();
    $("#msgerreuri").hide();

    $("#inscription").click(function (e) {
        $("#formulaireinscription").show();
    })

    $("#inscriptioni").click(function (e) {
        $("#formulaireinscriptioni").show();
    })

    $("#cancel").click(function (e) {
        $("#formulaireinscription").hide();
    })

    $("#canceli").click(function (e) {
        $("#formulaireinscriptioni").hide();
    })

    $("#inscription").click(function (e) {
        $("#formulaireinscription").show();
    })

    $("#errorclose").click(function (e) {
        $("#msgerreur").hide();
    })


let lundi, mardi, mercredi, jeudi, vendredi
$("#lundi").change(function(e)
{
    lundi = $("#lundi").prop('checked'); 
    if($("#lundi").prop('checked'))
    {
        $(".inputlundi").prop('disabled', false); 
        lundi = "Disponible"
    }
    else
    {
       $(".inputlundi").prop('disabled', true); 
       $(".inputlundi").val(""); 
    }
})

$("#mardi").change(function(e)
{
    mardi = $("#mardi").prop('checked'); 
    if($("#mardi").prop('checked'))
    {
        $(".inputmardi").prop('disabled', false); 
        lundi = "Disponible"
    }
    else
    {
       $(".inputmardi").prop('disabled', true); 
       $(".inputmardi").val(""); 
    }
})

$("#mercredi").change(function(e)
{
    mercredi = $("#mercredi").prop('checked'); 
    if($("#mercredi").prop('checked'))
    {
        $(".inputmercredi").prop('disabled', false); 
        mercredi = "Disponible"
    }
    else
    {
       $(".inputmercredi").prop('disabled', true); 
       $(".inputmercredi").val(""); 
    }
})

$("#jeudi").change(function(e)
{
    jeudi = $("#jeudi").prop('checked'); 
    if($("#jeudi").prop('checked'))
    {
        $(".inputjeudi").prop('disabled', false); 
        jeudi = "Disponible"
    }
    else
    {
       $(".inputjeudi").prop('disabled', true); 
       $(".inputjeudi").val(""); 
    }
})

$("#vendredi").change(function(e)
{
    vendredi = $("#vendredi").prop('checked'); 
    if($("#vendredi").prop('checked'))
    {
        $(".inputvendredi").prop('disabled', false); 
        vendredi = "Disponible"
    }
    else
    {
       $(".inputvendredi").prop('disabled', true); 
       $(".inputvendredi").val(""); 
    }
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
            e.preventDefault()
        } else if (prenom.length == 0) {
            $("#message").replaceWith('<span class="block sm:inline" id = "message">Le champs prénom ne peut pas être vide.</span>');
            $("#msgerreur").show();
            e.preventDefault()
        } else if (nom.length == 0) {
            $("#message").replaceWith('<span class="block sm:inline" id = "message">Le champs nom ne peut pas être vide.</span>');
            $("#msgerreur").show();
            e.preventDefault()
        } else if (courriel.length == 0) {
            $("#message").replaceWith('<span class="block sm:inline" id = "message">Le champs courriel ne peut pas être vide.</span>');
            $("#msgerreur").show();
            e.preventDefault()
        } else if (nom.length > 250) {
            $("#message").replaceWith('<span class="block sm:inline" id = "message">Le champs nom ne peut pas être excéder plus de 250 caractères.</span>');
            $("#msgerreur").show();
            e.preventDefault()
        } else if (prenom.length > 250) {
            $("#message").replaceWith('<span class="block sm:inline" id = "message">Le champs prénom ne peut pas être excéder plus de 250 caractères.</span>');
            $("#msgerreur").show();
            e.preventDefault()
        } else if (courriel.length > 250) {
            $("#message").replaceWith('<span class="block sm:inline" id = "message">Le champs courriel ne peut pas être excéder plus de 250 caractères.</span>');
            $("#msgerreur").show();
            e.preventDefault()
        } else {
            type = $('#typeinscription').find(":selected").val();
            cours = $('#cours').find(":selected").val();
        }

    })

    $("#confirmi").click(function (e) {
        let matriculei, nomi, prenomi, courrieli, lundi, mardi, mercredi, jeudi, vendredi, debut, fin;

        matriculei = $("#matriculei").val().trim();
        nomi = $("#nomi").val().trim();
        prenomi = $("#prenomi").val().trim();
        courrieli = $("#emaili").val().trim();
        lundi = $("#lundi").prop('checked');
        mardi = $("#mardi").prop('checked');
        mercredi = $("#mercredi").prop('checked');
        jeudi = $("#jeudi").prop('checked');
        vendredi = $("#vendredi").prop('checked');


        if (matriculei.length != 7) {
            $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">Le champs matricule doit contenir 7 chiffres.</span>');
            $("#msgerreuri").show();
            e.preventDefault()
        } else if (prenomi.length == 0) {
            $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">Le champs prénom ne peut pas être vide.</span>');
            $("#msgerreuri").show();
            e.preventDefault()
        } else if (nomi.length == 0) {
            $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">Le champs nom ne peut pas être vide.</span>');
            $("#msgerreuri").show();
            e.preventDefault()
        } else if (courrieli.length == 0) {
            $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">Le champs courriel ne peut pas être vide.</span>');
            $("#msgerreuri").show();
            e.preventDefault()
        } else if (nomi.length > 250) {
            $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">Le champs nom ne peut pas être excéder plus de 250 caractères.</span>');
            $("#msgerreuri").show();
            e.preventDefault()
        } else if (prenomi.length > 250) {
            $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">Le champs prénom ne peut pas être excéder plus de 250 caractères.</span>');
            $("#msgerreuri").show();
            e.preventDefault()
        } else if (courrieli.length > 250) {
            $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">Le champs courriel ne peut pas être excéder plus de 250 caractères.</span>');
            $("#msgerreuri").show();
            e.preventDefault()
        } else {
            type = $('#typeinscription').find(":selected").val();
            cours = $('#cours').find(":selected").val();
        }

        if(lundi){
            if($("#lundi_start_date").val() == "" || $("#lundi_end_date").val() == ""){
                $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">les champs heures de lundi ne sont pas complets.</span>');
                $("#msgerreuri").show();
                e.preventDefault();
            } else if($("#lundi_start_date").val() >= $("#lundi_end_date").val()){
                $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">l\'heure de debut de lundi doit etre avant celle de fin.</span>');
                $("#msgerreuri").show();
                e.preventDefault();
            }
        }

        if(mardi){
            if($("#mardi_start_date").val() == "" || $("#mardi_end_date").val() == ""){
                $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">les champs heures de mardi ne sont pas complets.</span>');
                $("#msgerreuri").show();
                e.preventDefault();
            } else if($("#lundi_start_date").val() >= $("#lundi_end_date").val()){
                $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">l\'heure de debut de mardi doit etre avant celle de fin.</span>');
                $("#msgerreuri").show();
                e.preventDefault();
            }
        }

        if(mercredi){
            if($("#mercredi_start_date").val() == "" || $("#mercredi_end_date").val() == ""){
                $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">les champs heures de mercredi ne sont pas complets.</span>');
                $("#msgerreuri").show();
                e.preventDefault();
            } else if($("#mercredi_start_date").val() >= $("#mercredi_end_date").val()){
                $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">l\'heure de debut de mercredi doit etre avant celle de fin.</span>');
                $("#msgerreuri").show();
                e.preventDefault();
            }
        }

        if(jeudi){
            if($("#jeudi_start_date").val() == "" || $("#jeudi_end_date").val() == ""){
                $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">les champs heures de jeudi ne sont pas complets.</span>');
                $("#msgerreuri").show();
                e.preventDefault();
            } else if($("#jeudi_start_date").val() >= $("#jeudi_end_date").val()){
                $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">l\'heure de debut de jeudi doit etre avant celle de fin.</span>');
                $("#msgerreuri").show();
                e.preventDefault();
            }
        }

        if(vendredi){
            debugger;
            if($("#vendredi_start_date").val() == "" || $("#vendredi_end_date").val() == ""){
                $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">les champs heures de vendredi ne sont pas complets.</span>');
                $("#msgerreuri").show();
                e.preventDefault();
            } else if($("#vendredi_start_date").val() >= $("#vendredi_end_date").val()){
                $("#messagei").replaceWith('<span class="block sm:inline" id = "messagei">l\'heure de debut de vendredi doit etre avant celle de fin.</span>');
                $("#msgerreuri").show();
                e.preventDefault();
            }
        }

    })
})
