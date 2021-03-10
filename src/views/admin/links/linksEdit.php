<?php
ob_start();
?>links<?php
$selectedItem = ob_get_clean();
?>
<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
        <div class="border-t border-gray-200"></div>
    </div>
</div>

<div class="mt-10 sm:mt-0">
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form id="Form" action="<?= $this->router->generate('linksUpdated') ?>" method="POST">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                            <input type="text" name="title" id="title" autocomplete="title"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                   value="<?= $link->title ?>" maxlength="256">
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                            <label for="link" class="block text-sm font-medium text-gray-700">Lien/source</label>
                            <input type="text" name="link" id="link"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                   value="<?= $link->link ?>" maxlength="256">
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                            <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                            <input type="text" name="category" id="category"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                   value="<?= $link->category ?>" maxlength="256">
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="8" autocomplete="description"
                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-1.5"
                                      maxlength="256"><?= $link->description ?></textarea>
                        </div>

                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button id="send" type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Sauvegarder
                        </button>
                    </div>
                </div>
        </form>
    </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
        <div class="border-t border-gray-200"></div>
    </div>
</div>


<?php ob_start(); ?>
<script src="/js/formValidator.js"></script>
<?php $script = ob_get_clean(); ?>



