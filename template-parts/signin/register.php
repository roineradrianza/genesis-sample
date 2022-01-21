<form class="space-y-6" action="#">
    <h3 class="text-4xl font-semibold text-[#262D47] text-center">Únete a la comunidad sermadre</h3>
    <p class="text-center text-xl">
        Sermadre.com la comunidad más grande de maternidad y crianza online.
    </p>
    <div>
        <label class="text-lg font-bold">Fecha prevista para el parto</label>
        <div class="relative mb-4">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input datepicker datepicker-format="dd/mm/yyyy" type="text"
                class="border border-gray-300 text-gray-900 rounded-lg text-lg focus:ring-purple-darken focus:border-purple-darken block w-full pl-10 p-2.5"
                placeholder="DD/MM/YYYY">
        </div>
        <div class="flex items-start mb-4">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="pregnant_wish" aria-describedby="pregnant_wish" type="checkbox"
                        class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300"
                        required>
                </div>
                <div class="ml-3">
                    <label for="remember" class="font-medium">¿Estás tratando de quedar
                        embarazada?</label>
                </div>
            </div>
        </div>
        <label class="text-lg font-bold">Escribe tu email</label>
        <input type="email" name="email" id="register_email"
            class="border border-gray-300 text-gray-900 rounded focus:ring-purple-darken focus:border-purple-darken block w-full p-3 mt-4"
            placeholder="Email" required>
    </div>
    <div class="flex justify-center">
        <button type="submit" class="text-white bg-green-lighten font-medium rounded px-10 py-3 text-center text-xl">
            ¡Únete ya!
        </button>
    </div>
    <p class="text-center text-icon text-base">
        Al registrarte aceptas nuestros <a class="text-purple-darken" href="#">Términos y
            condiciones</a>. Recibirás emails que te ofrecen cartas
        semanales, promociones y consejos sobre el desarrollo de tu bebé.
    </p>
</form>