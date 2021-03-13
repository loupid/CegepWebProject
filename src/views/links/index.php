<?php if (!empty($linkList)) { ?>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 my-auto px-4 py-8">
    <?php foreach ($linkList as $link) { ?>
        <div class="bg-white w-full flex items-center p-1 rounded-xl shadow border">
            <div class="flex-grow p-3">
                <div class="font-semibold text-gray-700">
                    <?= $link->title ?>
                </div>
                <div class="text-sm text-gray-600 mb-2">
                    <?= $link->description ?>
                </div>
                <div class="flex">
                    <a href="//<?= $link->link ?>" target="_blank"
                       class="font-semibold text-sm text-gray-700 mr-auto hover:text-indigo-600">
                        Consulter le lien
                    </a>
                    <div class="flex ml-auto mb-1">
                        <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                        <?= $link->category ?>
                    </div>
                </div>
            </div>
            <div class="p-2">
            </div>
        </div>
    <?php }?>
    </div>
<?php } else { ?>
    <div class="py-8">
        <img class="mx-auto rounded-lg shadow-md"
             src="/images/miscs/linksmeme.png" alt="meme">
    </div>
<?php } ?>
