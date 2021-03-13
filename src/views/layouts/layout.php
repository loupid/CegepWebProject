<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Département d'informatique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/tailwind.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Roboto&display=swap" rel="stylesheet">
    <!-- component -->
    <link rel="stylesheet" href="https://pagecdn.io/lib/font-awesome/5.10.0-11/css/all.min.css"
          integrity="sha256-p9TTWD+813MlLaxMXMbTA7wN/ArzGyW/L7c5+KkjOkM=" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aframe/1.2.0/aframe.min.js"
            integrity="sha512-/gO16YMp20RIqCZXZyvMlzALQqEoiDU0akshw25wFiXCRGl+0p/HPWkOd8HWFn6bnatGhxakGLfYhWaPPVQIyA=="
            crossorigin="anonymous"></script>

    <link rel="dns-prefetch" href="//unpkg.com"/>
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net"/>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script type="module" src="/js/component.js"></script>
    <style>
        .modal {
            transition: opacity 0.25s ease;
        }

        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>
</head>
<body class="dark">
<div id="loading" class="w-screen h-screen fixed block top-0 left-0 bg-white z-50">
  <span class="text-indigo-600 top-1/2 my-0 mx-auto block relative w-0 h-0" style="
    top: 50%;
">
    <i class="fas fa-circle-notch fa-spin fa-5x"></i>
  </span>
