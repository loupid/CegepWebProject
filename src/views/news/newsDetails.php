<div class="p-8">
    <div class="md:p-8 p-2 rounded-lg mx-auto bg-white w-4/5">
        <div class="mb-4">
            <img class="rounded-lg w-full"
                 src="/images/UploadedImages/<?= $news->file_name === '' ? 'default.png' : $news->file_name ?>"
                 alt="news_image"/>

            <p class="text-indigo-500 font-semibold text-base mt-2"><?= $news->category ?></p>

            <h1 class="font-semibold mb-2 text-gray-900 leading-none text-xl mt-1 capitalize truncate">
                <?= $news->title ?>
            </h1>

            <div class="max-w-full">
                <p class="text-base font-medium tracking-wide text-gray-600 mt-1">
                    <?= $news->description ?>
                </p>
            </div>
        </div>
        <div class="flex items-center my-2 space-x-2">
            <div>
                <p class="text-gray-900 font-semibold"><?= $news->publisher ?></p>
                <p class="text-gray-500 font-semibold text-sm">
                    <?php
                    $dateObj = DateTime::createFromFormat('Y-m-d H:i:s', $news->creation_date);
                    echo $dateObj->format('j M Y');
                    ?>
                    &middot; <?php
                    $estimation = ceil((str_word_count($news->description) / 130));
                    echo $estimation . ($estimation > 1 ? ' minutes' : ' minute');
                    ?> de lecture
                </p>
            </div>
        </div>
    </div>
</div>

