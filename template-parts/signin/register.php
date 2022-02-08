<form id="serma_register_form" action="#">
    <div id="pre_register_form" class="pt-8 serma-register-container-1 bg-empty md:bg-cover">
        <div class="container max-w-md mx-auto">
            <h3 class="text-[30px] font-semibold text-[#262D47] text-center">Únete a la comunidad sermadre</h3>
            <p class="text-center text-16px my-4">
                Sermadre.com la comunidad más grande de maternidad y crianza online.
            </p>
            <input type="hidden" name="url_referrer" value="<?= get_permalink() ?>">
            <div>
                <label class="text-16px font-semibold">Fecha prevista para el parto</label>
                <div class="relative mt-2 mb-4">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input datepicker datepicker-format="dd/mm/yyyy" datepicker-language="es" type="text"
                        name="pregnant_date"
                        class="border border-gray-300 text-gray-900 rounded-lg text-lg focus:ring-purple-darken focus:border-purple-darken block w-full pl-10 p-2.5"
                        placeholder="DD/MM/YYYY">
                </div>
                <div class="flex items-start mb-4">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="pregnant_wish" aria-describedby="pregnant_wish" type="checkbox" name="pregnant_wish"
                                class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300">
                        </div>
                        <div class="ml-3">
                            <label for="remember" class="font-medium">¿Estás tratando de quedar
                                embarazada?</label>
                        </div>
                    </div>
                </div>
                <label class="text-16px font-semibold">Escribe tu email</label>
                <input type="email" name="email" id="register_email"
                    class="border border-gray-300 text-gray-900 rounded focus:ring-purple-darken focus:border-purple-darken block w-full p-3 mt-2"
                    placeholder="Email" required>
            </div>
            <div class="flex justify-center my-6">
                <button type="button"
                    class="text-white bg-green-lighten font-medium rounded px-10 py-3 text-center text-18px"
                    onclick="hide('#pre_register_form'); show('#register_form')">
                    ¡Únete ya!
                </button>
            </div>
            <p class="text-center text-icon text-12px">
                Al registrarte aceptas nuestros <a class="text-purple-darken" href="#">Términos y
                    condiciones</a>. Recibirás emails que te ofrecen cartas
                semanales, promociones y consejos sobre el desarrollo de tu bebé.
            </p>
        </div>
    </div>

    <div id="register_form" class="space-y-6 hidden serma-register-container-2 bg-empty md:bg-cover" action="#">
        <div class="container ml-6">
            <i class="fas fa-arrow-left fa-lg cursor-pointer"
                onclick="hide('#register_form'); show('#pre_register_form')">
            </i>
        </div>

        <div class="container max-w-md mx-auto">
            <h3 class="text-[30px] font-semibold text-[#262D47] text-center">¡Gracias por unirte a sermadre!</h3>
            <p class="text-center text-16px my-2">
                Nos alegra poder ayudarte en esta maravillosa aventura. Completa tu información para poder personalizar
                tu
                experiencia.
            </p>

            <div>
                <input type="text" name="first_name" id="first_name"
                    class="border border-gray-300 text-gray-900 rounded focus:ring-purple-darken focus:border-purple-darken block w-full p-3 mt-4"
                    placeholder="Primer nombre" required>
            </div>
            <div>
                <input type="text" name="username" id="username"
                    class="border border-gray-300 text-gray-900 rounded focus:ring-purple-darken focus:border-purple-darken block w-full p-3 mt-4"
                    placeholder="Alias" required>
            </div>
            <select id="countries" name="country"
                class="border border-gray-300 text-gray-900 rounded focus:ring-purple-darken focus:border-purple-darken block w-full p-3 mt-4">
                <option selected disabled>País de residencia</option>
                <?php foreach ($args as $ISO => $country) : ?>
                <option value="<?= $ISO?>"><?= $country ?></option>
                <?php endforeach ?>
            </select>

            <div>
                <input type="password" name="password" id="password"
                    class="border border-gray-300 text-gray-900 rounded focus:ring-purple-darken focus:border-purple-darken block w-full p-3 mt-4"
                    placeholder="Contraseña" required>
            </div>

            <div>
                <input type="password" name="confirm_password" id="confirm_password"
                    class="border border-gray-300 text-gray-900 rounded focus:ring-purple-darken focus:border-purple-darken block w-full p-3 mt-4"
                    placeholder="Confirmar contraseña" required>
            </div>
            <div id="alert-3" class="p-4 my-4 rounded-lg hidden" role="alert" serma-alert-container>
                <span class="fas fa-info-circle text-white"></span>
                <div class="ml-3 font-medium text-white" serma-alert-txt>
                </div>
            </div>
            <div class="flex justify-center mt-6">
                <button type="submit"
                    class="text-white bg-green-lighten font-medium rounded px-10 py-3 text-center text-18px"
                    serma-submit-btn>
                    Guardar y finalizar
                </button>
            </div>
        </div>
    </div>
</form>