</div>
<div class="flex flex-col justify-between">
    <div class="relative bg-white shadow">
        <div class="mx-auto px-4 sm:px-6">
            <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
                <div class="flex justify-start">
                    <a href="<?= $this->router->generate('index') ?>" class="inline-block mr-4">
                        <img class="dark:hidden inline-block"
                             src="/images/svgs/darklogodep.svg"
                             alt="Logo département">
                    </a>
                </div>
                <div class="-mr-2 -my-2 md:hidden">
                    <button id="btn-open-mobile-menu" type="button"
                            class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <span class="sr-only">Open menu</span>
                        <!-- Heroicon name: menu -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
                <nav class="hidden md:flex space-x-10">
                    <a href="<?= $this->router->generate('index') ?>"
                       class="text-base font-medium text-gray-900 hover:text-indigo-600">
                        Accueil
                    </a>

                    <div class="relative">
                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                        <!--                    isset($this) ? $this->router->generate('indexProgram') : $router->generate('indexProgram')                  -->
                        <button id="btn-program" type="button"
                                onclick="window.location = '<?= $this->router->generate('indexProgram') ?>'"
                                class="group bg-white rounded-md text-gray-900 inline-flex items-center text-base font-medium hover:text-indigo-600 ">
                            <span>Programme</span>
                            <!--
                              Heroicon name: chevron-down

                              Item active: "text-gray-600", Item inactive: "text-gray-400"
                            -->
                            <svg class="ml-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                 aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div id="program-dropdown"
                             class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 hidden">
                            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                    <a href="<?= $this->router->generate('coursesIndex') ?>"
                                       class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                        <!-- Heroicon name: chart-bar -->
                                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                                        </svg>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-900">
                                                Cours
                                            </p>
                                            <p class="mt-1 text-sm text-gray-500">
                                                La liste complète des cours par session
                                            </p>
                                        </div>
                                    </a>

                                    <a href="<?= $this->router->generate('picturesIndex') ?>"
                                       class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                        <!-- Heroicon name: cursor-click -->
                                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-900">
                                                Locaux
                                            </p>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Images 360 du département
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="px-5 py-5 bg-gray-50 space-y-6 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8">
                                    <div class="flow-root">
                                        <a href="https://www.cegeptr.qc.ca/futurs-etudiants/inscription/"
                                           target="_blank"
                                           class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
                                            <!-- Heroicon name: play -->
                                            <svg class="flex-shrink-0 h-6 w-6 text-gray-400"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span class="ml-3">S'inscrire au programme</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--                section etudiants a venir-->
                    <!--                <div class="relative">-->
                    <!--                    <button id="btn-students" role="menuitem" type="button"-->
                    <!--                            class="group bg-white rounded-md text-gray-900 inline-flex items-center text-base font-medium hover:text-indigo-600 ">-->
                    <!--                        <span>Étudiants</span>-->
                    <!--                          Heroicon name: chevron-down-->
                    <!---->
                    <!--                          Item active: "text-gray-600", Item inactive: "text-gray-400"-->
                    <!--                        <svg class="ml-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"-->
                    <!--                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"-->
                    <!--                             aria-hidden="true">-->
                    <!--                            <path fill-rule="evenodd"-->
                    <!--                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"-->
                    <!--                                  clip-rule="evenodd"/>-->
                    <!--                        </svg>-->
                    <!--                    </button>-->
                    <!---->
                    <!--                    <div id="students-dropdown" class="absolute z-10 mt-3 px-2 w-screen max-w-md sm:px-0 hidden">-->
                    <!--                        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">-->
                    <!--                            <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">-->
                    <!--                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">-->
                    <!--                                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"-->
                    <!--                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
                    <!--                                         stroke="currentColor" aria-hidden="true">-->
                    <!--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
                    <!--                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>-->
                    <!--                                    </svg>-->
                    <!--                                    <div class="ml-4">-->
                    <!--                                        <p class="text-base font-medium text-gray-900">-->
                    <!--                                            Projets des étudiants-->
                    <!--                                        </p>-->
                    <!--                                        <p class="mt-1 text-sm text-gray-500">-->
                    <!--                                            Lorem ipsum...-->
                    <!--                                        </p>-->
                    <!--                                    </div>-->
                    <!--                                </a>-->
                    <!---->
                    <!--                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">-->
                    <!--                                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"-->
                    <!--                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
                    <!--                                         stroke="currentColor" aria-hidden="true">-->
                    <!--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
                    <!--                                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>-->
                    <!--                                    </svg>-->
                    <!--                                    <div class="ml-4">-->
                    <!--                                        <p class="text-base font-medium text-gray-900">-->
                    <!--                                            Bourse-->
                    <!--                                        </p>-->
                    <!--                                        <p class="mt-1 text-sm text-gray-500">-->
                    <!--                                            Liste des bourses disponibles-->
                    <!--                                        </p>-->
                    <!--                                    </div>-->
                    <!--                                </a>-->
                    <!---->
                    <!--                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">-->
                    <!--                                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"-->
                    <!--                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
                    <!--                                         stroke="currentColor" aria-hidden="true">-->
                    <!--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
                    <!--                                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>-->
                    <!--                                    </svg>-->
                    <!--                                    <div class="ml-4">-->
                    <!--                                        <p class="text-base font-medium text-gray-900">-->
                    <!--                                            Témoignages d'étudiants-->
                    <!--                                        </p>-->
                    <!--                                        <p class="mt-1 text-sm text-gray-500">-->
                    <!--                                            Lorem ipsum-->
                    <!--                                        </p>-->
                    <!--                                    </div>-->
                    <!--                                </a>-->
                    <!---->
                    <!--                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">-->
                    <!--                                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"-->
                    <!--                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
                    <!--                                         stroke="currentColor" aria-hidden="true">-->
                    <!--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
                    <!--                                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>-->
                    <!--                                    </svg>-->
                    <!--                                    <div class="ml-4">-->
                    <!--                                        <p class="text-base font-medium text-gray-900">-->
                    <!--                                            Palmarès et alumni-->
                    <!--                                        </p>-->
                    <!--                                        <p class="mt-1 text-sm text-gray-500">-->
                    <!--                                            Lorem ipsum...-->
                    <!--                                        </p>-->
                    <!--                                    </div>-->
                    <!--                                </a>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->

                    <a href="<?= $this->router->generate('eventsIndex') ?>"
                       class="text-base font-medium text-gray-900 hover:text-indigo-600">
                        Événements
                    </a>

                    <div class="relative">
                        <button id="btn-news" role="menuitem" type="button"
                                onclick="window.location = '<?= $this->router->generate('newsIndex') ?>'"
                                class="group bg-white rounded-md text-gray-900 inline-flex items-center text-base font-medium hover:text-indigo-600">
                            <span>Actualités</span>
                            <!--                        <svg class="ml-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"-->
                            <!--                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"-->
                            <!--                             aria-hidden="true">-->
                            <!--                            <path fill-rule="evenodd"-->
                            <!--                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"-->
                            <!--                                  clip-rule="evenodd"/>-->
                            <!--                        </svg>-->
                        </button>

                        <!--                    <div id="news-dropdown" class="absolute z-10 mt-3 px-2 w-screen max-w-md sm:px-0 hidden">-->
                        <!--                        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">-->
                        <!--                            <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">-->
                        <!--                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">-->
                        <!--                                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"-->
                        <!--                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
                        <!--                                         stroke="currentColor" aria-hidden="true">-->
                        <!--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
                        <!--                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>-->
                        <!--                                    </svg>-->
                        <!--                                    <div class="ml-4">-->
                        <!--                                        <p class="text-base font-medium text-gray-900">-->
                        <!--                                            Actualités technologique-->
                        <!--                                        </p>-->
                        <!--                                        <p class="mt-1 text-sm text-gray-500">-->
                        <!--                                            See what meet-ups and other events we might be planning near you.-->
                        <!--                                        </p>-->
                        <!--                                    </div>-->
                        <!--                                </a>-->
                        <!---->
                        <!--                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">-->
                        <!--                                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"-->
                        <!--                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
                        <!--                                         stroke="currentColor" aria-hidden="true">-->
                        <!--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
                        <!--                                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>-->
                        <!--                                    </svg>-->
                        <!--                                    <div class="ml-4">-->
                        <!--                                        <p class="text-base font-medium text-gray-900">-->
                        <!--                                            test-->
                        <!--                                        </p>-->
                        <!--                                        <p class="mt-1 text-sm text-gray-500">-->
                        <!--                                            ceci est un test-->
                        <!--                                        </p>-->
                        <!--                                    </div>-->
                        <!--                                </a>-->
                        <!--                            </div>-->
                        <!--                            <div class="px-5 py-5 bg-gray-50 sm:px-8 sm:py-8">-->
                        <!--                                <div>-->
                        <!--                                    <h3 class="text-sm tracking-wide font-medium text-gray-500 uppercase">-->
                        <!--                                        Publications récentes-->
                        <!--                                    </h3>-->
                        <!--                                    <ul class="mt-4 space-y-4">-->
                        <!--                                        <li class="text-base truncate">-->
                        <!--                                            <a href="#" class="font-medium text-gray-900 hover:text-gray-700">-->
                        <!--                                                Publication 1-->
                        <!--                                            </a>-->
                        <!--                                        </li>-->
                        <!---->
                        <!--                                        <li class="text-base truncate">-->
                        <!--                                            <a href="#" class="font-medium text-gray-900 hover:text-gray-700">-->
                        <!--                                                Publication 2-->
                        <!--                                            </a>-->
                        <!--                                        </li>-->
                        <!---->
                        <!--                                        <li class="text-base truncate">-->
                        <!--                                            <a href="#" class="font-medium text-gray-900 hover:text-gray-700">-->
                        <!--                                                Publication 3-->
                        <!--                                            </a>-->
                        <!--                                        </li>-->
                        <!--                                    </ul>-->
                        <!--                                </div>-->
                        <!--                                <div class="mt-5 text-sm">-->
                        <!--                                    <a href="" class="font-medium text-indigo-600 hover:text-indigo-500"> Voir-->
                        <!--                                        toutes les actualités <span aria-hidden="true">&rarr;</span></a>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                    </div>

                    <div class="relative">
                        <button id="btn-more" role="menuitem" type="button"
                                class="group bg-white rounded-md text-gray-900 inline-flex items-center text-base font-medium hover:text-indigo-600 ">
                            <span>Plus</span>
                            <svg class="ml-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                 aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div id="more-dropdown" class="absolute z-10 mt-3 px-2 w-screen max-w-md sm:px-0 hidden">
                            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                    <a href="<?= $this->router->generate('linksIndex') ?> "
                                       class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-900">
                                                Liens utiles
                                            </p>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Des liens qui pourraient t'aider dans ton cheminement scolaire et vie
                                                étudiante
                                            </p>
                                        </div>
                                    </a>

                                    <!--                                <a href="" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">-->
                                    <!--                                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"-->
                                    <!--                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
                                    <!--                                         stroke="currentColor" aria-hidden="true">-->
                                    <!--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
                                    <!--                                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>-->
                                    <!--                                    </svg>-->
                                    <!--                                    <div class="ml-4">-->
                                    <!--                                        <p class="text-base font-medium text-gray-900">-->
                                    <!--                                            Ressources-->
                                    <!--                                        </p>-->
                                    <!--                                        <p class="mt-1 text-sm text-gray-500">-->
                                    <!--                                            Les ressources du département et du Cégep sont à ta disposition-->
                                    <!--                                        </p>-->
                                    <!--                                    </div>-->
                                    <!--                                </a>-->
                                </div>
                            </div>
                        </div>
                </nav>
            </div>
        </div>

        <div id="mobile-menu" class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right hidden">
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                <div class="pt-5 pb-6 px-5">
                    <div class="flex">
                        <img class="h-8 w-auto mr-auto" src="/images/svgs/darklogodep.svg" alt="darklogodep">
                        <button id="btn-close-mobile-menu" type="button" class="bg-white rounded-md p-2 ml-auto inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6">
                        <nav class="grid gap-y-8">
                            <a href="<?= $this->router->generate('index')?>"
                               class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                <span class="ml-3 text-base font-medium text-gray-900">
                                    Accueil
                                </span>
                            </a>

                            <a href="<?= $this->router->generate('indexProgram') ?>"
                               class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="ml-3 text-base font-medium text-gray-900">
                                    Programme
                                </span>
                            </a>

                            <a href="<?= $this->router->generate('coursesIndex') ?>"
                               class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                                </svg>
                                <span class="ml-3 text-base font-medium text-gray-900">
                                    Cours
                                </span>
                            </a>

                            <a href="<?= $this->router->generate('picturesIndex') ?>"
                               class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                <span class="ml-3 text-base font-medium text-gray-900">
                                    Locaux
                                </span>
                            </a>

                            <a href="<?= $this->router->generate('eventsIndex') ?>"
                               class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="ml-3 text-base font-medium text-gray-900">
                                    Événements
                                </span>
                            </a>

                            <a href="<?= $this->router->generate('newsIndex') ?>"
                               class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                                <span class="ml-3 text-base font-medium text-gray-900">
                                    Actualités
                                </span>
                            </a>

                            <a href="<?= $this->router->generate('linksIndex') ?>"
                               class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                <span class="ml-3 text-base font-medium text-gray-900">
                                    Liens utiles
                                </span>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-cwc-white mb-auto">
            <?= $content ?? '' ?>
        </div>

        <footer class="bg-white bottom-0 border-t-2 dark:bg-gray-800">
            <div class="container mx-auto px-6 py-4">
                <div class="lg:flex">
                    <div class="w-full lg:w-2/5">
                        <div>
                            <div class="flex">
                                <a href="/">
                                    <img class="dark:hidden inline-block"
                                         src="/images/svgs/darklogodep.svg"
                                         alt="Logo département">
                                </a>

                                <p class=" ml-2 text-gray-900 dark:text-gray-400 max-w-md w-64">Le département
                                    d'informatique du
                                    Cégep de Trois-Rivières</p>
                            </div>

                            <div class="flex mt-4 -mx-2">
                                <a href="https://www.facebook.com/cegep3r.info" target="_blank"
                                   class="mx-2 text-gray-700 dark:text-gray-200 hover:text-blue-700 dark:hover:text-gray-400"
                                   aria-label="Facebook">
                                    <svg class="h-4 w-4 fill-current" viewBox="0 0 512 512">
                                        <path d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z"/>
                                    </svg>
                                </a>

                                <a href="https://www.youtube.com/user/cegeptroisrivieres" target="_blank"
                                   class="mx-2 text-gray-700 dark:text-gray-200 hover:text-red-600 dark:hover:text-gray-400"
                                   aria-label="Youtube">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current"
                                         viewBox="0 0 24 24">
                                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                    </svg>
                                </a>

                                <a href="https://twitter.com/cegeptr" target="_blank"
                                   class="mx-2 text-gray-700 dark:text-gray-200 hover:text-blue-400 dark:hover:text-gray-400"
                                   aria-label="Twitter">
                                    <svg class="h-4 w-4 fill-current" viewBox="0 0 512 512">
                                        <path d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z"/>
                                    </svg>
                                </a>

                                <a href="https://www.instagram.com/cegeptr/" target="_blank"
                                   class="mx-2 text-gray-700 dark:text-gray-200 hover:text-pink-600 dark:hover:text-gray-400"
                                   aria-label="Instagram">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current"
                                         viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                </a>

                                <a href="https://ca.linkedin.com/school/cegeptr/" target="_blank"
                                   class="mx-2 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-gray-400"
                                   aria-label="Linkden">
                                    <svg class="h-4 w-4 fill-current" viewBox="0 0 512 512">
                                        <path d="M444.17,32H70.28C49.85,32,32,46.7,32,66.89V441.61C32,461.91,49.85,480,70.28,480H444.06C464.6,480,480,461.79,480,441.61V66.89C480.12,46.7,464.6,32,444.17,32ZM170.87,405.43H106.69V205.88h64.18ZM141,175.54h-.46c-20.54,0-33.84-15.29-33.84-34.43,0-19.49,13.65-34.42,34.65-34.42s33.85,14.82,34.31,34.42C175.65,160.25,162.35,175.54,141,175.54ZM405.43,405.43H341.25V296.32c0-26.14-9.34-44-32.56-44-17.74,0-28.24,12-32.91,23.69-1.75,4.2-2.22,9.92-2.22,15.76V405.43H209.38V205.88h64.18v27.77c9.34-13.3,23.93-32.44,57.88-32.44,42.13,0,74,27.77,74,87.64Z"/>
                                    </svg>
                                </a>

                                <a href="https://www.cegeptr.qc.ca/" target="_blank"
                                   class="mx-2 text-gray-700 dark:text-gray-200 hover:text-blue-700 dark:hover:text-gray-400"
                                   aria-label="Linkden">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current -mt-1"
                                         viewBox="0 0 4000 4000">
                                        <g id="layout-cegep" fill="currentcolor" stroke="none">
                                            <path d="M1590 2540 l0 -810 -405 0 -405 0 0 -405 0 -405 1225 0 1225 0 0 135 0 135 -1087 2 -1088 3 -3 133 -3 132 411 0 410 0 0 945 0 945 -140 0 -140 0 0 -810z"/>
                                            <path d="M2140 2405 l0 -945 545 0 545 0 0 135 0 135 -410 0 -410 0 0 810 0 810 -135 0 -135 0 0 -945z"/>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 lg:mt-0 lg:flex-1">
                        <div class="grid gap-2 grid-cols-1 sm:grid-cols-1 md:grid-cols-3">
                            <div>
                                <h3 class="text-gray-700 dark:text-white uppercase">Département</h3>
                                <a href="<?= $this->router->generate('indexProgram') ?>"
                                   class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600">Programme</a>
                                <a href="<?= $this->router->generate('coursesIndex') ?>"
                                   class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600">Cours</a>
                            </div>

                            <div>
                                <h3 class="text-gray-700 dark:text-white uppercase">Plus</h3>
                                <a href="<?= $this->router->generate('newsIndex') ?>"
                                   class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600">Actualités</a>
                                <a href="<?= $this->router->generate('eventsIndex') ?>"
                                   class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600">Événemets</a>
                                <a href=""
                                   class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600">Liens
                                    utiles</a>
                                <!--                        <a href=""-->
                                <!--                           class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600">Ressources</a>-->
                            </div>

                            <!--section etudiants a venir-->
                            <!--                    <div>-->
                            <!--                        <h3 class="text-gray-700 dark:text-white uppercase">Étudiants</h3>-->
                            <!--                        <a href="#" class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600">Projets-->
                            <!--                            des étudiants-->
                            <!--                            cloud</a>-->
                            <!--                        <a href="#" class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600">Bourse-->
                            <!--                        </a>-->
                            <!--                        <a href="#" class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600">Témoignages-->
                            <!--                            d'étudiants-->
                            <!--                        </a> <a href="#"-->
                            <!--                                class="block mt-2 text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600">Palmarès-->
                            <!--                            et-->
                            <!--                            alumni-->
                            <!--                        </a>-->
                            <!--                    </div>-->

                            <div>
                                <h3 class="text-gray-700 dark:text-white uppercase">Nous joindre</h3>
                                <a href="tel:819-376-1721p3706"
                                   class="block mt-2 text-sm text-gray-600 dark:text-gray-400">819
                                    376-1721 poste: 3706</a>
                                <a href="mailto:david.b.brouillette@cegeptr.qc.ca"
                                   class="block mt-2 text-sm text-gray-600 dark:text-gray-400">david.b.brouillette@cegeptr.qc.ca</a>
                                <a href="https://www.google.com/maps/place/C%C3%A9gep+de+Trois-Rivi%C3%A8res/@46.3551699,-72.5766428,15z/data=!4m8!1m2!2m1!1spavillon+science+cegep+trois-rivieres!3m4!1s0x0:0x799f8b93d17aae1e!8m2!3d46.3545664!4d-72.5729316"
                                   target="_blank"
                                   class="block mt-6 text-sm hover:text-indigo-600 text-gray-600 dark:text-gray-400">Pavillon
                                    des Sciences
                                    3500, rue de Courval, C.P. 97, G9A 5E6</a>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="h-px my-6 bg-gray-300 dark:bg-gray-700 border-none">

                <div>
                    <p class="text-center text-gray-800 dark:text-white">Tous droits réservés - © Département
                        d'informatique
                        du
                        Cégep de Trois-Rivières - 2021</p>
                </div>
            </div>
        </footer>
    </div>

    <!--Add script here by a variable -->
    <script type="module" src="/js/app.js"></script>
    <?= $script ?? '' ?>
</body>
</html>
