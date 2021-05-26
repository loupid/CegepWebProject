<?php
ob_start();
?>job<?php
$selectedItem = ob_get_clean();
?>
<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
        <div class="border-t border-gray-200"></div>
    </div>
</div>

<div class="mt-10 sm:mt-0">
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form id="Form" action="<?= $this->router->generate('jobCreated') ?>" method="POST"
              enctype="multipart/form-data">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                            <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                            <input type="text" name="title" id="title" autocomplete="title"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                            <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                            <div x-data="select({ data : setJobCategorySelectBox(), emptyOptionsMessage: 'Aucun donnée disponible.', name: 'category', placeholder: 'Sélectionnez une catégorie', value: 'stage'})"
                                 x-init="init()"
                                 @click.away="closeListbox()"
                                 @keydown.escape="closeListbox()"
                                 class="relative mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <span class="inline-block w-full rounded-md shadow-sm">
                                    <button x-ref="button"
                                            @click="toggleListboxVisibility()"
                                            :aria-expanded="open"
                                            type="button"
                                            aria-haspopup="listbox"
                                            class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md cursor-default focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                        <span x-show="! open"
                                              x-text="value in options ? options[value] : placeholder"
                                              :class="{ 'text-gray-500': ! (value in options) }"
                                              class="block truncate"></span>
                                        <input x-ref="search"
                                               x-show="open"
                                               x-model="search"
                                               @keydown.enter.stop.prevent="selectOption()"
                                               @keydown.arrow-up.prevent="focusPreviousOption()"
                                               @keydown.arrow-down.prevent="focusNextOption()"
                                               type="search"
                                               class="w-full h-full form-control focus:outline-none"/>
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="none"
                                                 stroke="currentColor">
                                                <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5"
                                                      stroke-linecap="round"
                                                      stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </span>
                                <input type="hidden" name="category" id="category" x-bind:value="options[value]">
                                <div x-show="open"
                                     x-transition:leave="transition ease-in duration-100"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     x-cloak
                                     class="absolute z-10 w-full mt-1 bg-white rounded-md shadow-lg">
                                    <ul x-ref="listbox"
                                        @keydown.enter.stop.prevent="selectOption()"
                                        @keydown.arrow-up.prevent="focusPreviousOption()"
                                        @keydown.arrow-down.prevent="focusNextOption()"
                                        role="listbox"
                                        :aria-activedescendant="focusedOptionIndex ? name + 'Option' + focusedOptionIndex : null"
                                        tabindex="-1"
                                        class="py-1 overflow-auto text-base leading-6 rounded-md shadow-xs max-h-60 focus:outline-none sm:text-sm sm:leading-5">
                                        <template x-for="(key, index) in Object.keys(options)" :key="index">
                                            <li :id="name + 'Option' + focusedOptionIndex"
                                                @click="selectOption()"
                                                @mouseenter="focusedOptionIndex = index"
                                                @mouseleave="focusedOptionIndex = null"
                                                role="option"
                                                :aria-selected="focusedOptionIndex === index"
                                                :class="{ 'text-white bg-indigo-600': index === focusedOptionIndex, 'text-gray-900': index !== focusedOptionIndex }"
                                                class="relative py-2 pl-3 text-gray-900 cursor-default select-none pr-9">
                                                <span x-text="Object.values(options)[index]"
                                                      :class="{ 'font-semibold': index === focusedOptionIndex, 'font-normal': index !== focusedOptionIndex }"
                                                      class="block font-normal truncate"></span>
                                                <span x-show="key === value"
                                                      :class="{ 'text-white': index === focusedOptionIndex, 'text-indigo-600': index !== focusedOptionIndex }"
                                                      class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                                                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                </span>
                                            </li>
                                        </template>
                                        <div x-show="! Object.keys(options).length"
                                             x-text="emptyOptionsMessage"
                                             class="px-3 py-2 text-gray-900 cursor-default select-none"></div>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-4 col-span-6 lg:col-span-2">
                            <label for="organizer"
                                   class="block text-sm font-medium text-gray-700">Employeur</label>
                            <input type="text" name="employer" id="employer" value=""
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-4 col-span-6 lg:col-span-2">
                            <label for="city"
                                   class="block text-sm font-medium text-gray-700">Ville</label>
                            <input type="text" name="city" id="city"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-4 col-span-6 lg:col-span-2">
                            <label for="price" class="block text-sm font-medium text-gray-700">Salaire</label>
                            <input type="number" step="0.01" min="0" max="9999999999.99" name="salairy" id="salairy"
                                   autocomplete="price"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                            <label for="email"
                                   class="block text-sm font-medium text-gray-700">Courriel</label>
                            <input type="text" name="email" id="email"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                            <label for="phone"
                                   class="block text-sm font-medium text-gray-700">Téléphone</label>
                            <input type="text" name="phone" id="phone"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                            <label for="start" class="block text-sm font-medium text-gray-700">Début</label>
                            <input type="datetime-local" name="start" id="start"
                                   :min="new Date().toISOString().slice(0,-8)"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                            <label for="duration" class="block text-sm font-medium text-gray-700">Durée (Semaine)</label>
                            <input type="number" name="duration" id="duration" min="0"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                            <label for="description"
                                   class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" autocomplete="description"
                                      class="mt-1 p-1.5 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                            <label for="skills"
                                   class="block text-sm font-medium text-gray-700">Compétences</label>
                            <textarea name="skills" id="skills" rows="4" autocomplete="description"
                                      class="mt-1 p-1.5 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                            <label for="hide" class="block text-sm font-medium text-gray-700 mr-2">Ne pas
                                publier</label>
                            <input type="checkbox" name="hide" id="hide"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 w-5 h-5 shadow-sm sm:text-sm border-gray-300 rounded-md">
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
<script src="/js/selectSearchBox.js"></script>
<script src="/js/dragableFile.js"></script>
<script src="/js/formValidator.js"></script>
<?php $script = ob_get_clean(); ?>
