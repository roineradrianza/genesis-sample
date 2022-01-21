<nav class="serma-nav-menu hidden md:block md:border-y-2 border-gray-300 relative z-20 bg-white">
    <div class="container mx-auto max-w-screen-lg">
        <div class="flex md:hidden justify-center">
            <div class="my-2 bg-lighten-grey border-0 w-full mx-5 py-1 px-4 max-h-10 rounded-full">
                <form id="serma_search_form" action="<?= site_url() ?>" method="GET">
                    <input type="search" name="s"
                        class="text-base placeholder:text-icon bg-transparent border-0 p-1 w-11/12 rounded-full search-input"
                        placeholder="Buscar">
                    <button type="submit" class="mr-1 mt-1 float-right hover:bg-transparent">
                        <img class="w-4 h-5" src="<?= get_stylesheet_directory_uri() ?>/assets/icons/header/search.svg">
                    </button>
                </form>
            </div>
        </div>
        <ul class="flex flex-col md:flex-row mb-n1">
            <li class="flex-1 md:mr-2 py-2">
                <a class="flex text-center items-center block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4 md:text-black text-[#262D47]"
                    href="#">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/icons/nav/comunidad.svg"
                        alt="Comunidad" width="30px" height="30px">
                    <span class="ml-2 font-bold md:font-normal">Comunidad</span>
                </a>
            </li>
            <li class="flex-1 md:mr-2 py-2 relative group">
                <a class="group-hover flex text-center items-center block border border-white rounded hover:border-gray-200 text-blue-500 group-hover:bg-gray-200 hover:bg-gray-200 py-2 px-4 md:text-black text-[#262D47]"
                    href="#">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/icons/nav/utilidades.svg"
                        alt="Comunidad" width="30px" height="30px">
                    <span class="w-full text-left ml-2 font-bold md:font-normal">Utilidades</span>
                    <div>
                        <span class="fas fa-chevron-down text-icon mr-1 fa-sm group-hover:hidden text-right"></span>
                        <span class="fas fa-chevron-up text-icon mr-1 fa-sm hidden group-hover:block text-right"></span>
                    </div>
                </a>
                <ul
                    class="top-13 w-full origin-top md:w-80 p-8 border-x-2 border-b-2 border-gray-300 md:mt-3 
                        serma-submenu md:absolute z-10 hidden bg-white group-hover:block rounded-b-md transition duration-300 delay-150 hover:delay-150">
                    <li>
                        <span class="fas fa-chevron-right text-[#585CE5] mr-1 fa-sm hidden md:inline-block"></span>
                        <a href="#" class="ml-5 md:ml-0">Nombre para bebés</a>
                    </li>

                    <li class="pt-4">
                        <span class="fas fa-chevron-right text-[#585CE5] mr-1 fa-sm hidden md:inline-block"></span>
                        <a href="#" class="ml-5 md:ml-0">Cuentos infantiles</a>
                    </li>

                    <li class="pt-4">
                        <span class="fas fa-chevron-right text-[#585CE5] mr-1 fa-sm hidden md:inline-block"></span>
                        <a href="#" class="ml-5 md:ml-0">Dibujos para colorear</a>
                    </li>

                    <li class="pt-4">
                        <span class="fas fa-chevron-right text-[#585CE5] mr-1 fa-sm hidden md:inline-block"></span>
                        <a href="#" class="ml-5 md:ml-0">Calendario de embarazo</a>
                    </li>
                </ul>
            </li>
            <li class="flex-1 md:mr-2 py-2 relative group">
                <a class="group-hover flex text-center items-center block border border-white rounded hover:border-gray-200 text-blue-500 group-hover:bg-gray-200 hover:bg-gray-200 py-2 px-4 md:text-black text-[#262D47]"
                    href="#">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/icons/nav/contenido.svg"
                        alt="Comunidad" width="30px" height="30px">
                    <span class="w-full text-left ml-2 font-bold md:font-normal">Contenido</span>
                    <div>
                        <span class="fas fa-chevron-down text-icon mr-1 fa-sm group-hover:hidden text-right"></span>
                        <span class="fas fa-chevron-up text-icon mr-1 fa-sm hidden group-hover:block text-right"></span>
                    </div>
                </a>
                <ul
                    class="top-13 w-full origin-top md:w-80 p-8 border-x-2 border-b-2 border-gray-300 md:mt-3 
                        serma-submenu md:absolute z-10 hidden bg-white group-hover:block rounded-b-md transition duration-300 delay-150 hover:delay-150">
                    <li>
                        <span class="fas fa-chevron-right text-[#585CE5] mr-1 fa-sm hidden md:inline-block"></span>
                        <a href="#" class="ml-5 md:ml-0">Artículos útiles</a>
                    </li>

                    <li class="pt-4">
                        <span class="fas fa-chevron-right text-[#585CE5] mr-1 fa-sm hidden md:inline-block"></span>
                        <a href="#" class="ml-5 md:ml-0">Cursos para padres</a>
                    </li>

                    <li class="pt-4">
                        <span class="fas fa-chevron-right text-[#585CE5] mr-1 fa-sm hidden md:inline-block"></span>
                        <a href="#" class="ml-5 md:ml-0">Notas verificadas</a>
                    </li>

                    <li class="pt-4">
                        <span class="fas fa-chevron-right text-[#585CE5] mr-1 fa-sm hidden md:inline-block"></span>
                        <a href="#" class="ml-5 md:ml-0">Reviews de productos</a>
                    </li>
                </ul>
            </li>
            <li class="flex-1 md:mr-2 py-2 group relative">
                <a class="group-hover flex text-center items-center block border border-white rounded hover:border-gray-200 text-blue-500 group-hover:bg-gray-200 hover:bg-gray-200 py-2 px-4 md:text-black text-[#262D47]"
                    href="#">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/icons/nav/servicios.svg"
                        alt="Comunidad" width="30px" height="30px">
                    <span class="w-full text-left ml-2 font-bold md:font-normal">Servicios</span>
                    <div>
                        <span class="fas fa-chevron-down text-icon mr-1 fa-sm group-hover:hidden text-right"></span>
                        <span class="fas fa-chevron-up text-icon mr-1 fa-sm hidden group-hover:block text-right"></span>
                    </div>
                </a>
                <ul
                    class="top-13 w-full origin-top md:w-80 p-8 border-x-2 border-b-2 border-gray-300 md:mt-3 
                        serma-submenu md:absolute z-10 hidden bg-white group-hover:block rounded-b-md transition duration-300 delay-150 hover:delay-150">
                    <li>
                        <span class="fas fa-chevron-right text-[#585CE5] mr-1 fa-sm hidden md:inline-block"></span>
                        <a href="#" class="ml-5 md:ml-0">Lactancia Materna</a>
                    </li>

                    <li class="pt-4">
                        <span class="fas fa-chevron-right text-[#585CE5] mr-1 fa-sm hidden md:inline-block"></span>
                        <a href="#" class="ml-5 md:ml-0">Psicología Prenatal</a>
                    </li>
                </ul>
            </li>
            <li class="flex-1 md:mr-2 py-2 group relative">
                <a class="group-hover flex text-center items-center block border border-white rounded hover:border-gray-200 text-blue-500 group-hover:bg-gray-200 hover:bg-gray-200 py-2 px-4 md:text-black text-[#262D47]"
                    href="#">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/icons/nav/herramientas.svg"
                        alt="Comunidad" width="30px" height="30px">
                    <span class="w-full text-left ml-2 font-bold md:font-normal">Herramientas</span>
                    <div>
                        <span class="fas fa-chevron-down text-icon mr-1 fa-sm group-hover:hidden text-right"></span>
                        <span class="fas fa-chevron-up text-icon mr-1 fa-sm hidden group-hover:block text-right"></span>
                    </div>
                </a>
                <ul
                    class="top-13 w-full origin-top md:w-80 p-8 border-x-2 border-b-2 border-gray-300 md:mt-3 
                        serma-submenu md:absolute z-10 hidden bg-white group-hover:block rounded-b-md transition duration-300 delay-150 hover:delay-150">
                    <li>
                        <span class="fas fa-chevron-right text-[#585CE5] mr-1 fa-sm hidden md:inline-block"></span>
                        <a href="#" class="ml-5 md:ml-0">Calculadora de ovación</a>
                    </li>

                    <li class="pt-4">
                        <span class="fas fa-chevron-right text-[#585CE5] mr-1 fa-sm hidden md:inline-block"></span>
                        <a href="#" class="ml-5 md:ml-0">Calculadora de parto</a>
                    </li>
                </ul>
            </li>
            <li class="flex-1 md:mr-2 py-2">
                <a class="flex text-center items-center block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4 md:text-black text-[#262D47]"
                    href="#">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/icons/nav/marketplace.svg"
                        alt="Comunidad" width="30px" height="30px">
                    <span class="ml-2 font-bold md:font-normal">Marketplace</span>
                </a>
            </li>
        </ul>
    </div>
</nav>