<form id="serma_reset_password_form" class="space-y-6" method="POST">
    <h3 class="text-4xl font-semibold text-[#262D47] text-center">¿Olvidaste tu contraseña?</h3>
    <p class="text-center text-lg">
		Ingresa tu dirección de correo electrónico y recibirás las instrucciones para recuperar tu contraseña.
    </p>
    <div>
        <input type="email" name="email" id="serma_reset_password_email"
            class="border border-gray-300 text-gray-900 rounded focus:ring-purple-darken focus:border-purple-darken block w-full p-3"
            placeholder="Email" required>
    </div>
    <div id="alert-3" class="flex p-4 mb-4 rounded-lg hidden" role="alert" serma-alert-container>
        <span class="fas fa-info-circle text-white"></span>
        <div class="ml-3 font-medium text-white" serma-alert-txt>
        </div>
    </div>
    <div class="flex justify-center">
        <button type="submit" class="text-white bg-green-lighten font-medium rounded px-10 py-3 text-center text-xl"
            serma-submit-btn>
            Recuperar contraseña
        </button>
    </div>
</form>