<section class="container max-w-screen-lg mx-auto md:mt-6">
    <div
        class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-16 px-7 md:px-14 bg-yellow-lighten rounded-lg serma-home-hero-container">
        <div class="py-7 md:py-10">
            <h1 class="text-center md:text-left text-36px md:text-48px font-bold text-purple-lighten">Te acompañamos

            </h1>
            <p class="my-4 md:my-6 text-center md:text-left text-12px md:text-14px font-bold text-black">
                Antes <span class="text-[#FF7070] mx-2 md:mx-4">•</span> Durante <span
                    class="text-[#FF7070] mx-2 md:mx-4">•</span> Y después del embarazo
            </p>
            <h2 class="text-center md:text-left text-14px md:text-18px text-secondary">
                El contenido que necesitas para disfrutar del <br> privilegio de ser madre.
            </h2>
            <button class="mt-6 rounded bg-green-lighten px-5 py-4 text-white font-regular hidden md:inline">
                +Únete a la comunidad
            </button>
        </div>

        <div class="md:pt-3 pb-3 md:flex items-center">
            <div>
                <img class="md:w-4/5 mx-auto" loading="lazy"
                    src="<?=get_stylesheet_directory_uri()?>/assets/img/home/hero-image.png" alt="Estamos contigo">
            </div>
            <div class="flex justify-center md:hidden">
                <button class="my-3 rounded text-14px bg-green-lighten px-4 py-3 text-white font-regular">
                    +Únete a la comunidad
                </button>
            </div>
        </div>
    </div>
</section>

<section class="relative container max-w-screen-lg mx-auto flex px-4 xl:px-0 pt-8 md:py-8">
    <div class="group hover:bg-purple-darken hidden md:flex cursor-pointer serma-carousel-arrow-left justify-center items-center bg-lighten-grey serma-carousel-arrow-left absolute inset-y-20 left-0 rounded-full w-9 h-9 z-10"
        serma-carousel-target="areas_carousel">
        <span class="group-hover:text-white fas fa-chevron-left text-secondary fa-sm text-center"></i>
    </div>

    <div class="group hover:bg-purple-darken hidden md:flex cursor-pointer serma-carousel-arrow-right justify-center items-center bg-lighten-grey serma-carousel-arrow-right absolute inset-y-20 right-0 rounded-full w-9 h-9 z-10"
        serma-carousel-target="areas_carousel">
        <span class="group-hover:text-white fas fa-chevron-right text-secondary fa-sm text-center"></span>
    </div>

    <div class="serma-carousel scroll-smooth container max-w-screen-lg mx-auto flex gap-4 pb-4 overflow-x-scroll md:overflow-hidden invisible-scrollbar"
        serma-carousel-id="areas_carousel">
        <?=get_template_part('template-parts/home/carousel')?>
    </div>

</section>

