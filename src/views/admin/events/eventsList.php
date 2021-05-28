<?php
ob_start();
?>events<?php
$selectedItem = ob_get_clean();
?>
<h3 class="text-gray-700 text-3xl font-medium">Événements</h3>
<div class="mt-8 flex justify-end">
    <a href="<?=$this->router->generate('eventCreate') ?>"
        class="mx-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke="green" stroke-width="2"
                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
    </a>
</div>

<div class="flex flex-col mt-2">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Titre
                        </th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Catégorie
                        </th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Description
                        </th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Publiée
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php foreach ($eventsList as $event) {?>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 font-medium text-gray-900"><?= $event->title ?>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900"><?= $event->category; ?>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <span class="text-sm leading-5 text-gray-900"><?= substr($event->description, 0, 50); ?></span>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= (!$event->hide)? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'?>"><?= (!$event->hide)? "Publiée" : "Non publiée"; ?></span>
                        </td>

                        <!--Action Row-->
                        <td
                            class="flex justify-center px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                            <a href="<?= $this->router->generate('eventUpdate', ['id'=>$event->id]) ?>"
                                class="mx-2 text-gray-200 dark:text-gray-200 hover:text-indigo-200 dark:hover:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke="#4F46E5"
                                        stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </a>
                            <a onclick="getListeInscription(<?=$event->id?>,'<?=$event->title?>')"
                                class="mx-2 text-gray-200 dark:text-gray-200 hover:text-green-300 dark:hover:text-gray-400 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke="green" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </a>
                            <a onclick="validDelete(<?=$event->id?>)"
                                class="mx-2 text-gray-200 dark:text-gray-200 hover:text-red-300 dark:hover:text-gray-400 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke="red" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="modal" class="hidden opacity-0 fixed w-full h-full top-0 left-0 flex items-center justify-center transition">
    <div id="bgModal" class="absolute w-full h-full bg-gray-900 opacity-50 cursor-pointer">
    </div>
    <div class="absolute bg-white w-11/12 md:max-w-screen-md mx-auto rounded shadow-lg overflow-y-auto"
        style="max-height: 90vh;">
        <div class="text-left">
            <div class="flex justify-between items-center pb-5 px-4 pt-4">
                <p id="titreModal" class="text-2xl font-bold">Inscription à l'événement</p>
                <div id="btFermerModal" class="pl-4 cursor-pointer">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full border border-t">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Prénom
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Nom de famille
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Adresse courriel
                            </th>
                        </tr>
                    </thead>
                    <tbody id="listeInscription" class="bg-white">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php ob_start(); ?>
<script>
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'md:w-32 bg-green-500 hover:bg-green-600 text-white font-bold p-2 rounded-lg transition ease-in-out duration-300 mx-4',
            cancelButton: 'md:w-32 bg-red-600 hover:bg-red-700 text-white font-bold p-2 rounded-lg transition ease-in-out duration-300 mx-4'
        },
        buttonsStyling: false
    });

    function validDelete(id) {
        swalWithBootstrapButtons.fire({
            title: 'Voulez vous vraiment supprimer cet évènement?',
            text: "Cette action est irréversible!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Oui, supprimer le!',
            cancelButtonText: 'Non, annuler!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    'Supprimer!',
                    `L'évènement à été supprimé.`,
                    'success'
                );
                window.location = "/admin/event/delete/" + id;
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Annulation',
                    'Ne vous inquiétez pas, rien ne sera supprimé :)',
                    'error'
                );
            }
        })
    }

    function afficherListeInscription() {
        $("#modal").removeClass("hidden");
        setTimeout(() => {
            $("#modal").removeClass("opacity-0");
        }, 30);
    }

    function getListeInscription(id_event, titre) {
        $("#titreModal").text("Inscription à l'événement " + titre);
        $.ajax({
            type: "POST",
            url: "/admin/events/inscription",
            data: {
                id_event
            },
            dataType: "JSON",
            success(data) {
                if (data.length > 0) {
                    $("#listeInscription").children().remove();
                    data.forEach(function(event) {
                        $("#listeInscription").append(`
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">${event.firstname}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">${event.lastname}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <span class="text-sm leading-5 text-gray-900">${event.email}</span>
                                </td>
                            </tr>
                        `);
                    });
                    afficherListeInscription();
                } else {
                    alert("Il n'y a aucune inscription pour cet événement");
                }
            },
        });
    }

    $("#btFermerModal, #bgModal").click(function() {
        $("#modal").addClass("opacity-0");
        setTimeout(() => {
            $("#modal").addClass("hidden");
        }, 200);
    });
</script>
<?php $script = ob_get_clean();
