<?php
ob_start();
?>links<?php
$selectedItem = ob_get_clean();
?>

<h3 class="text-gray-700 text-3xl font-medium">Liens utiles</h3>
<div class="mt-8 flex justify-end">
    <a href="<?= $this->router->generate('linksCreate') ?>" class="mx-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke="green" stroke-width="2"
                  d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
    </a>
</div>

<div class="flex flex-col mt-2">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
                <thead>
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Titre
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Catégorie
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Description
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Lien
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                </tr>
                </thead>
                <tbody class="bg-white">
                <?php foreach ($linkList as $link){?>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900"><?= $link->title; ?></div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900"><?= $link->category; ?></div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <span class="text-sm leading-5 text-gray-900"><?= substr($link->description, 0, 50); ?></span>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <span class="text-sm leading-5 text-gray-900"><a href="//<?= $link->link; ?>" target="_blank">Consulter</a></span>
                        </td>

                        <!--Action Row-->
                        <td class="flex justify-center px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                            <a href="<?= $this->router->generate('linksUpdate', ['id'=>$link->id]) ?>" class="mx-2 text-gray-200 dark:text-gray-200 hover:text-indigo-200 dark:hover:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke="#4F46E5" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            <a onclick="validDelete(<?=$link->id?>)" class="mx-2 text-gray-200 dark:text-gray-200 hover:text-red-300 dark:hover:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke="red" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
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

<script>
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'md:w-32 bg-green-500 hover:bg-green-600 text-white font-bold p-2 rounded-lg transition ease-in-out duration-300 mx-4',
            cancelButton: 'md:w-32 bg-red-600 hover:bg-red-700 text-white font-bold p-2 rounded-lg transition ease-in-out duration-300 mx-4'
        },
        buttonsStyling: false
    });

    function validDelete(id){
        swalWithBootstrapButtons.fire({
            title: 'Voulez vous vraiment supprimer ce lien?',
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
                    `Le lien à été supprimé.`,
                    'success'
                );
                window.location = "/admin/links/delete/"+id ;
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Annulation',
                    'Ne vous inquiétez pas, rien ne sera supprimé :)',
                    'error'
                )
            }
        })
    }
</script>