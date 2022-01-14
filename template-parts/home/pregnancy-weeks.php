<div class="flex flex-row">

    <div class="flex-none bg-purple-lighten-2 px-0 md:px-5 py-3 md:py-6 rounded-lg-2x mr-3 md:mr-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 py-4">
            <div class="px-4 md:px-0">
                <h4 class="text-2xl font-semibold text-black mb-5 md:mb-10">
                    Primer
                    <br class="hidden md:inline">
                    trimestre
                </h4>
                <img class="pregnancy-image hidden md:inline"
                    src="<?=get_stylesheet_directory_uri()?>/assets/img/home/semanas-de-embarazo/primer-trimestre.png"
                    alt="primer trimestre" width="164" height="150">
            </div>
            <div class="grid grid-cols-5 md:grid-cols-3 gap-2 md:gap-4 px-4 md:px-0 md:pl-4">
                <?php for ($i=1; $i <= 13; $i++) : ?>
                <div class="w-11 h-10 day-default flex items-center justify-center hover:text-white">
                    <span class="flex-none"><?= $i ?></span>
                </div>
                <?php endfor ?>
            </div>
        </div>
    </div>

    <div class="flex-none bg-purple-lighten-3 px-0 md:px-5 py-3 md:py-6 rounded-lg-2x mr-3 md:mr-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 py-4">
            <div class="px-4 md:px-0">
                <h4 class="text-2xl font-semibold text-black mb-5 md:mb-10">
                    Segundo
                    <br class="hidden md:inline">
                    trimestre
                </h4>
                <img class="pregnancy-image hidden md:inline"
                    src="<?=get_stylesheet_directory_uri()?>/assets/img/home/semanas-de-embarazo/segundo-trimestre.png"
                    alt="segundo trimestre" width="164" height="150">
            </div>
            <div class="grid grid-cols-5 md:grid-cols-3 gap-2 md:gap-4 px-4 md:px-0 md:pl-4">
                <?php for ($i=14; $i <= 28; $i++) : ?>
                <div class="w-11 h-10 day-default flex items-center justify-center hover:text-white">
                    <?= $i ?>
                </div>
                <?php endfor ?>
            </div>
        </div>
    </div>


    <div class="flex-none bg-purple-lighten-4 px-0 md:px-5 py-3 md:py-6 rounded-lg-2x mr-3 md:mr-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 py-4">
            <div class="px-4 md:px-0">
                <h4 class="text-2xl font-semibold text-black mb-5 md:mb-10">
                    Tercer
                    <br class="hidden md:inline">
                    trimestre
                </h4>
                <img class="pregnancy-image hidden md:inline"
                    src="<?=get_stylesheet_directory_uri()?>/assets/img/home/semanas-de-embarazo/tercer-trimestre.png"
                    alt="tercer trimestre" width="164" height="150">
            </div>
            <div class="grid grid-cols-5 md:grid-cols-3 gap-2 md:gap-4 px-4 md:px-0 md:pl-4">
                <?php for ($i=29; $i <= 42; $i++) : ?>
                <div class="w-11 h-10 day-default flex items-center justify-center hover:text-white">
                    <?= $i ?>
                </div>
                <?php endfor ?>
            </div>
        </div>
    </div>

</div>