<section class="container max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 px-7 md:px-14 bg-yellow-lighten rounded-lg serma-home-hero-container"
        style="background-image: url('<?= get_stylesheet_directory_uri() ?>/assets/img/home/hero-bg.svg');">
        <div class="py-7 md:py-14">
            <h1 class="text-center md:text-left text-4-5xl md:text-6xl font-bold text-purple-lighten">Estamos contigo
            </h1>
            <p class="my-4 md:my-8 text-center md:text-left text-xs md:text-lg font-bold text-black">
                Antes <span class="text-[#FF7070] mx-2 md:mx-4">•</span> Durante <span
                    class="text-[#FF7070] mx-2 md:mx-4">•</span> Y después del embarazo
            </p>
            <h2 class="text-center md:text-left text-lg md:text-2xl text-secondary">
                Toda la información que necesitas sobre <br>
                el embarazo y la maternidad en línea.
            </h2>
            <button class="mt-6 rounded bg-green-lighten px-5 py-4 text-white font-regular hidden md:inline">
                +Únete a la comunidad
            </button>
        </div>
        <!-- ... -->
        <div class="md:pt-3 pb-3">
            <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/home/hero-image.png" alt="Estamos contigo">
            <div class="flex justify-center md:hidden">
                <button class="my-3 rounded bg-green-lighten px-4 py-3 text-white font-regular">
                    +Únete a la comunidad
                </button>
            </div>
        </div>
    </div>
</section>

<section class="relative container max-w-7xl mx-auto flex px-4 md:px-0 py-8">
    <div
        class="hidden md:flex cursor-pointer serma-carousel-arrow-left justify-center items-center bg-lighten-grey serma-carousel-arrow-left absolute inset-y-28 left-0 rounded-full w-10 h-10 z-10">
        <span class="fas fa-chevron-left text-secondary fa-lg text-center"></i>
    </div>

    <div
        class="hidden md:flex cursor-pointer serma-carousel-arrow-right justify-center items-center bg-lighten-grey serma-carousel-arrow-right absolute inset-y-28 right-0 rounded-full w-10 h-10 z-10">
        <span class="fas fa-chevron-right text-secondary fa-lg text-center"></span>
    </div>

    <div class="serma-carousel scroll-smooth container max-w-7xl mx-auto flex gap-4 pb-4 overflow-x-scroll md:overflow-hidden">
        <?= get_template_part('template-parts/home/carousel') ?>
    </div>

</section>