<?php
if (!empty($newsList)) { ?>
    <div class="p-8 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3 my-auto">
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
<?php } else { ?>
    <div class="py-8">
        <img class="mx-auto rounded-lg shadow-md"
             src="/images/miscs/newsmeme.png" alt="meme">
    </div>
<?php } ?>