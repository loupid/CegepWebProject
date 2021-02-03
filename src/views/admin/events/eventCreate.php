<?php
ob_start();
?>events<?php
$selectedItem = ob_get_clean();
dump(\controllers\Controller::breadcrum());
?>
<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
        <div class="border-t border-gray-200"></div>
    </div>
</div>

<div class="mt-10 sm:mt-0">
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="#" method="POST">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                            <input type="text" name="title" id="title" autocomplete="title"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                            <label for="organizer" class="block text-sm font-medium text-gray-700">Organisateur</label>
                            <input type="text" name="organizer" id="organizer"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                            <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                            <input type="text" name="category" id="category"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Début</label>
                            <input type="datetime-local" name="start_date" id="start_date"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="end_date" class="block text-sm font-medium text-gray-700">Fin</label>
                            <input type="datetime-local" name="end_date" id="end_date"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                            <input type="text" name="address" id="address" autocomplete="address"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="link" class="block text-sm font-medium text-gray-700">Lien</label>
                            <input type="text" name="link" id="link" autocomplete="link"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" autocomplete="description"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required></textarea>
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                            <label for="price" class="block text-sm font-medium text-gray-700">Prix</label>
                            <input type="number" step="0.01" min="0" name="price" id="price" autocomplete="price"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
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

