<form id="serma_login_form" class="space-y-6" action="" method="POST">
    <h3 class="text-4xl font-semibold text-[#262D47] text-center">¡Entra a sermadre!</h3>
    <p class="text-center text-lg">
        Ingresa tu dirección de correo electrónico para iniciar sesión en tu cuenta de sermadre
    </p>
    <div>
        <input type="email" name="email" id="email"
            class="border border-gray-300 text-gray-900 rounded focus:ring-purple-darken focus:border-purple-darken block w-full p-3"
            placeholder="Email" required>
    </div>
    <div>
        <input type="password" name="password" id="password" placeholder="Contraseña"
            class="border border-gray-300 text-gray-900 rounded focus:ring-purple-darken focus:border-purple-darken block w-full p-3"
            required>
    </div>
    <div class="flex items-start">
        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input id="remember" name="remember" aria-describedby="remember" type="checkbox"
                    class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300">
            </div>
            <div class="ml-3">
                <label for="remember" class="font-medium text-gray-900">Recordar contraseña</label>
            </div>
        </div>
    </div>
    <div id="alert-3" class="flex p-4 mb-4 rounded-lg hidden" role="alert" serma-alert-container>
        <span class="fas fa-info-circle text-white"></span>
        <div class="ml-3 font-medium text-white" serma-alert-txt>
        </div>
    </div>
    <div class="flex justify-center">
        <button type="submit" class="text-white bg-green-lighten font-medium rounded px-10 py-3 text-center text-xl"
            serma-submit-btn>
            ¡Acceder!
        </button>
    </div>
    
</form>