<section class="relative container max-w-screen-lg mx-auto px-4 xl:px-0 py-4 md:py-8">
    <h3 class="text-purple-darken text-13px md:text-14px font-medium text-center mb-2 md:mb-6">Artículos médicos</h3>
    <h2 class="text-black text-18px md:text-2.8xl text-center font-semibold mb-8">
        Especialistas hablan sobre 
        <br class="md:hidden">
        maternidad y
        <br class="hidden md:inline">
        embarazo
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-0">
        <div class="group relative border border-gray-300 rounded-lg">
            <div class="rounded-lg">
                <div class="relative serma-image-container">
                    <a href="<?= $args['medical_articles'][0]['link'] ?>" target="_blank">
                        <img loading="lazy" class="rounded-lg"
                            src="<?=$args['medical_articles'][0]['featured_image']?>">
                        <div
                            class="bg-gradient-to-b from-transparent to-neutral-800 h-10 md:h-14 w-full absolute bottom-0">
                    </a>
                    <span
                        class="absolute bottom-3 md:bottom-6 left-4 md:left-8 text-white font-normal text-12px sm:hidden lg:inline md:text-md capitalize"><?=wp_date('F j, Y', strtotime($args['medical_articles'][0]['published_at']))?></span>
                    <button
                        class="cursor-default w-7 md:w-auto h-7 px-2 md:h-8 md:px-3 text-white bg-green-lighten md:rounded-md absolute bottom-3 md:bottom-5 right-4 md:right-8">
                        <span class="flex">
                            <img loading="lazy" class="mr-0 md:mr-2"
                                src="<?=get_stylesheet_directory_uri()?>/assets/icons/article/verificado.svg"
                                width="17px" height="17px">
                            <span class="hidden md:inline font-normal text-12px">Verificado por un especialista</span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="serma-post-content-container px-3 md:px-8 pt-4 pb-8">
                <p class="serma-category text-primary mb-2 font-medium text-12px">
                    <?=$args['medical_articles'][0]['category']['name']?></p>
                <h4 class="text-black group-hover:text-purple-darken text-16px md:text-18px font-semibold">
                    <a class="hover:text-purple-darken" href="<?= $args['medical_articles'][0]['link'] ?>"
                        target="_blank">
                        <?=$args['medical_articles'][0]['title']?>
                    </a>
                </h4>
            </div>
        </div>

    </div>

    <div class="mt-4 mb-10 md:mt-0 md:mb-0 grid grid-cols-1 gap-y-4">
        <?php unset($args['medical_articles'][0]) ?>
        <?php foreach ( $args['medical_articles'] as $article ): ?>
        <div class="group relative grid grid-cols-3 md:grid-cols-2 gap-3 md:gap-0">
            <div class="md:px-6">
                <div class="relative">
                    <a href="<?= $article['link'] ?>" target="_blank">
                        <img loading="lazy"
                            class="w-full md:w-auto h-24 md:h-auto object-cover rounded-lg md:rounded-none md:rounded-l-lg"
                            src="<?= $article['featured_image'] ?>">
                    </a>
                    <div
                        class="rounded-lg md:rounded-none md:rounded-l-lg md:bg-gradient-to-b from-transparent to-neutral-800 h-14 w-full absolute bottom-0">
                        <span
                            class="absolute bottom-2 md:bottom-3 left-4 text-white font-normal hidden lg:inline capitalize text-md"><?= wp_date('F j, Y', strtotime($article['published_at'])) ?></span>
                        <button
                            class="cursor-default w-7 md:w-auto h-7 md:h-8 px-2 text-white bg-green-lighten md:rounded-md absolute bottom-2 md:bottom-3 right-2 md:right-4">
                            <span class="flex">
                                <img loading="lazy" class="mr-0"
                                    src="<?=get_stylesheet_directory_uri()?>/assets/icons/article/verificado.svg"
                                    width="15px" height="15px">
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-span-2 md:col-auto serma-post-content-container pl-1 md:pl-0 md:px-2">
                <p class="text-12px serma-category text-primary mb-2 font-medium">
                    <?= $article['category']['name'] ?>
                </p>
                <h4 class="text-black group-hover:text-purple-darken text-14px md:text-16px font-semibold mb-1 md:mb-2">
                    <a class="hover:text-purple-darken" href="<?= $article['link'] ?>" target="_blank">
                        <?= $article['title'] ?>
                    </a>
                </h4>
                <p class="text-14px hidden md:inline"> <?= $article['excerpt'] ?></p>
                <p class="text-12px md:text-base text-secondary font-normal md:hidden capitalize ">
                    <?= wp_date('F j, Y', strtotime($article['published_at'])) ?></p>
            </div>
        </div>
        <?php endforeach ?>
    </div>

</section>

<section
    class="serma-home-pregnancy-week-container relative container max-w-full px-4 xl:px-0 py-12 md:py-16 bg-purple-lighten-1">
    <div class="relative container max-w-screen-lg mx-auto">
        <h2 class="text-black text-18px md:text-2.8xl text-center font-semibold mb-4 md:mb-8">
            Tú bebé, semana a semana
        </h2>
        <h3 class="text-secondary text-14px font-medium text-center mb-7 md:mb-10">
            Conoce cómo se desarrolla tu bebé en cada mes de gestación
        </h3>
    </div>
    <div
        class="relative container max-w-screen-lg px-2 md:px-0 mx-auto scroll-smooth overflow-x-scroll lg:overflow-x-visible invisible-scrollbar">
        <?=get_template_part('template-parts/home/pregnancy-weeks')?>
    </div>
