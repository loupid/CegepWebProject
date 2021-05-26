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
            $('#email').text(data['email']);
            $('#salairy').text(data['salairy']);
            $('#duration').text(data['duration']);
            $('#description').text(data['description']);


        }
        ,
        error: function ($result) {
            debugger
        }
    })
    ;
    document.getElementById(key).showModal();
    document.body.setAttribute('style', 'overflow: hidden;');
    document.getElementById(key).children[0].scrollTop = 0;
    document.getElementById(key).children[0].classList.remove('opacity-0');
    document.getElementById(key).children[0].classList.add('opacity-100')
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

    $("#inscription").on('click', function (e) {
        debugger
        $("#formulaireinscription").show();
    })

    $("#cancel").click(function (e) {
        $("#formulaireinscription").hide();
    })
})
