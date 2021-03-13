<div class="flex-col mx-auto flex items-center justify-center pt-8 px-8">
    <?php
    if (!empty($events)) {
        foreach ($events as $event) { ?>
            <div class="flex flex-col w-full bg-white mb-8 rounded shadow-lg sm:w-3/4 md:w-1/2 lg:w-3/5">
                <div class="w-full h-64 bg-top bg-cover rounded-t"
                     style="background-image: url('/images/UploadedImages/<?= $event->file_name === '' ? 'default.png' : $event->file_name ?>'); background-position: center; background-size:cover;"></div>
                <div class="flex flex-col w-full md:flex-row">
                    <div class="flex flex-row justify-around p-4 font-bold leading-none text-gray-800 uppercase bg-gray-400 rounded md:flex-col md:items-center md:justify-center md:w-1/4">
                        <div class="md:text-3xl"><?php
                            $dateObj = DateTime::createFromFormat('Y-m-d H:i:s', $event->start_date);
                            echo $dateObj->format('M');
                            ?>
                        </div>
                        <div class="md:text-6xl"><?= $dateObj->format('j') ?></div>
                        <div class="md:text-xl"><?= $dateObj->format('g a') ?></div>
                    </div>
                    <div class="p-4 font-normal text-gray-800 md:w-3/4">
                        <h1 class="mb-4 text-4xl font-bold leading-none tracking-tight text-gray-800"><?= $event->title; ?></h1>
                        <p class="leading-normal"><?= $event->description; ?></p>
                        <div class="flex flex-row items-center mt-4 text-gray-900">
                            <div class="flex-col w-2/3">
                                <div class="flex mb-1">
                                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                    </svg>
                                    Organisé par <?= $event->organizer; ?>
                                </div>
                                <div class="flex mb-1">
                                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                                    </svg>
                                    <a class="hover:text-indigo-600" href="//<?= $event->link; ?>"
                                       target="_blank">
                                        Consulter le lien
                                    </a>
                                </div>
                                <div class="flex">
                                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <a target="_blank" class="hover:text-indigo-600"
                                       href="https://www.google.com/maps/place/<?= $event->address; ?>"><?= $event->address; ?>
                                    </a>
                                </div>
                            </div>
                            <div class="w-1/3 flex-col justify-end align-bottom">
                                <div class="flex mb-1">
                                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                                    </svg>
                                    <?= $event->category; ?>
                                </div>
                                <div class="flex">
                                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <?= $event->price == 0 ? 'Gratuit' : number_format($event->price, 2, ',', ' ') . '$'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    } else { ?>
        <img class="mb-8 rounded-md shadow-md" src="/images/miscs/eventsmeme.png" alt="meme">
    <?php } ?>
</div>