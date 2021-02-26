<div class="div-fixed flex flex-col items-center">
    <!-- Vidéo de présentation -->
    <div class="center">
        <h2 class="sm:text-5xl text-4xl font-medium text-gray-900 p-3">Images du département</h2>
    </div>
    <br>
    <div class="wh-640 md:wh-768 lg:wh-1024 xl:wh-1280 2xl:wh-1536">
        <a-scene embedded="true" vr-mode-ui="enabled: false">
            <a-sky id="source" src="/images/360/IMG_20210211_135420_784.jpg" rotation="0 -90 0"></a-sky>
        </a-scene>
    </div>
    <br>
    <div class="grid grid-cols-4 auto-rows-auto gap-5 font-bold text-white">
        <a id="img1" class="bg-indigo-700 rounded-lg justify-center items-center transform scale-90 hover:scale-100 transition-transform cursor-pointer p-5">Image 1</a>
        <a id="img2" class="bg-indigo-700 rounded-lg justify-center items-center transform scale-90 hover:scale-100 transition-transform cursor-pointer p-5">Image 2</a>
        <a id="img3" class="bg-indigo-700 rounded-lg justify-center items-center transform scale-90 hover:scale-100 transition-transform cursor-pointer p-5">Image 3</a>
        <a id="img4" class="bg-indigo-700 rounded-lg justify-center items-center transform scale-90 hover:scale-100 transition-transform cursor-pointer p-5">Image 4</a>
        <a id="img5" class="bg-indigo-700 rounded-lg justify-center items-center transform scale-90 hover:scale-100 transition-transform cursor-pointer p-5">Image 5</a>
        <a id="img6" class="bg-indigo-700 rounded-lg justify-center items-center transform scale-90 hover:scale-100 transition-transform cursor-pointer p-5">Image 6</a>
        <a id="img7" class="bg-indigo-700 rounded-lg justify-center items-center transform scale-90 hover:scale-100 transition-transform cursor-pointer p-5">Image 7</a>
        <a id="img8" class="bg-indigo-700 rounded-lg justify-center items-center transform scale-90 hover:scale-100 transition-transform cursor-pointer p-5">Image 8</a>
    </div>
    <br>
</div>
<script>
    $("#img1").on('click', function (){
        $("#source").attr('src', '/images/360/IMG_20210211_135420_784.jpg');
    });

    $("#img2").on('click', function (){
        $("#source").attr('src', '/images/360/IMG_20210211_135446_282.jpg');
    });

    $("#img3").on('click', function (){
        $("#source").attr('src', '/images/360/IMG_20210211_140038_031.jpg');
    });

    $("#img4").on('click', function () {
        $("#source").attr('src', '/images/360/IMG_20210211_140200_411.jpg');
    });

    $("#img5").on('click', function () {
        $("#source").attr('src', '/images/360/IMG_20210211_140221_682.jpg');
    });

    $("#img6").on('click', function () {
        $("#source").attr('src', '/images/360/IMG_20210211_140246_290.jpg');
    });

    $("#img7").on('click', function () {
        $("#source").attr('src', '/images/360/IMG_20210211_140307_383.jpg');
    });

    $("#img8").on('click', function () {
        $("#source").attr('src', '/images/360/IMG_20210211_140428_244.jpg');
    });
</script>