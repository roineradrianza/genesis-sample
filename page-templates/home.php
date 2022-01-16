<section class="container max-w-7xl mx-auto">
    <div
        class="grid grid-cols-1 md:grid-cols-2 gap-4 px-7 md:px-14 bg-yellow-lighten rounded-lg serma-home-hero-container">
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

        <div class="md:pt-3 pb-3">
            <img src="<?=get_stylesheet_directory_uri()?>/assets/img/home/hero-image.png" alt="Estamos contigo">
            <div class="flex justify-center md:hidden">
                <button class="my-3 rounded bg-green-lighten px-4 py-3 text-white font-regular">
                    +Únete a la comunidad
                </button>
            </div>
        </div>
    </div>
</section>

<section class="relative container max-w-7xl mx-auto flex px-4 xl:px-0 py-8">
    <div class="hidden md:flex cursor-pointer serma-carousel-arrow-left justify-center items-center bg-lighten-grey serma-carousel-arrow-left absolute inset-y-28 left-0 rounded-full w-10 h-10 z-10"
        serma-carousel-target="areas_carousel">
        <span class="fas fa-chevron-left text-secondary fa-sm text-center"></i>
    </div>

    <div class="hidden md:flex cursor-pointer serma-carousel-arrow-right justify-center items-center bg-lighten-grey serma-carousel-arrow-right absolute inset-y-28 right-0 rounded-full w-10 h-10 z-10"
        serma-carousel-target="areas_carousel">
        <span class="fas fa-chevron-right text-secondary fa-sm text-center"></span>
    </div>

    <div class="serma-carousel scroll-smooth container max-w-7xl mx-auto flex gap-4 pb-4 overflow-x-scroll md:overflow-hidden"
        serma-carousel-id="areas_carousel">
        <?=get_template_part('template-parts/home/carousel')?>
    </div>

</section>

<section class="relative container max-w-7xl mx-auto px-4 xl:px-0 py-8">
    <h3 class="text-purple-darken text-lg md:text-xl font-medium text-center mb-6">Artículos médicos</h3>
    <h2 class="text-black text-2xl md:text-4xl text-center font-semibold mb-8">
        Contenidos sobre maternidad y embarazo
        <br>
        verificados por especialistas
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <div class="rounded-lg border-2 border-t-0 border-gray-300">
                <div class="relative serma-image-container ml-n1">
                    <a href="<?= $args['medical_articles'][0]['link'] ?>" target="_blank">
                        <img class="rounded-lg" src="<?=$args['medical_articles'][0]['featured_image']?>">
                        <div class="bg-gradient-to-b from-transparent to-neutral-800 h-14 w-full absolute bottom-0">
                    </a>
                    <span
                        class="absolute bottom-6 left-8 text-white font-normal text-md capitalize "><?=wp_date('F j, Y', strtotime($args['medical_articles'][0]['published_at']))?></span>
                    <button
                        class="cursor-default h-10 px-3 md:px-5 text-white bg-green-lighten rounded-lg absolute bottom-5 right-8">
                        <span class="flex">
                            <img class="mr-0 md:mr-2"
                                src="<?=get_stylesheet_directory_uri()?>/assets/icons/article/verificado.svg"
                                width="20px" height="20px">
                            <span class="hidden md:inline text-sm font-normal">Verificado por un especialista</span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="serma-post-content-container px-8 pt-4 pb-8">
                <p class="serma-category text-primary mb-2 font-medium">
                    <?=$args['medical_articles'][0]['category']['name']?></p>
                <h4 class="text-black text-xl md:text-3xl font-semibold">
                    <a href="<?= $args['medical_articles'][0]['link'] ?>" target="_blank">
                        <?=$args['medical_articles'][0]['title']?>
                    </a>
                </h4>
            </div>
        </div>

    </div>

    <div>
        <?php unset($args['medical_articles'][0]) ?>
        <?php foreach ( $args['medical_articles'] as $article ): ?>
        <div class="grid grid-cols-2 gap-2 py-2">
            <div class="md:px-6">
                <div class="relative">
                    <a href="<?= $article['link'] ?>" target="_blank">
                        <img class="rounded-lg md:rounded-none md:rounded-l-lg" src="<?= $article['featured_image'] ?>">
                    </a>
                    <div
                        class="rounded-lg md:rounded-none md:rounded-l-lg bg-gradient-to-b from-transparent to-neutral-800 h-14 w-full absolute bottom-0">
                        <span
                            class="absolute bottom-3 left-4 text-white font-normal text-sm hidden md:inline capitalize "><?= wp_date('F j, Y', strtotime($article['published_at'])) ?></span>
                        <button
                            class="cursor-default h-10 px-3 text-white bg-green-lighten rounded-lg absolute bottom-3 right-4">
                            <span class="flex">
                                <img class="mr-0"
                                    src="<?=get_stylesheet_directory_uri()?>/assets/icons/article/verificado.svg"
                                    width="20px" height="20px">
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="md:col-auto serma-post-content-container pl-1 md:pl-0 md:px-4 md:pb-4">
                <p class="text-xs md:text-md serma-category text-primary md:mb-2 font-medium">
                    <?= $article['category']['name'] ?>
                </p>
                <h4 class="text-black text-sm md:text-xl font-semibold mb-1 md:mb-2">
                    <a href="<?= $article['link'] ?>" target="_blank">
                        <?= $article['title'] ?>
                    </a>
                </h4>
                <p class="text-sm hidden md:inline"> <?= $article['excerpt'] ?></p>
                <p class="text-secondary font-normal text-xs md:hidden capitalize ">
                    <?= wp_date('F j, Y', strtotime($article['published_at'])) ?></p>
            </div>
        </div>
        <?php endforeach ?>
    </div>

