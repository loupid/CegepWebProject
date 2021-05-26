<form action="<?php echo $this->router->generate("eventsRecherche"); if ($ordreActif === "nom") {echo "-oa";}?>" method="post">
    <div class="text-gray-600 relative w-3/6 m-auto top-4">
        <input type="search" name="search" placeholder="Recherche" value="<?= $search ?? ''?>" class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none w-full">
        <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
            </svg>
        </button>
    </div>
</form>

<?php
if (!empty($events)) {
    ?>
    <section class="mt-5 w-1/2 mx-auto">
        <div class="mx-auto pt-5 border-b border-gray-200 flex justify-center">
            <label class="text-gray-600">Filtrer par :</label>
            <a href=".<?= $this->router->generate("eventsRecherche")?>" class="mx-5 text-gray-600 transition-colors pb-3 border-b cursor-pointer <?php if ($ordreActif === "") {
        echo "border-red-500 text-red-500";
    } else {
        echo "hover:text-black";
    } ?>">Date de l'événement</a>
            <a href=".<?= $this->router->generate("eventsRechercheOA", ["search"=> $search ?? ""])?>" class="text-gray-600 transition-colors pb-3 border-b cursor-pointer <?php if ($ordreActif === "nom") {
        echo "border-red-500 text-red-500";
    } else {
        echo "hover:text-black";
    } ?>">Ordre alphabétique</a>
        </div>
    </section>
    <div class="flex-col mx-auto flex items-center justify-center pt-8 px-8">
    <?php
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
        <img class="py-8 mx-auto rounded-lg shadow-md" src="/images/miscs/eventsmeme.png" alt="meme">
<?php } ?>