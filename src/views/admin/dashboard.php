<?php
ob_start();
?>dashboard<?php
$selectedItem = ob_get_clean();
?>
<style>
    [x-cloak] {
        display: none;
    }
</style>
<h3 class="text-gray-700 text-3xl font-medium">Tableau de bord</h3>
<div class="mt-4">
    <div class="flex flex-wrap -mx-6">
        <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
            <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>

                <div class="mx-5">
                    <h4 class="text-2xl font-semibold text-gray-700"><?= $counts[0]["adminsCount"] ?></h4>
                    <div class="text-gray-500">Administrateurs</div>
                </div>
            </div>
        </div>

        <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
            <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                <div class="p-3 rounded-full bg-orange-600 bg-opacity-75">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>

                    </svg>
                </div>

                <div class="mx-5">
                    <h4 class="text-2xl font-semibold text-gray-700"><?= $counts[0]["newsCount"] ?></h4>
                    <div class="text-gray-500">Actualités</div>
                </div>
            </div>
        </div>

        <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
            <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>

                <div class="mx-5">
                    <h4 class="text-2xl font-semibold text-gray-700"><?= $counts[0]["eventsCount"] ?></h4>
                    <div class="text-gray-500">Événements</div>
                </div>
            </div>
        </div>

        <div class="antialiased sans-serif mx-2 -mt-12">
            <div x-data="app({ events : <?= str_replace('"', "'", $events) ?> })" x-init="[initDate(), getNoOfDays()]"
                 x-cloak>
                <div class="container mx-auto px-4 py-16">
                    <div class="text-gray-700 mb-2 text-2xl font-medium">
                        Calendrier
                    </div>

                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="flex items-center justify-between py-2 px-6">
                            <div>
                                <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                            </div>
                            <div class="border rounded-lg px-1" style="padding-top: 2px;">
                                <button
                                        type="button"
                                        class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center"
                                        :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                        :disabled="month == 0 ? true : false"
                                        @click="month--; getNoOfDays()">
                                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </button>
                                <div class="border-r inline-flex h-6"></div>
                                <button
                                        type="button"
                                        class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1"
                                        :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                        :disabled="month == 11 ? true : false"
                                        @click="month++; getNoOfDays()">
                                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="-mx-1 -mb-1">
                            <div class="flex flex-wrap" style="margin-bottom: -40px;">
                                <template x-for="(day, index) in DAYS" :key="index">
                                    <div style="width: 14.26%" class="px-2 py-2">
                                        <div
                                                x-text="day"
                                                class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center"></div>
                                    </div>
                                </template>
                            </div>

                            <div class="flex flex-wrap border-t border-l">
                                <template x-for="blankday in blankdays">
                                    <div
                                            style="width: 14.28%; height: 120px"
                                            class="text-center border-r border-b px-4 pt-2"
                                    ></div>
                                </template>
                                <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                    <div style="width: 14.28%; height: 120px"
                                         class="px-4 pt-2 border-r border-b relative">
                                        <div
                                                x-text="date"
                                                class="inline-flex w-6 h-6 items-center justify-center cursor-pointer text-center leading-none rounded-full transition ease-in-out duration-100"
                                                :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700': isToday(date) == false }"
                                        ></div>
                                        <div style="height: 80px;" class="overflow-y-auto mt-1">
                                            <div
                                                    class="absolute top-0 right-0 mt-2 mr-2 inline-flex items-center justify-center rounded-full text-sm w-6 h-6 bg-gray-700 text-white leading-none"
                                                    x-show="events.filter(e => e.start_date === new Date(year, month, date).toDateString()).length"
                                                    x-text="events.filter(e => e.start_date === new Date(year, month, date).toDateString()).length"></div>

                                            <template
                                                    x-for="event in events.filter(e => new Date(e.start_date).toDateString() ===  new Date(year, month, date).toDateString())">
                                                <div @click="showEventModal(event)"
                                                     class="px-2 py-1 rounded-lg mt-1 overflow-hidden border"
                                                     :class="{
                                                     'border-blue-200 text-blue-800 bg-blue-100 hover:bg-blue-300': event.category === 'Technologie',
                                                     'border-red-200 text-red-800 bg-red-100 hover:bg-red-300': event.category === 'Sport',
                                                     'border-yellow-200 text-yellow-800 bg-yellow-100 hover:bg-yellow-300': event.category === 'Jeux vidéo',
                                                     'border-green-200 text-green-800 bg-green-100 hover:bg-green-300': event.category === 'Entreprenariat',
                                                     'border-purple-200 text-purple-800 bg-purple-100 hover:bg-purple-300': event.category === 'Webinaire',
                                                     'border-orange-200 text-orange-800 bg-orange-100 hover:bg-orange-300': event.category === 'Science',
                                                     'border-pink-200 text-pink-800 bg-pink-100 hover:bg-pink-300': event.category === 'Spectacle',
                                                     'border-indigo-200 text-indigo-800 bg-indigo-100 hover:bg-indigo-300': event.category === 'Conférence'
                                                     }"
                                                >
                                                    <p x-text="event.title"
                                                       class="text-sm truncate leading-tight"></p>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div style=" background-color: rgba(0, 0, 0, 0.8)"
                     class="fixed z-40 top-0 right-0 left-0 bottom-0 h-full w-full overflow-y-scroll"
                     x-show.transition.opacity="openEventModal">
                    <div class="p-4 max-w-xl mx-auto relative absolute left-0 right-0 overflow-hidden mt-24">
                        <div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer"
                             x-on:click="openEventModal = !openEventModal">
                            <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                        d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z"/>
                            </svg>
                        </div>

                        <div class="shadow w-full rounded-lg bg-white overflow-hidden w-full block p-8">

                            <h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2">Détails d'événement</h2>

                            <div class="mb-4">
                                <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Titre</label>
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-600"
                                       type="text" x-model="title" readonly>
                            </div>

                            <div class="mb-4">
                                <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Organisé
                                    par</label>
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-600"
                                       type="text" x-model="organizer" readonly>
                            </div>

                            <div class="mb-4">
                                <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Adresse</label>
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-600"
                                       type="text" x-model="address" readonly>
                            </div>

                            <div class="mb-4">
                                <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Prix</label>
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-600"
                                       type="text" x-model="price" readonly>
                            </div>

                            <div class="mb-4 flex">
                                <div class="mr-auto">
                                    <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Date de
                                        début</label>
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-600"
                                           type="text" x-model="start_date" readonly>
                                </div>
                                <div class="ml-auto">
                                    <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Date de
                                        fin</label>
                                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-600"
                                           type="text" x-model="end_date" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Modal -->
            </div>
        </div>
    </div>

    <script>
        const MONTH_NAMES = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
        const DAYS = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];

        function app(e) {
            return {
                month: '',
                year: '',
                no_of_days: [],
                blankdays: [],
                days: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
                events: e.events,
                title: '',
                start_date: '',
                end_date: '',
                category: 'Technologie',
                organizer: '',
                address: '',
                price: '',
                openEventModal: false,

                initDate() {
                    let today = new Date();
                    this.month = today.getMonth();
                    this.year = today.getFullYear();
                    this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                },

                isToday(date) {
                    const today = new Date();
                    const d = new Date(this.year, this.month, date);

                    return today.toDateString() === d.toDateString();
                },

                showEventModal(event) {
                    // open the modal
                    this.openEventModal = true;
                    this.start_date = event.start_date;
                    this.end_date = event.end_date;
                    this.title = event.title;
                    this.category = event.category;
                    this.address = event.address;
                    this.organizer = event.organizer;
                    this.price = event.price + '$';
                },

                getNoOfDays() {
                    let i;
                    let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                    // find where to start calendar day of week
                    let dayOfWeek = new Date(this.year, this.month).getDay();
                    let blankdaysArray = [];
                    for (i = 1; i <= dayOfWeek; i++) {
                        blankdaysArray.push(i);
                    }

                    let daysArray = [];
                    for (i = 1; i <= daysInMonth; i++) {
                        daysArray.push(i);
                    }

                    this.blankdays = blankdaysArray;
                    this.no_of_days = daysArray;
                }
            }
        }
    </script>