</section>


<section
    class="serma-home-pregnancy-week-container relative container max-w-full px-4 xl:px-0 py-12 md:py-16 bg-purple-lighten-1">
    <div class="relative container max-w-7xl mx-auto">
        <h2 class="text-black text-2xl md:text-4xl text-center font-semibold mb-4 md:mb-8">
            Tu embarazo semana tras semana
        </h2>
        <h3 class="text-lg md:text-xl font-medium text-center mb-5 md:mb-10">
            Conoce el desarrollo de tu bebé en
            cada una de las etapas en la que te encuentres.
        </h3>
    </div>
    <div
        class="relative container max-w-7xl px-2 md:px-4 mx-auto scroll-smooth overflow-x-scroll md:overflow-x-visible">
        <?=get_template_part('template-parts/home/pregnancy-weeks')?>
    </div>
</section>

<section class="relative container max-w-7xl mx-auto px-4 xl:px-0 py-8"
    style="background-image: url('<?=get_stylesheet_directory_uri()?>/assets/img/semanas-de-embarazo/section-bg.svg');">
    <h3 class="text-purple-darken text-lg md:text-xl font-medium text-center mb-6">Novedades</h3>
    <h2 class="text-black text-2xl md:text-4xl text-center font-semibold mb-8">
        Consejos y tips que acompañan a las
        <br class="hidden md:inline">
        mamás en su etapa de maternidad
    </h2>

    <div class="relative container max-w-7xl px-2 md:px-4 mx-auto">
        <div class="hidden md:flex cursor-pointer serma-carousel-arrow-left justify-center items-center bg-lighten-grey serma-carousel-arrow-left absolute left-0 rounded-full w-10 h-10 z-10"
            serma-carousel-target="blog_categories">
            <span class="fas fa-chevron-left text-secondary fa-sm text-center"></i>
        </div>

        <div class="hidden md:flex cursor-pointer serma-carousel-arrow-right justify-center items-center bg-lighten-grey serma-carousel-arrow-right absolute right-0 rounded-full w-10 h-10 z-10"
            serma-carousel-target="blog_categories">
            <span class="fas fa-chevron-right text-secondary fa-sm text-center"></span>
        </div>

        <div class="serma-carousel relative container max-w-7xl md:max-w-6xl px-2 md:px-4 mx-auto md:mx-2 scroll-smooth overflow-x-scroll md:overflow-x-hidden"
            serma-carousel-id="blog_categories">
            <?=get_template_part('template-parts/home/blog/categories-carousel', null, $args)?>
        </div>

    </div>

    <div class="container max-w-7xl mx-auto mt-10">
        <?=get_template_part('template-parts/home/blog/articles', null, $args)?>
    </div>
</section>

<section class="container max-w-7xl mx-auto">
    <div
        class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-16 mx-4 md:mx-0 px-7 md:px-14 bg-purple-lighten rounded-lg serma-community-cta-container">
        <div class="pt-4 md:pt-12">
            <h2 class="text-center md:text-left text-3xl md:text-5xl font-light text-white">
                Obtén un acceso a la <span class="font-bold">comunidad</span>
            </h2>
            <p class="my-2 md:my-6 text-center md:text-left font-light text-md md:text-lg text-white">
                Tu experiencia podria ayudar a una mami con dificultad.
            </p>
            <div class="flex justify-center md:inline">
                <button class="rounded bg-white px-7 py-2 font-normal">
                    <span class="flex items-center text-black">
                        <img class="w-6 h-6 md:w-8 md:h-8 mr-2"
                            src="<?=get_stylesheet_directory_uri()?>/assets/icons/community-invitation/cta-icon.svg"
                            width="30px" height="30px">
                        ¡Invitación limitada!
                    </span>
                </button>
            </div>
        </div>

        <div class="md:pt-3 pb-3">
            <img src="<?=get_stylesheet_directory_uri()?>/assets/img/home/comunidad/comunidad-preview.png"
                alt="Acceso a la comunidad">
        </div>
    </div>
</section>


<section class="relative container hidden md:block max-w-7xl mx-auto px-4 xl:px-0 py-8 break-all">
    <h2 class="text-black text-2xl font-semibold mb-8">
        SerMadre es un sitio web sobre el embarazo y la maternidad
    </h2>

    <p class="text-base text-secondary">Diarios de embarazo y desarrollo infantil, calendario de embarazo, revisiones de
        productos, atención de
        maternidad y muchas otras secciones y servicios útiles. Diarios de embarazo y desarrollo infantil, calendario de
        embarazo, revisiones de productos, atención de maternidad y muchas otras secciones y servicios útiles. Diarios
        de embarazo y desarrollo infantil, calendario de embarazo, revisiones de productos, atención de maternidad y
        muchas otras secciones y servicios útiles. Diarios de embarazo y desarrollo infantil, calendario de embarazo,
        revisiones de productos, atención de maternidad y muchas otras secciones y servicios útiles. Diarios de embarazo
        y desarrollo infantil, calendario de embarazo, revisiones de productos, atención de maternidad y muchas otras
        secciones y servicios útiles.
    </p>
</section>