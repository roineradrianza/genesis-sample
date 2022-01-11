<header>
    <a class="skip-link screen-reader-text"
        href="#primary"><?php esc_html_e('Skip to content', 'ser-madre-theme');?></a>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="relative bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
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
                    <?php echo the_custom_logo() ?>
                </div>
                <nav class="hidden md:flex space-x-5">
                    <div class="relative mr-6 my-2 bg-lighten-grey border-0 py-2 px-4 max-h-48 rounded-full">
                        <form id="serma_search_form" action="<?= site_url() ?>" method="GET">
                            <input type="search" name="s"
                                class="text-base placeholder:text-icon bg-transparent border-0 p-1 w-96 rounded-full search-input"
                                placeholder="Buscar">
                            <button type="submit" class="mr-3 mt-1 float-right hover:bg-transparent">
                                <span class="fas fa-search text-icon"></span>
                            </button>
                        </form>
                    </div>
                </nav>
                <div class="flex items-center justify-end md:flex-1 lg:w-0">
                    <a href="#" class="inline-flex items-center font-medium text-secondary hover:text-gray-900">
                        <span class="mr-2 fas fa-user-circle fa-2x text-icon"></span>
                        <span class="hidden md:inline">Ingresa</span>
                    </a>
                    <a href="#"
                        class="hidden ml-8 whitespace-nowrap md:inline-flex items-center justify-center px-10 py-3 border border-black rounded-md shadow-sm text-base font-medium">
                        +Únete
                    </a>
                </div>
            </div>
        </div>

        <!--
                Mobile menu, show/hide based on mobile menu state.

                Entering: "duration-200 ease-out"
                From: "opacity-0 scale-95"
                To: "opacity-100 scale-100"
                Leaving: "duration-100 ease-in"
                From: "opacity-100 scale-100"
                To: "opacity-0 scale-95"
            -->
    </div>
</header>

<?php get_template_part( 'template-parts/layout/nav' ); ?>