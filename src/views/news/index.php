<form action="<?= $this->router->generate("newsRecherche")?>" method="post">
<div class="text-gray-600 relative w-1/2 m-auto top-4 bot-4">
  <input type="search" name="search" placeholder="Search" class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none w-full">
  <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
      <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
    </svg>
  </button>
</div>
</form>

<?php
if (!empty($newsList)) {
    $ordreActif = "";
    if (!empty($_GET['ordre'])) {
        switch ($_GET['ordre']) {
            case 'nom':
                $ordreActif = "nom";
                foreach ($newsList as $news) {
                    $title[] = $news->title;
                }
                array_multisort($title, SORT_ASC, $newsList);
            break;
        }
    } ?>
    <section class="mt-5 w-1/2 mx-auto">
        <div class="mx-auto pt-5 border-b border-gray-200 flex justify-center">
            <label class="text-gray-600">Filtrer par :</label>
            <a href="./actualites" class="mx-5 text-gray-600 transition-colors pb-3 border-b cursor-pointer <?= ($ordreActif === "") ? "border-red-500 text-red-500" : "hover:text-black" ?>">Date de l'actualité</a>
            <a href="./actualites?ordre=nom" class="text-gray-600 transition-colors pb-3 border-b cursor-pointer <?= ($ordreActif === "nom") ? "border-red-500 text-red-500" : "hover:text-black" ?>">Ordre alphabétique</a>
        </div>
    </section>
    <div class="p-8 grid grid-cols-1 md:grid-cols-3 gap-3 my-auto">
    <?php
    foreach ($newsList as $news) { ?>
        <div class="group rounded-lg my-5 bg-white relative hover:shadow transition-all cursor-pointer"
                onclick="window.location = '<?= $this->router->generate('newsDetails', ['id' => $news->id]) ?>'">
                
                <img class="block rounded-lg h-full w-full"
                        src="/images/UploadedImages/<?= $news->file_name === '' ? 'default.png' : $news->file_name?>"
                        alt="news_image"/>

                <span class="absolute left-0 top-0 bg-gradient-to-t from-black w-full h-full">
                </span>

                <div class="absolute top-1/3 sm:top-1/2 md:top-5 lg:top-1/3 xl:top-12 2xl:top-1/2 left-5">
                    <p class="text-white opacity-75 font-semibold text-base mt-2"><?= $news->category ?>
                    </p>

                    <h1 class="text-white font-semibold mb-2 leading-none text-xl mt-1 capitalize truncate">
                        <?= $news->title ?>
                    </h1>

                    <p class="group-hover:text-red-600 text-base font-medium tracking-wide text-white opacity-75 mt-1 hidden sm:block">
                            <?= substr($news->description, 0, 150) . '...' ?>
                    </p> 

                    <div class="flex items-center my-2">
                        <div>
                            <p class="text-white opacity-25 font-semibold text-sm">
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
        </div>
        <?php } ?>
    </div>
<?php
} else { ?>
    <img class="py-8 mx-auto rounded-lg shadow-md" src="/images/miscs/newsmeme.png" alt="meme">
<?php } ?>
