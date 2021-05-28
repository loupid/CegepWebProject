<?php
if (!empty($newsList)) {
    
    $perPage = 3;
    $pageNum = ceil(count($newsList)/$perPage);
    
    if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p'] <= $pageNum) {
        $cPage = $_GET['p'];
    } else {
        $cPage = 1;
    }

    $newsShow = array_slice($newsList, (($cPage-1)*3), $perPage);

    ?>
    <div class="p-8 grid grid-cols-1 lg:grid-cols-3 gap-12 my-auto">
    <?php   

    foreach ($newsShow as $news) { 
        ?>
        <div class="group max-h-96 h-96 my-5 bg-white relative hover:shadow transition-all cursor-pointer"
                onclick="window.location = '<?= $this->router->generate('newsDetails', ['id' => $news->id]) ?>'">
                
                <img class="block h-full w-full"
                        src="/images/UploadedImages/<?= $news->file_name === '' ? 'default.png' : $news->file_name?>"
                        alt="news_image"/>

                <span class="absolute left-0 top-0 bg-gradient-to-t from-black w-full h-full">
                </span>

                <div class="absolute top-36 sm:top-60 lg:top-44 xl:top-52 2xl:top-56 left-5">
                    <p class="text-white opacity-75 font-semibold text-base mt-2"><?= $news->category ?>
                    </p>

                    <h1 class="text-white font-semibold mb-2 leading-none text-xl mt-1 capitalize truncate">
                        <?= $news->title ?>
                    </h1>

                    <p class="group-hover:text-red-600 text-base font-medium tracking-wide text-white opacity-75 mt-1 ">
                            <?= substr($news->description, 0, 100) . '...' ?>
                    </p>      
                </div> 
                <div class="absolute top-80 mt-8 left-5">
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
        <?php } 
        ?>
    </div>
<?php } else { ?>
    <div class="py-8">
        <img class="mx-auto rounded-lg shadow-md"
             src="/images/miscs/newsmeme.png" alt="meme">
    </div>
<?php } ?>

<?php
    if($pageNum >= 3) {
        ?>
        <div>
            <ul class="flex pl-0 list-none rounded my-5 mr-5 justify-center">
            <li class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-blue-700 border-r-0 ml-0 rounded-l hover:bg-gray-200 <?= ($cPage < 3) ? "hidden" : "" ?>">
                <a href="actualites?p=1">Première</a
            ></li>
            <?php
            $linkNum = $pageNum;
            if($pageNum > 5) {
                $linkNum = 5;
            }
            ?>
                <li class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-blue-700 border-r-0 ml-0 rounded-l hover:bg-gray-200 <?= ($cPage == 1) ? "hidden" : "" ?>">
                    <a class="page-link" href="actualites?p=<?=$cPage-1?>">Précédent</a>
                </li> 
                <?php                 
                for($i=($cPage-2); $i<=($cPage+2); $i++) {
                    if($i >= 1 && $i <= $pageNum) {
                    ?>
                    <li class="relative block py-2 px-3 leading-tight border border-gray-300 text-blue-700 border-r-0 hover:bg-gray-200 <?= ($i == $cPage) ? "bg-gray-300" : "bg-white" ?>">
                        <a class="page-link" href="actualites?p=<?=$i?>">
                        <?=$i?>
                        </a>
                    </li>
                <?php
                    }
                } ?>
                <li class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-blue-700 rounded-r hover:bg-gray-200 <?= ($cPage == $pageNum) ? "hidden" : "" ?>">
                    <a class="page-link" href="actualites?p=<?=$cPage+1?>">Suivant</a>
                </li>
            </ul>           
        </div>
    <?php } 
?>        