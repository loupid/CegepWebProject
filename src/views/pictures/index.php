<div class="flex flex-col items-center">
    <h2 class="justify-center items-center sm:text-5xl text-xl font-medium text-gray-800 mb-5 p-3 overflow-y-auto">
        Images du département</h2>
    <div id="btn_next" class="hidden md:flex swiper-button-next w-16 h-16 text-xs rounded-full text-indigo-600"></div>
    <div class="rounded-lg">
        <div class=" rounded-lg wh-init rounded-lg sm:wh-640 md:wh-768 lg:wh-1024 xl:wh-1280 2xl:wh-1536">
            <a-scene embedded="true" vr-mode-ui="enabled: false">
                <a-sky id="source" src="/images/360/1.jpg" rotation="0 -90 0"></a-sky>
            </a-scene>
        </div>
    </div>
    <div id="btn_prev" class="hidden md:flex swiper-button-prev w-16 h-16 text-xs rounded-full text-indigo-600"></div>
</div>

<script>
    let image;
    $(document).ready( () =>{
        $("#btn_next").on('click', function () {
            image = document.getElementById("source").getAttribute('src').split(/[/.]+/)
            $("#source").attr('src', '/images/360/' + ((parseInt(image[image.length - 2]) + 1) % 8) + '.jpg');
        });

        $("#btn_prev").on('click', function () {
            image = document.getElementById("source").getAttribute('src').split(/[/.]+/)
            $("#source").attr('src', '/images/360/' + (((parseInt(image[image.length - 2]) - 1) + 8) % 8) + '.jpg');
        });
    })
</script>