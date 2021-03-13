<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Département d'informatique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/tailwind.css" type="text/css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css"/>
    <!-- component -->
    <link rel="stylesheet" href="https://pagecdn.io/lib/font-awesome/5.10.0-11/css/all.min.css"
          integrity="sha256-p9TTWD+813MlLaxMXMbTA7wN/ArzGyW/L7c5+KkjOkM=" crossorigin="anonymous">

    <script src="https://unpkg.com/create-file-list"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="module" src="/js/component.js"></script>
    <script src="/js/init.js"></script>
    <script src="/js/admin.js"></script>
</head>
<body>
<div id="loading" class="w-screen h-screen fixed block top-0 left-0 bg-white z-50">
  <span class="text-indigo-600 top-1/2 my-0 mx-auto block relative w-0 h-0"
        style="top: 50%;">
    <i class="fas fa-circle-notch fa-spin fa-5x"></i>
  </span>
</div>
<div>
    <?php
    if (app\Session::has('notifAdmin')) {
        foreach (app\Session::get('notifAdmin') as $notif) {
            ?>
            <div x-data="{open: true}" x-show="open" class="relative z-30 w-full bg-<?= $notif['color'] ?>">
                <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between flex-wrap">
                        <div class="w-0 flex-1 flex items-center">
                            <span class="flex p-2 rounded-lg bg-<?=$notif['colorIcon']?>">
                                <!-- Heroicon name: speakerphone -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01"></path>
                                </svg>
                            </span>
                            <p class="ml-3 font-medium text-white truncate">
                                <span class="md:hidden">
                                    <?= $notif['message']; ?>
                                </span>
                                <span class="hidden md:inline">
                                    <?= $notif['message']; ?>
                                </span>
                            </p>
                        </div>
                        <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                            <button @click="open = false" type="button"
                                    class="-mr-1 flex p-2 rounded-md hover:bg-<?= $notif['colorIcon'] ?> focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                                <span class="sr-only">Dismiss</span>
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
             class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
             class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
                <div class="flex items-center">
                    <img class="fill-current"
                         src="/images/svgs/logodep.svg"
                         alt="Logo département">
                    <span class="text-white text-2xl mx-2 font-semibold">Tableau de bord</span>
                </div>
            </div>

            <nav x-data="{ selecteditem: '<?= $selectedItem; ?>' }" class="mt-10">
                <a :class=" selecteditem === 'dashboard' ? 'bg-gray-700 bg-opacity-25 text-gray-100' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' "
                   @click="selecteditem = 'dashboard'" class="flex items-center mt-4 py-2 px-6"
                   href="<?= $this->router->generate('adminDashboard'); ?>">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                    </svg>
                    <span class="mx-3">Tableau de bord</span>
                </a>

                <a :class=" selecteditem === 'adminList' ? 'bg-gray-700 bg-opacity-25 text-gray-100' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' "
                   @click="selecteditem = 'adminList'" class="flex items-center mt-4 py-2 px-6"
                   href="<?= $this->router->generate('adminsList'); ?>">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span class="mx-3">Administrateurs</span>
                </a>

                <a :class=" selecteditem === 'actualities' ? 'bg-gray-700 bg-opacity-25 text-gray-100' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' "
                   @click="selecteditem = 'actualities'" class="flex items-center mt-4 py-2 px-6"
                   href="<?= $this->router->generate('newsList'); ?>">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>

                    </svg>
                    <span class="mx-3">Actualités</span>
                </a>

                <a :class=" selecteditem === 'events' ? 'bg-gray-700 bg-opacity-25 text-gray-100' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' "
                   @click="selecteditem = 'events'" class="flex items-center mt-4 py-2 px-6"
                   href="<?= $this->router->generate('eventsList') ?>">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="mx-3">Événements</span>
                </a>

                <a :class=" selecteditem === 'links' ? 'bg-gray-700 bg-opacity-25 text-gray-100' : 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100' "
                   @click="selecteditem = 'links'" class="flex items-center mt-4 py-2 px-6"
                   href="<?= $this->router->generate('linksList') ?>">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                    </svg>
                    <span class="mx-3">Liens utiles</span>
                </a>

            </nav>
        </div>
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round">
                            </path>
                        </svg>
                    </button>

                    <div class="relative w-96 text-gray-800">
                        <form id="searchButton">
                            <label>
                                <input type="search" id="searchBox" name="search" placeholder="Recherche"
                                       class="bg-gray-50 w-96 h-10 px-5 pr-10 rounded-full text-xl focus:outline-none">
                            </label>
                            <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px"
                                     y="0px"
                                     viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                     xml:space="preserve" width="512px" height="512px">
                                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="flex items-center">
                    <!--NOTIFICATION SECTION-->
                    <!--                    <div x-data="{ notificationOpen: false }" class="relative">-->
                    <!--                        <button @click="notificationOpen = ! notificationOpen"-->
                    <!--                                class="flex mx-4 text-gray-600 focus:outline-none">-->
                    <!--                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                                <path-->
                    <!--                                        d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"-->
                    <!--                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"-->
                    <!--                                        stroke-linejoin="round">-->
                    <!--                                </path>-->
                    <!--                            </svg>-->
                    <!--                        </button>-->
                    <!---->
                    <!--                        <div x-show="notificationOpen" @click="notificationOpen = false"-->
                    <!--                             class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>-->
                    <!---->
                    <!--                        <div x-show="notificationOpen"-->
                    <!--                             class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl overflow-hidden z-10"-->
                    <!--                             style="width: 20rem; display: none;">-->
                    <!--                            <a href="#"-->
                    <!--                               class="flex items-center px-4 py-3 text-gray-600 hover:text-white hover:bg-indigo-600 -mx-2">-->
                    <!--                                <img class="h-8 w-8 rounded-full object-cover mx-1"-->
                    <!--                                     src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=334&amp;q=80"-->
                    <!--                                     alt="avatar">-->
                    <!--                                <p class="text-sm mx-2">-->
                    <!--                                    <span class="font-bold" href="#">Sara Salah</span> replied on the <span-->
                    <!--                                            class="font-bold text-indigo-400" href="#">Upload Image</span> artical . 2m-->
                    <!--                                </p>-->
                    <!--                            </a>-->
                    <!--                            <a href="#"-->
                    <!--                               class="flex items-center px-4 py-3 text-gray-600 hover:text-white hover:bg-indigo-600 -mx-2">-->
                    <!--                                <img class="h-8 w-8 rounded-full object-cover mx-1"-->
                    <!--                                     src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=634&amp;q=80"-->
                    <!--                                     alt="avatar">-->
                    <!--                                <p class="text-sm mx-2">-->
                    <!--                                    <span class="font-bold" href="#">Slick Net</span> start following you . 45m-->
                    <!--                                </p>-->
                    <!--                            </a>-->
                    <!--                            <a href="#"-->
                    <!--                               class="flex items-center px-4 py-3 text-gray-600 hover:text-white hover:bg-indigo-600 -mx-2">-->
                    <!--                                <img class="h-8 w-8 rounded-full object-cover mx-1"-->
                    <!--                                     src="https://images.unsplash.com/photo-1450297350677-623de575f31c?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=334&amp;q=80"-->
                    <!--                                     alt="avatar">-->
                    <!--                                <p class="text-sm mx-2">-->
                    <!--                                    <span class="font-bold" href="#">Jane Doe</span> Like Your reply on <span-->
                    <!--                                            class="font-bold text-indigo-400" href="#">Test with TDD</span> artical . 1h-->
                    <!--                                </p>-->
                    <!--                            </a>-->
                    <!--                            <a href="#"-->
                    <!--                               class="flex items-center px-4 py-3 text-gray-600 hover:text-white hover:bg-indigo-600 -mx-2">-->
                    <!--                                <img class="h-8 w-8 rounded-full object-cover mx-1"-->
                    <!--                                     src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=398&amp;q=80"-->
                    <!--                                     alt="avatar">-->
                    <!--                                <p class="text-sm mx-2">-->
                    <!--                                    <span class="font-bold" href="#">Abigail Bennett</span> start following you . 3h-->
                    <!--                                </p>-->
                    <!--                            </a>-->
                    <!--                        </div>-->
                    <!--                    </div>-->

                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = ! dropdownOpen"
                                class="relative block p-2 text-xl font-semibold text-gray-800 overflow-hidden rounded-lg hover:bg-indigo-500 hover:text-white">
                            Compte
                        </button>

                        <div x-show="dropdownOpen" @click="dropdownOpen = false"
                             class="fixed inset-0 h-full w-full z-10"
                             style="display: none;"></div>

                        <div x-show="dropdownOpen"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                             style="display: none;">
                            <a href="<?= $this->router->generate('adminUpdateProfil', ['id' => app\User::getUserId()]) ?>"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Profil</a>
                            <a href="<?= $this->router->generate('adminLogout') ?>"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Se déconnecter</a>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-6 py-8">
                    <?= $content ?? '' ?>
                </div>
            </main>

        </div>
    </div>
</div>

<!--Add script here by a variable -->
<?= $script ?? '' ?>
</body>
</html>
