<div class="flex flex-col items-center">
    <h2 class="justify-center items-center text-4xl font-thin text-blue-900 text-xl text-center font-extrabold text-gray-700 mb-5 p-3 overflow-y-auto">
        Images du département</h2>
    <div id="btn_next" class="hidden md:flex swiper-button-next w-16 h-16 text-xs rounded-full text-indigo-600"></div>
    <div class="rounded-lg mb-12">
        <div class="rounded-lg w-96 h-96">
            <a-scene embedded="true" vr-mode-ui="enabled: true">
                <a-sky id="source" src="/H2021/420626RI/Equipe_1/cegepwebproject/public/images/360/1.jpg" rotation="0 -90 0"></a-sky>
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
            $("#source").attr('src', '/H2021/420626RI/Equipe_1/cegepwebproject/public/images/360/' + ((parseInt(image[image.length - 2]) + 1) % 8) + '.jpg');
        });

        $("#btn_prev").on('click', function () {
            image = document.getElementById("source").getAttribute('src').split(/[/.]+/)
            $("#source").attr('src', '/H2021/420626RI/Equipe_1/cegepwebproject/public/images/360/' + (((parseInt(image[image.length - 2]) - 1) + 8) % 8) + '.jpg');
        });
    })
</script>