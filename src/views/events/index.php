<div class="flex-col mx-auto flex items-center justify-center pt-8 px-8">
    <?php
    $gauchedroite=0;
    if (!empty($events)) {
        foreach ($events as $event) { 
            if($gauchedroite==0){?>
        <!-- div card --> 
            <div class="flex flex-row w-full bg-white mb-8 rounded shadow-lg sm:w-5/6 md:w-5/6 lg:w-5/6">
                <!-- div image --> 
                <div class="w-2/3 h-auto  bg-top bg-cover rounded-t"
                     style="background-image: url('/images/UploadedImages/<?= $event->file_name === '' ? 'default.png' : $event->file_name ?>'); background-position: center; background-size:cover;">
                    
                     <div class="min-h-80 p-4">
                     <div class="w-24 text-center bg-blue-900 text-white uppercase p-2 justify-self-end">

                                    <div class="font-size20">
                                        <?php $dateObj = DateTime::createFromFormat('Y-m-d H:i:s', $event->start_date);
                                        echo $dateObj->format('d M Y') ?>
                                        </div>
                                </div></div>

                    </div>
                     <!-- div Bloc infos --> 
                <div class="flex flex-col w-full md:flex-col h-auto">

                    <!-- div Bloc info droite --> 
                    <div class="font-normal text-gray-800 md:w-full h-1/3"></div>
                    <div class="font-normal text-gray-800 md:w-full h-auto p-5">
                    <!-- div titre -->
                        <p class="mb-4 text-xl font-bold leading-none tracking-tight text-gray-800"><?= $event->title; ?></p>
                        <!-- div petit bloc infos --> 
                        <div class="flex flex-row items-center mt-4 text-gray-900">
                            <div class="w-10"></div>
                            <!-- div info gauche --> 
                            <div class="flex-row w-full">
                            <!-- div heure --> 
                                <div class="flex mb-1 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                viewBox="0 0 24 24" fill="none" stroke="#da1a32" stroke-width="2" 
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline></svg>
                                    <?= $dateObj->format('H'); ?>h<?= $dateObj->format('i'); ?>
                                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="#da1a32" aria-hidden="true">
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
                            
                        </div><div class="h-auto flex relative overflow-auto"> <p class=" mb-4 text-l leading-none tracking-tight text-gray-800"><?= $event->description; ?></p></div>
                    </div>
                </div>
            </div>

        <?php
        $gauchedroite=1;
            }else{
                ?>
                <!-- div card --> 
            <div class="flex flex-row w-full bg-white mb-8 rounded shadow-lg sm:w-5/6 md:w-5/6 lg:w-5/6">
                     <!-- div Bloc infos --> 
                <div class="flex flex-col w-full md:flex-col h-auto">

                    <!-- div Bloc info droite --> 
                    <div class="font-normal text-gray-800 md:w-full h-1/3"></div>
                    <div class="font-normal text-gray-800 md:w-full h-auto p-5">
                    <!-- div titre -->
                        <p class="mb-4 text-xl font-bold leading-none tracking-tight text-gray-800"><?= $event->title; ?></p>
                        <!-- div petit bloc infos --> 
                        <div class="flex flex-row items-center mt-4 text-gray-900">
                            <div class="w-10"></div>
                            <!-- div info gauche --> 
                            <div class="flex-row w-full">
                            <!-- div heure --> 
                                <div class="flex mb-1 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                viewBox="0 0 24 24" fill="none" stroke="#da1a32" stroke-width="2" 
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline></svg>
                                    <?= $dateObj->format('H'); ?>h<?= $dateObj->format('i'); ?>
                                
                                    <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="#da1a32" aria-hidden="true">
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
                            
                        </div><div class="h-auto flex relative overflow-auto"> <p class=" mb-4 text-l leading-none tracking-tight text-gray-800"><?= $event->description; ?></p></div>
                    </div>
                </div>
                <!-- div image --> 
                <div class="w-2/3 h-auto  bg-top bg-cover rounded-t"
                     style="background-image: url('/images/UploadedImages/<?= $event->file_name === '' ? 'default.png' : $event->file_name ?>'); background-position: center; background-size:cover;">
                    
                     <div class="h-full p-4">
                     <div class="w-24 text-center bg-blue-900 text-white uppercase p-2 justify-self-end">

                                    <div class="font-size20">
                                        <?php $dateObj = DateTime::createFromFormat('Y-m-d H:i:s', $event->start_date);
                                        echo $dateObj->format('d M Y') ?>
                                        </div>
                                </div></div>

                    </div>
            </div>
                <?php
                $gauchedroite=0;
            }
         }
    } else { ?>
        <img class="mb-8 rounded-md shadow-md" src="/images/miscs/eventsmeme.png" alt="meme">
    <?php } ?>
</div>