</section>

<section class="relative container max-w-screen-lg mx-auto px-4 xl:px-0 pb-0 md:pb-12 py-10">
    <h3 class="text-purple-darken text-13px md:text-14px font-semibold text-center mb-2 md:mb-6">Novedades</h3>
    <h2 class="text-black text-18px md:text-2.8xl text-center font-semibold mb-8">
        Información, recomendaciones y 
        <br class="md:hidden">
        tips que 
        <br class="hidden md:inline">
        acompañan la aventura de ser madre
    </h2>

    <div class="relative container max-w-screen-lg px-2 md:px-4 mx-auto">
        <div class="group hover:bg-purple-darken hidden md:flex cursor-pointer serma-carousel-arrow-left justify-center items-center bg-lighten-grey serma-carousel-arrow-left absolute left-0 rounded-full w-10 h-10 z-10"
            serma-carousel-target="blog_categories">
            <span class="group-hover:text-white fas fa-chevron-left text-secondary fa-sm text-center"></i>
        </div>

        <div class="group hover:bg-purple-darken hidden md:flex cursor-pointer serma-carousel-arrow-right justify-center items-center bg-lighten-grey serma-carousel-arrow-right absolute right-0 rounded-full w-10 h-10 z-10"
            serma-carousel-target="blog_categories">
            <span class="group-hover:text-white fas fa-chevron-right text-secondary fa-sm text-center"></span>
        </div>

        <div class="serma-carousel relative container max-w-screen-lg md:max-w-4xl mx-auto scroll-smooth overflow-x-scroll md:overflow-x-hidden invisible-scrollbar"
            serma-carousel-id="blog_categories">
            <?=get_template_part('template-parts/home/blog/categories-carousel', null, $args)?>
        </div>

    </div>

    <div class="container max-w-screen-lg mx-auto mt-10">
        <?=get_template_part('template-parts/home/blog/articles', null, $args)?>
    </div>
</section>

<section
    class="container max-w-full py-10 md:py-16 md:mb-12 mt-6 border-gray-300 bg-[#F2F6FE] bg-[length:0px] md:bg-auto md:bg-transparent serma-utilities-container">
    <div class="relative container max-w-screen-lg mx-auto">
        <h3 class="text-purple-darken text-13px md:text-14px font-medium text-center mb-2 md:mb-6">Encuentra</h3>
        <h2 class="text-black text-18px md:text-2.8xl text-center font-semibold mb-8 px-4 md:px-0">
            Los mejores nombres para bebé, 
            <br class="md:hidden">
            cuentos 
            <br class="hidden md:inline">
            infantiles y dibujos para colorear están aquí
        </h2>
        <div
            class="relative container max-w-screen-lg col-span-3 md:col-span-2 mx-auto scroll-smooth overflow-x-scroll md:overflow-x-hidden invisible-scrollbar">
            <?=get_template_part('template-parts/home/utilities', null, $args)?>
        </div>
    </div>
</section>

