<?php
ob_start();
?>adminList<?php
$selectedItem = ob_get_clean();
?>
    <h3 class="text-gray-700 text-3xl font-medium">Ajout d'administateur</h3>
    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>
    <div class="mt-10 sm:mt-0">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form id="Form" action="<?= $this->router->generate('adminCreated') ?>" method="POST" name="createAdmin">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="firstname" class="block text-sm font-medium text-gray-700">Prénom</label>
                                <input type="text" name="firstname" id="firstname" autocomplete="given-name"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="lastname" class="block text-sm font-medium text-gray-700">Nom</label>
                                <input type="text" name="lastname" id="lastname" autocomplete="family-name"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="email" class="block text-sm font-medium text-gray-700">Courriel</label>
                                <input type="email" name="email" id="email" autocomplete="email"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                            </div>

                            <div class="lg:col-span-2"></div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                <label for="workphone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                                <input type="text" name="workphone" id="workphone" autocomplete="phone"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       pattern="^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$|^\d{10}$"
                                       placeholder="(123) 456-7890">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-1">
                                <label for="desk" class="block text-sm font-medium text-gray-700">Poste</label>
                                <input type="text" name="desk" id="desk"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                <label for="cellphone"
                                       class="block text-sm font-medium text-gray-700">Cellulaire</label>
                                <input type="text" name="cellphone" id="cellphone" autocomplete="phone"
                                       pattern="^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$|^\d{10}$"
                                       placeholder="(123) 456-7890"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="lg:col-span-2"></div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="password" class="block text-sm font-medium text-gray-700">Mot de
                                    passe</label>
                                <input type="password" name="password" id="password" autocomplete="password"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirmer
                                    le
                                    mot de passe</label>
                                <input type="password" name="confirm_password" id="confirm_password"
                                       autocomplete="password"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Actif</label>
                                <input type="checkbox" name="status" id="status" value="1" checked
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 w-5 h-5 shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
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