<section class="lg:flex pt-8 mx-auto items-center">
    <div class="px-8 py-4 bg-white mx-auto dark:bg-gray-800 rounded-lg shadow-md lg:w-2/5">
        <div class="mt-2">
            <h2 class="text-2xl text-gray-900 dark:text-white font-bold">Construis ton avenir avec nous </h2>
            <ul class="pt-2 list-none md:list-disc md:ml-4">
                <li class="mt-2 text-gray-800 dark:text-gray-300">Acquiers les compétences de demain.</li>
                <li class="mt-2 text-gray-800 dark:text-gray-300">Apprend à résoudre des problèmes efficacement.</li>
                <li class="mt-2 text-gray-800 dark:text-gray-300">Envole ta carrière au prochain niveau.</li>
            </ul>
        </div>

        <div class="flex mt-6 justify-between">
            <img class="h-16 dark:hidden inline-block" src="/images/svgs/nouscegep.svg" alt="Nous le cegep">
            <button type="button" onclick="window.location = '<?= $this->router->generate('indexProgram') ?>'"
                    class="md:w-32 bg-indigo-600 hover:bg-blue-dark text-white font-bold py-3 px-6 rounded-lg mt-3 hover:bg-indigo-500 transition ease-in-out duration-300">
                Découvrir
            </button>
        </div>
    </div>
    <img class="h-72 mt-8 lg:mt-0 mx-auto rounded-lg" src="/images/miscs/code.png" alt="code">
</section>

<section class="lg:flex justify-center mx-auto my-16 p-10">
    <div class="lg:w-1/3 text-center justify-center">
        <img class="dark:hidden inline-block" src="/images/svgs/tutoring.svg" alt="Tutorat">
        <h3 class="text-blue-800 text-2xl font-bold">Tutorat</h3>
        <p class="text-center text-lg text-gray-700">Profites de la motivation et du dévouement de nos tuteurs pour
            favoriser ta réussite ou partager tes connaissances!</p>
    </div>
    <div class="lg:w-1/3 text-center">
        <img class="dark:hidden inline-block pb-2" src="/images/svgs/diploma.svg" alt="Diplome">
        <h3 class="text-blue-800 text-2xl font-bold">Diplôme reconnu</h3>
        <p class="text-center text-lg text-gray-700">Profites de la formule DEC-BAC afin d'obtenir deux diplômes en 5
            ans!</p>
    </div>
    <div class="lg:w-1/3 text-center">
        <img class="dark:hidden inline-block" src="/images/svgs/internship.svg" alt="Stage et emplois">
        <h3 class="text-blue-800 text-2xl font-bold">Carrière professionnelle épanouie</h3>
        <p class="text-center text-lg text-gray-700">Profites de l’alternance travail-études qui te permet de réaliser
            deux stages rémunérés en entreprise!</p>
    </div>
</section>


<section class="bg-indigo-50 dark:bg-gray-800">
    <div class="container mx-auto px-6 py-16">
        <div class="lg:flex items-center">
            <div class="lg:w-3/5 text-justify mr-6">
                <h2 class="text-gray-800 dark:text-gray-100 text-3xl font-bold">Aperçu de notre programme</h2>
                <p class="text-gray-700 dark:text-gray-400 mt-4">
                    Comme technicien ou technicienne en informatique de gestion, tu développeras des logiciels et des
                    applications qui répondront efficacement aux besoins d’entreprises de toute nature. Tu proposeras
                    également des améliorations fonctionnelles aux plateformes existantes en plus d’assurer la formation
                    et le soutien technique aux utilisateurs.</p>
                <p class="text-gray-700 dark:text-gray-400 mt-4">
                    Dans ton cheminement, tu auras des cours de programmation, de réseautique et de multimédia. Tu
                    étudieras la structure de données et les systèmes d’exploitation. Tu verras aussi des notions de
                    gestion qui te permettront de planifier le déroulement d’un projet en considérant les ressources
                    humaines et financières disponibles. Au terme de ta formation, tu seras en mesure de concevoir et de
                    développer des projets web qui répondront à différents besoins administratifs.
                </p>
            </div>
            <div class="mt-8 lg:mt-0 lg:w-2/5 lg:h-72">
                <div class="flex items-center justify-center lg:justify-end lg:h-full">
                    <iframe class="w-full h-full object-cover object-center rounded-md shadow"
                            src="https://www.youtube.com/embed/B_oODXSMmhs" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <?php if (!empty($newsList)) {
        ?>
        <h2 class=" ml-8 mt-8 text-gray-800 dark:text-gray-100 text-3xl font-bold">Actualités</h2>
        <?php
        include '../src/views/news/index.php';
        ?>
        <?php
    } ?>
</section>