<section class="container max-w-screen-lg mx-auto mb-2 md:my-8 py-4 md:py-8 md:border-t border-gray-300 md:pt-12">
    <div class="grid grid-cols-3 gap-4 mx-4 md:mx-0">
        <div class="col-span-3 md:col-span-1 pt-8">
            <h2 class="text-center md:text-left text-18px md:text-24px text-black font-semibold">
                ¿Necesitas asesoría? 
                <br class="md:hidden">
                Contacta a un especialista
            </h2>
            <p class="text-center md:text-left text-14px text-secondary my-3 md:my-6">
                Ofrecemos asesorías virtuales sobre <span class="hidden md:inline">→</span>
            </p>
        </div>
        <div
            class="relative container max-w-screen-lg col-span-3 md:col-span-2 mx-auto scroll-smooth overflow-x-scroll md:overflow-x-visible invisible-scrollbar">
            <div class="flex flex-row space-x-5">
                <div class="flex-none md:flex-auto w-11/12 md:w-auto">
                    <div class="grid grid-cols-2 bg-red-lighten-1 rounded-lg">
                        <div class="pt-8 pl-6">
                            <h2 class="text-black text-16px md:text-18px font-semibold mb-4">
                                Lactancia
                                <br class="md:hidden">
                                Materna
                            </h2>
                            <div class="pb-1 inline hover:border-b hover:border-purple-darken">
                                <button class="bg-transparent font-normal text-purple-darken text-14px">
                                    Ver detalles <span class="ml-1 fas fa-arrow-right fa-xs"></span>
                                </button>
                            </div>
                        </div>

                        <div>
                            <img loading="lazy"
                                src="<?=get_stylesheet_directory_uri()?>/assets/img/home/especialistas/cta-1.png"
                                alt="Acceso a la comunidad">
                        </div>
                    </div>
                </div>
                <div class="flex-none md:flex-auto w-11/12 md:w-auto">
                    <div class="grid grid-cols-2 bg-green-lighten-1 rounded-lg">
                        <div class="pt-8 pl-6">
                            <h2 class="text-black text-16px md:text-18px font-semibold mb-4">
                                Psicología
                                <br class="md:hidden">
                                Prenatal
                            </h2>
                            <div class="pb-1 inline hover:border-b hover:border-purple-darken">
                                <button class="bg-transparent font-normal text-purple-darken text-14px">
                                    Ver detalles <span class="ml-1 fas fa-arrow-right fa-xs"></span>
                                </button>
                            </div>
                        </div>

                        <div>
                            <img loading="lazy"
                                src="<?=get_stylesheet_directory_uri()?>/assets/img/home/especialistas/cta-2.png"
                                alt="Acceso a la comunidad">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<section class="container max-w-screen-lg mt-6 md:mt-auto mx-auto">
    <div
        class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-16 mx-4 md:mx-0 py-4 md:py-0 px-7 md:px-14 bg-[#a28eece6] rounded-2xl serma-community-cta-container">
        <div class="pt-4 md:pt-12">
            <h2 class="text-center md:text-left text-24px md:text-40px font-light text-white">
                Sé parte de nuestra <br>
                <span class="font-bold">comunidad</span>
            </h2>
            <p class="my-2 md:my-6 text-center md:text-left font-light text-13px md:text-14px text-white">
                Ayuda a otras madres compartiendo tu 
                <br class="md:hidden">
                experiencia
            </p>
            <div class="flex justify-center md:inline">
                <button class="group relative rounded bg-white sm:mb-10 px-5 py-2 font-normal">
                    <span class="flex items-center text-black">
                        <img loading="lazy" class="group-hover:hidden w-6 h-6 mr-2"
                            src="<?=get_stylesheet_directory_uri()?>/assets/icons/community-invitation/cta-icon.svg"
                            width="20px" height="20px">
                        <img loading="lazy" class="group-hover:inline hidden w-6 h-6 mr-2"
                            src="<?=get_stylesheet_directory_uri()?>/assets/icons/community-invitation/cta-icon-2.svg"
                            width="20px" height="20px">
                        <span class="group-hover:text-purple-darken">
                            ¡Invitación limitada!
                        </span>
                    </span>
                </button>
            </div>
        </div>

        <div class="md:pt-3 pb-3 flex lg:inline items-center">
            <img loading="lazy"
                src="<?=get_stylesheet_directory_uri()?>/assets/img/home/comunidad/comunidad-preview.png"
                alt="Acceso a la comunidad">
        </div>
    </div>
</section>

<section class="relative container hidden md:block max-w-screen-lg mx-auto px-4 xl:px-0 py-8">
    <h2 class="text-black text-24px font-semibold mb-8">
        SerMadre: tu sitio web sobre embarazo y maternidad
    </h2>

    <p class="text-14px text-secondary break-all">
        Ser Madre es una ventana de información dirigida a mujeres que
        transitan el viaje de la maternidad en cualquiera de sus etapas. Brinda contenidos, atiende sus dudas, escucha
        sus experiencias y las hace parte de una comunidad de mamás que quieren estar conectadas para forjar relaciones
        e intercambiar historias.
    </p>
</section>