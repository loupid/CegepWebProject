<?php
if (!empty($newsList)) { ?>
    <div class="p-8 grid grid-cols-1 md:grid-cols-3 gap-3 my-auto">
    <?php
    foreach ($newsList as $news) { ?>
        <div class="md:p-8 p-2 rounded-lg bg-white relative">
            <div class="mb-4">
                <img class="rounded-lg w-full"
                     src="/images/UploadedImages/<?= $news->file_name === '' ? 'default.png' : $news->file_name?>"
                     alt="news_image"/>

                <p class="text-indigo-500 font-semibold text-base mt-2"><?= $news->category ?></p>

                <h1 class="font-semibold mb-2 text-gray-900 leading-none text-xl mt-1 capitalize truncate">
                    <?= $news->title ?>
                </h1>

                <div class="max-w-full h-36">
                    <p class="text-base font-medium tracking-wide text-gray-600 mt-1">
                        <?= substr($news->description, 0, 200) . '...' ?>
                    </p>
                </div>
                <button type="button"
                        onclick="window.location = '<?= $this->router->generate('newsDetails', ['id' => $news->id]) ?>'"
                        class="bg-indigo-600 hover:bg-blue-dark text-white font-bold py-3 px-6 rounded-lg mt-3 hover:bg-indigo-500 transition ease-in-out duration-300">
                    Lire la suite
                </button>
            </div>
            <div class="flex items-center lg:ml-8 my-2 lg:absolute lg:inset-x-0 lg:bottom-0 space-x-2">
                <div>
                    <p class="text-gray-900 font-semibold"><?= $news->publisher ?></p>
                    <p class="text-gray-500 font-semibold text-sm">
                        <?php
                        $dateObj = DateTime::createFromFormat('Y-m-d H:i:s', $news->creation_date);
                        echo $dateObj->format('j M Y');
                        ?>
                        &middot;<?php
                        $estimation = ceil((str_word_count($news->description) / 130));
                        echo $estimation . ($estimation > 1 ? ' minutes' : ' minute');
                        ?> de lecture
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <div class="py-8">
        <img class="mx-auto rounded-lg shadow-md"
             src="/images/miscs/newsmeme.png" alt="meme">
    </div>
<?php } ?>