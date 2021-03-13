<?php
ob_start();
?>events<?php
$selectedItem = ob_get_clean();
?>
    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="mt-10 sm:mt-0">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form id="Form" action="<?= $this->router->generate('eventUpdated') ?>" method="POST" enctype="multipart/form-data">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                                <input type="text" name="title" id="title" autocomplete="title"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="<?=$event->title?>">
                            </div>

                            <input type="hidden" name="publisher_id">

                            <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                <label for="organizer"
                                       class="block text-sm font-medium text-gray-700">Organisateur</label>
                                <input type="text" name="organizer" id="organizer"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="<?= $event->organizer ?>">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                                <div x-data="select({ data : setEventCategorySelectBox(), emptyOptionsMessage: 'Aucun donnée disponible.', name: 'category', placeholder: 'Sélectionnez une catégorie', value: getEventKey('<?= $event->category ?>')})"
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

                            <div class="col-span-6 sm:col-span-3">
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Début</label>
                                <input type="datetime-local" name="start_date" id="start_date"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="<?=date("Y-m-d\TH:i:s", strtotime($event->start_date)) ?>">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="end_date" class="block text-sm font-medium text-gray-700">Fin</label>
                                <input type="datetime-local" name="end_date" id="end_date"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="<?= date("Y-m-d\TH:i:s", strtotime($event->end_date)) ?>">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                                <input type="text" name="address" id="address" autocomplete="address"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="<?= $event->address ?>">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="link" class="block text-sm font-medium text-gray-700">Lien</label>
                                <input type="text" name="link" id="link" autocomplete="link"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="<?= $event->link ?>">
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                <label for="description"
                                       class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" rows="4" autocomplete="description"
                                          class="mt-1 p-1.5 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                          ><?= $event->description ?></textarea>
                            </div>


                            <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                <label for="price" class="block text-sm font-medium text-gray-700">Prix</label>
                                <input type="number" step="0.01" min="0" name="price" id="price" autocomplete="price"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="<?= $event->price ?>">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                <label for="hide" class="block text-sm font-medium text-gray-700 mr-2">Ne pas publier</label>
                                <input type="checkbox" name="hide" id="hide" value="1"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 w-5 h-5 shadow-sm sm:text-sm border-gray-300 rounded-md"<?= $event->hide ? 'checked':''?>>
                            </div>

                            <div class="bg-white p7 rounded col-span-6 sm:col-span-6">
                                <label class="block text-sm font-medium text-gray-700">
                                    Photo de couverture
                                </label>
                                <div x-data="dataFileDnD()"
                                     class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
                                    <div x-ref="dnd"
                                         class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
                                        <input accept="image/*" type="file"
                                               class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                                               @change="addFiles($event)"
                                               @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                                               @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                               @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                               name="file"
                                               required>
                                        <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                     fill="none" viewBox="0 0 48 48"
                                                     aria-hidden="true">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                          stroke-width="2" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="file-upload"
                                                           class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                        <span>Téléverser un fichier</span>
                                                    </label>
                                                    <p class="pl-1"> ou glisser et déposer</p>
                                                </div>
                                                <p class="text-xs text-gray-500">
                                                    PNG, JPG, GIF jusqu'à 10MB
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <template x-if="files.length > 0">
                                        <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6"
                                             @drop.prevent="drop($event)"
                                             @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                                            <template x-for="(_, index) in Array.from({ length: files.length })">
                                                <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                                     style="padding-top: 100%;" @dragstart="dragstart($event)"
                                                     @dragend="fileDragging = null"
                                                     :class="{'border-blue-600': fileDragging == index}"
                                                     draggable="true"
                                                     :data-index="index">
                                                    <button class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                                            type="button" @click="remove(index)">
                                                        <svg class="w-4 h-4 text-gray-700"
                                                             xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                    <template x-if="files[index].type.includes('audio/')">
                                                        <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                             xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 24 24"
                                                             stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                                        </svg>
                                                    </template>
                                                    <template
                                                            x-if="files[index].type.includes('application/') || files[index].type === ''">
                                                        <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                             xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 24 24"
                                                             stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                        </svg>
                                                    </template>
                                                    <template x-if="files[index].type.includes('image/')">
                                                        <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                                             x-bind:src="loadFile(files[index])"/>
                                                    </template>
                                                    <template x-if="files[index].type.includes('video/')">
                                                        <video
                                                                class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                                            <fileDragging x-bind:src="loadFile(files[index])"
                                                                          type="video/mp4">
                                                        </video>
                                                    </template>
                                                    <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                                    <span class="w-full font-bold text-gray-900 truncate"
                                                          x-text="files[index].name">Loading</span>
                                                        <span class="text-xs text-gray-900"
                                                              x-text="humanFileSize(files[index].size)">...</span>
                                                    </div>
                                                    <div class="absolute inset-0 z-40 transition-colors duration-300"
                                                         @dragenter="dragenter($event)"
                                                         @dragleave="fileDropping = null"
                                                         :class="{'bg-blue-200 bg-opacity-80': fileDropping == index && fileDragging != index}">
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="send" class="px-4 py-3 bg-gray-50 text-right sm:px-6">
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

<?php ob_start(); ?>
    <script src="/js/selectSearchBox.js"></script>
    <script src="/js/dragableFile.js"></script>
    <script src="/js/formValidator.js"></script>
<?php $script = ob_get_clean(); ?>