<section class="mt-16 pb-16" style="font-family:Roboto,serif">
    <h1 class="text-4xl font-thin text-blue-900 text-xl text-center font-extrabold text-gray-700 mt-10">
        Nos étudiants témoignent</h1>
    <div class="w-3/5 mx-auto my-8">
        <div id="slider" class="swiper-container w-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide bg-cover bg-center">
                    <div class="container px-6 md:px-20 mx-auto">
                        <div class="relative mx-auto h-52 w-52 md:h-96 md:w-96">
                            <div class="card bg-indigo-300 shadow-md inline-block rounded-3xl absolute bottom-0 transform -rotate-12 h-52 w-52 md:h-96 md:w-96"></div>
                            <div class="card bg-indigo-200 shadow-lg inline-block rounded-3xl absolute bottom-0 transform -rotate-6 h-52 w-52 md:h-96 md:w-96"></div>
                            <div class="card bg-indigo-100 shadow-lg inline-block rounded-3xl absolute bottom-0 transform rotate-6 h-52 w-52 md:h-96 md:w-96"></div>
                            <div class="card bg-indigo-50 transition shadow-xl rounded-3xl absolute bottom-0 z-10  h-52 w-52 md:h-96 md:w-96">
                                <svg class="text-blue-100 opacity-50 h-10 mt-8 ml-2">
                                    <path d="M13.415.001C6.07 5.185.887 13.681.887 23.041c0 7.632 4.608 12.096 9.936 12.096 5.04 0 8.784-4.032 8.784-8.784 0-4.752-3.312-8.208-7.632-8.208-.864 0-2.016.144-2.304.288.72-4.896 5.328-10.656 9.936-13.536L13.415.001zm24.768 0c-7.2 5.184-12.384 13.68-12.384 23.04 0 7.632 4.608 12.096 9.936 12.096 4.896 0 8.784-4.032 8.784-8.784 0-4.752-3.456-8.208-7.776-8.208-.864 0-1.872.144-2.16.288.72-4.896 5.184-10.656 9.792-13.536L38.183.001z"></path>
                                </svg>
                                <div class="h-11/12 w-3/4 rounded-2xl  relative mx-auto">
                                    <p class="mt-2 text-gray-700 dark:text-gray-300">Lorem Ipsum is simply dummy text of
                                        the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.</p>
                                    <h2 class="text-xl font-thin text-blue-800 text-xl font-extrabold text-gray-700 mt-10">
                                        Nom 1</h2>
                                    <h2 class="text-xl font-thin text-blue-800 text-xl font-extrabold text-gray-700">
                                        Programmeur</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide bg-cover bg-center">
                    <div class="container px-6 md:px-20">
                        <div class="relative mx-auto h-52 w-52 md:h-96 md:w-96">
                            <div class="card bg-indigo-50 shadow-md inline-block rounded-3xl absolute bottom-0 transform -rotate-12 h-52 w-52 md:h-96 md:w-96"></div>
                            <div class="card bg-indigo-300 shadow-lg inline-block rounded-3xl absolute bottom-0 transform -rotate-6 h-52 w-52 md:h-96 md:w-96"></div>
                            <div class="card bg-indigo-200 shadow-lg inline-block rounded-3xl absolute bottom-0 transform rotate-6 h-52 w-52 md:h-96 md:w-96"></div>
                            <div class="card bg-indigo-100 transition shadow-xl rounded-3xl absolute bottom-0 z-10  h-52 w-52 md:h-96 md:w-96">
                                <svg class="text-blue-100 opacity-50 h-10 mt-8 ml-2">
                                    <path d="M13.415.001C6.07 5.185.887 13.681.887 23.041c0 7.632 4.608 12.096 9.936 12.096 5.04 0 8.784-4.032 8.784-8.784 0-4.752-3.312-8.208-7.632-8.208-.864 0-2.016.144-2.304.288.72-4.896 5.328-10.656 9.936-13.536L13.415.001zm24.768 0c-7.2 5.184-12.384 13.68-12.384 23.04 0 7.632 4.608 12.096 9.936 12.096 4.896 0 8.784-4.032 8.784-8.784 0-4.752-3.456-8.208-7.776-8.208-.864 0-1.872.144-2.16.288.72-4.896 5.184-10.656 9.792-13.536L38.183.001z"></path>
                                </svg>
                                <div class="h-11/12 w-3/4 rounded-2xl  relative mx-auto">
                                    <p class="mt-2 text-gray-700 dark:text-gray-300">Lorem Ipsum is simply dummy text of
                                        the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.</p>
                                    <h2 class="text-xl font-thin text-blue-800 text-xl font-extrabold text-gray-700 mt-10">
                                        Nom 2</h2>
                                    <h2 class="text-xl font-thin text-blue-800 text-xl font-extrabold text-gray-700">
                                        Programmeur</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide bg-cover bg-center">
                    <div class="container px-6 md:px-20">
                        <div class="relative mx-auto h-52 w-52 md:h-96 md:w-96">
                            <div class="card bg-indigo-100 shadow-md inline-block rounded-3xl absolute bottom-0 transform -rotate-12 h-52 w-52 md:h-96 md:w-96"></div>
                            <div class="card bg-indigo-50 shadow-lg inline-block rounded-3xl absolute bottom-0 transform -rotate-6 h-52 w-52 md:h-96 md:w-96"></div>
                            <div class="card bg-indigo-300 shadow-lg inline-block rounded-3xl absolute bottom-0 transform rotate-6 h-52 w-52 md:h-96 md:w-96"></div>
                            <div class="card bg-indigo-200 transition shadow-xl rounded-3xl absolute bottom-0 z-10 h-52 w-52 md:h-96 md:w-96">
                                <svg class="text-blue-100 opacity-50 h-10 mt-8 ml-2">
                                    <path d="M13.415.001C6.07 5.185.887 13.681.887 23.041c0 7.632 4.608 12.096 9.936 12.096 5.04 0 8.784-4.032 8.784-8.784 0-4.752-3.312-8.208-7.632-8.208-.864 0-2.016.144-2.304.288.72-4.896 5.328-10.656 9.936-13.536L13.415.001zm24.768 0c-7.2 5.184-12.384 13.68-12.384 23.04 0 7.632 4.608 12.096 9.936 12.096 4.896 0 8.784-4.032 8.784-8.784 0-4.752-3.456-8.208-7.776-8.208-.864 0-1.872.144-2.16.288.72-4.896 5.184-10.656 9.792-13.536L38.183.001z"></path>
                                </svg>
                                <div class="h-11/12 w-3/4 rounded-2xl relative mx-auto">
                                    <p class="mt-2 text-gray-700 dark:text-gray-300">Lorem Ipsum is simply dummy text of
                                        the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.</p>
                                    <h2 class="text-xl font-thin text-blue-800 text-xl font-extrabold text-gray-700 mt-10">
                                        Nom 3</h2>
                                    <h2 class="text-xl font-thin text-blue-800 text-xl font-extrabold text-gray-700">
                                        Programmeur</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide bg-cover bg-center">
                    <div class="container px-6 md:px-20">
                        <div class="relative mx-auto h-52 w-52 md:h-96 md:w-96">
                            <div class="card bg-indigo-200 shadow-md inline-block rounded-3xl absolute bottom-0 transform -rotate-12 h-52 w-52 md:h-96 md:w-96"></div>
                            <div class="card bg-indigo-100 shadow-lg inline-block rounded-3xl absolute bottom-0 transform -rotate-6 h-52 w-52 md:h-96 md:w-96"></div>
                            <div class="card bg-indigo-50 shadow-lg inline-block rounded-3xl absolute bottom-0 transform rotate-6 h-52 w-52 md:h-96 md:w-96"></div>
                            <div class="card bg-indigo-300 transition shadow-xl rounded-3xl absolute bottom-0 z-10 h-52 w-52 md:h-96 md:w-96">
                                <svg class="text-blue-100 opacity-50 h-10 mt-8 ml-2">
                                    <path d="M13.415.001C6.07 5.185.887 13.681.887 23.041c0 7.632 4.608 12.096 9.936 12.096 5.04 0 8.784-4.032 8.784-8.784 0-4.752-3.312-8.208-7.632-8.208-.864 0-2.016.144-2.304.288.72-4.896 5.328-10.656 9.936-13.536L13.415.001zm24.768 0c-7.2 5.184-12.384 13.68-12.384 23.04 0 7.632 4.608 12.096 9.936 12.096 4.896 0 8.784-4.032 8.784-8.784 0-4.752-3.456-8.208-7.776-8.208-.864 0-1.872.144-2.16.288.72-4.896 5.184-10.656 9.792-13.536L38.183.001z"></path>
                                </svg>
                                <div class="h-11/12 w-3/4 rounded-2xl relative mx-auto">
                                    <p class="mt-2 text-gray-700 dark:text-gray-300">Lorem Ipsum is simply dummy text of
                                        the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.</p>
                                    <h2 class="text-xl font-thin text-blue-800 text-xl font-extrabold text-gray-700 mt-10">
                                        Nom 4</h2>
                                    <h2 class="text-xl font-thin text-blue-800 text-xl font-extrabold text-gray-700">
                                        Programmeur</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex swiper-button-prev w-16 h-16 text-xs rounded-full text-indigo-600"></div>
            <div class="hidden md:flex swiper-button-next w-16 h-16 text-xs rounded-full text-indigo-600"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<?php ob_start(); ?>
<script src="/js/carousel.js"></script>
<?php $script = ob_get_clean(); ?>
