<form action="<?= $ordreActif === "" ? $this->router->generate("newsIndex") : $this->router->generate("newsIndexOA") ?>"
      method="post">
    <div class="text-gray-600 relative w-1/2 m-auto top-4 bot-4">
        <input type="search" name="search" placeholder="Recherche" value="<?= $search ?? ''?>"
               class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none w-full">
        <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                 viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                 width="512px" height="512px">
      <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
    </svg>
        </button>
    </div>
</form>

<?php
if (!empty($newsList)) { ?>
    <section class="mt-5 w-1/2 mx-auto">
        <div class="mx-auto pt-5 border-b border-gray-200 flex justify-center">
            <label class="text-gray-600">Trier par :</label>
            <a href=".<?= $this->router->generate("newsIndex") ?>"
               class="mx-5 text-gray-600 transition-colors pb-3 border-b cursor-pointer <?= ($ordreActif === "") ? "border-red-500 text-red-500" : "hover:text-black" ?>">Date
                de l'actualité</a>
            <a href=".<?= $this->router->generate("newsIndexOA") ?>"
               class="text-gray-600 transition-colors pb-3 border-b cursor-pointer <?= ($ordreActif === "nom") ? "border-red-500 text-red-500" : "hover:text-black" ?>">Ordre
                alphabétique</a>
        </div>
    </section>
    <div class="p-8 grid grid-cols-1 md:grid-cols-3 gap-3 my-auto">
        <?php
        foreach ($newsList as $news) { ?>
            <div class="md:p-8 p-2 rounded-lg bg-white relative">
                <div class="mb-4">
                    <img class="rounded-lg w-full"
                         src="/images/UploadedImages/<?= $news->file_name === '' ? 'default.png' : $news->file_name ?>"
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
    <?php
} else { ?>
    <img class="py-8 mx-auto rounded-lg shadow-md" src="/images/miscs/newsmeme.png" alt="meme">
<?php } ?>
