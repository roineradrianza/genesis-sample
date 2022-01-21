<header>
    <a class="skip-link screen-reader-text"
        href="#primary"><?php esc_html_e('Skip to content', 'ser-madre-theme');?></a>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="relative bg-white">
        <div class="max-w-screen-lg mx-auto px-4 md:px-0">
            <div class="flex justify-between items-center py-3 md:justify-start">
                <div class="-mr-2 -my-2 md:hidden">
                    <button type="button"
                        class="serma-menu-toggle-btn bg-white rounded-md p-2 inline-flex items-center justify-center text-icon hover:text-black focus:outline-none focus:text-black"
                        aria-expanded="false">
                        <span class="sr-only">Abrir menu</span>
                        <span class="fas fa-bars fa-lg mt-1" id="serma_menu_toggle_icon"></span>
                    </button>
                </div>
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <?= the_custom_logo() ?>
                </div>
                <nav class="hidden md:flex space-x-5">
                    <div class="relative mr-6 my-2 bg-lighten-grey border-0 py-2 px-4 max-h-48 rounded-full">
                        <form id="serma_search_form" action="<?= site_url() ?>" method="GET">
                            <input type="search" name="s"
                                class="text-base placeholder:text-icon bg-transparent border-0 p-1 w-96 rounded-full search-input"
                                placeholder="Buscar">
                            <button type="submit" class="mr-3 mt-1 float-right hover:bg-transparent">
                                <img class="w-4 h-5" src="<?= get_stylesheet_directory_uri() ?>/assets/icons/header/search.svg">
                            </button>
                        </form>
                    </div>
                </nav>
                <div id="dropdownButton" data-dropdown-toggle="dropdown"
                    class="flex items-center justify-end md:flex-1 lg:w-0">
                    <?php if (is_user_logged_in()) : ?>
                    <div href="#" class="inline-flex items-center font-medium text-secondary hover:text-gray-900">
                        <button class="focus:outline-0" id="dropdownButton"  data-dropdown-placement="bottom" data-dropdown-toggle="dropdownNavbar">

                        <?php if ( !empty(get_avatar_url( SERMA_USER::get_current()['id'] ) )) : ?>

                        <img class="rounded-full" src="<?= get_avatar_url( SERMA_USER::get_current()['id'] ) ?>" alt=""
                            width="35px" height="35px">

                        <?php else: ?>

                        <img class="w-7 h-7 mr-2" src="<?= get_stylesheet_directory_uri() ?>/assets/icons/header/avatar.svg">

                        <?php endif ?>

                        </button>
                        <div id="dropdownNavbar"
                            class="hidden z-50 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow">
                            <ul class="py-1 hidden" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 text-gray-700 hover:bg-gray-100">Dashboard</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="<?= esc_url(admin_url('admin-ajax.php')) . "?action=serma_logout" ?>"
                                    class="block py-2 px-4 hover:bg-gray-100">Cerrar sesión</a>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <a href="<?= site_url() ?>/login"
                        class="inline-flex items-center font-medium text-secondary hover:text-gray-900">
                        <img class="w-7 h-7 mr-2" src="<?= get_stylesheet_directory_uri() ?>/assets/icons/header/avatar.svg">
                        <span class="hidden md:inline">Ingresa</span>
                    </a>
                    <a href="<?= site_url() ?>/login"
                        class="hidden ml-8 whitespace-nowrap md:inline-flex items-center justify-center px-8 py-2.5 border border-black rounded-md shadow-sm text-base font-medium">
                        +Únete
                    </a>
                    <?php endif?>

                </div>
            </div>
        </div>
    </div>
</header>

<?php if($args['show_nav']): ?>
<?php get_template_part( 'template-parts/layout/nav' ); ?>
<?php endif ?>