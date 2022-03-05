<div class="w-full bg-[#F2F6FE] relative pb-6">
    <div class="max-w-[80px] hidden md:inline absolute right-0">
        <img class="w-[80px] float-right" src="<?= get_stylesheet_directory_uri() ?>/assets/img/search/figure-1.svg">
    </div>

    <div class="search-content max-w-screen-lg mx-auto px-4 md:px-0 md:flex space-x-10">
        <section class="post-container container max-w-[720px]">
            <div class="mb-4 border-b border-[#D4D5DA]">
                <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <?php foreach($args as $tab): ?>
                    <li class="w-full max-w-[110px]" role="presentation">
                        <button
                            class="py-4 px-4 text-lg font-normal text-black border-b outline-none focus:text-purple-darken focus:outline-none <?= $tab['default'] ? 'active' : '' ?>"
                            id="<?= $tab['tab_id'] ?>" data-tabs-target="#<?= $tab['target'] ?>_container" type="button"
                            role="tab" aria-controls="<?= $tab['target'] ?>_container"
                            aria-selected="<?= $tab['default'] ? 'true' : 'false' ?>"><?= $tab['tab_title'] ?></button>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="bg-primary py-2 px-6 text-16px text-white font-semibold flex items-center rounded-t-xl">
                <img class="mr-2" src="<?= get_stylesheet_directory_uri() ?>/assets/icons/search/list.svg" width="26px">
                Resultados de la búsqueda de “<?= get_search_query(); ?>”
            </div>
            <div id="myTabContent">
                <?php foreach($args as $tab): ?>

                <div class="<?= $tab['default'] ? '' : 'hidden' ?> pb-4 rounded-lg"
                    id="<?= $tab['target'] ?>_container" role="tabpanel" aria-labelledby="<?= $tab['tab_id'] ?>">
                    <div id="<?= $tab['target'] ?>_list" class="post-list">
                        <?php foreach ($tab['items'] as $post): ?>
                            <?php get_template_part( 'template-parts/search/post', '', $post ) ?>
                        <?php endforeach ?>
                    </div>
                    <?php if(!empty($tab['items']) && count($tab['items']) >= 5) : ?>
                    <div class="flex justify-center">
                        <button class="show_more_btn text-purple-darken text-14px p-2"
                            serma-list-target="#<?= $tab['target'] ?>_list"
                            serma-sm-post-type="<?= $tab['post_type'] ?>" serma-sm-post-page="1"
                            serma-sm-query='<?= get_search_query() ?>' onclick="get_more_posts(this)">
                            <span class="flex items-center title_container">
                                Mostrar más <img
                                    src="<?= get_stylesheet_directory_uri() ?>/assets/icons/search/arrow-down.svg"
                                    width="16px">
                            </span>

                        </button>
                    </div>
                    <?php elseif (empty($tab['items'])) : ?>
                    <div class="p-6">
                        <p>No se han encontrado resultados en la búsqueda</p>
                    </div>
                    <?php endif ?>
                </div>
                <?php endforeach ?>
            </div>
        </section>
        <aside class="sidebar container max-w-[280px] md:max-w-[320px]">
            <?php // do_action( 'genesis_sidebar' ) ?>
        </aside>
    </div>

    <div class="max-w-[80px] hidden md:inline absolute left-0 bottom-1">
        <img class="w-[80px]" src="<?= get_stylesheet_directory_uri() ?>/assets/img/search/figure-2.svg">
    </div>
</div>