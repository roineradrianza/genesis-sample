<section class="container max-w-screen-md mx-auto bg-white rounded-lg serma-signin-container">
    <div class="mb-4 border-b border-gray-200">
        <ul class="flex -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            <li class="w-full flex justify-center border-r-2" role="presentation">
                <button
                    class="w-full py-4 px-4 font-bold text-lg text-center text-black outline-none focus:outline-none active"
                    id="login-tab" data-tabs-target="#login" type="button" role="tab" aria-controls="login"
                    aria-selected="true">Ingresa</button>
            </li>
            <li class="w-full flex justify-center" role="presentation">
                <button
                    class="w-full py-4 px-4 font-bold text-lg text-center text-black outline-none focus:outline-none"
                    id="register-tab" data-tabs-target="#register" type="button" role="tab" aria-controls="register"
                    aria-selected="false">Registrate</button>
            </li>
        </ul>
    </div>
    <div id="myTabContent">
        <div class="pu-4 px-4 md:px-0 rounded-lg" id="login" role="tabpanel" aria-labelledby="login-tab">
            <div class="container serma-login-container max-w-full mx-auto pb-10 bg-empty md:bg-cover">
                <div class="container max-w-md mx-auto">
                    <?= get_template_part( 'template-parts/signin/login' ); ?>
                </div>
            </div>

            <div class="container password-reset-container">
                <div class="font-medium border-t-2 py-3 border-gray-300 text-center">
                    <a href="#" class="text-black underline text-lg"
                        onclick="hide('.serma-signin-container'); show('.password-reset-form-container')">
                        ¿Has olvidado tu contraseña?
                    </a>
                </div>
            </div>
        </div>
        <div class="hidden pb-8 px-4 md:px-0 rounded-lg" id="register" role="tabpanel" aria-labelledby="register-tab">
            <div class="container max-w-full mx-auto">
                <?= get_template_part( 'template-parts/signin/register', null, SERMA_USER::countries() ); ?>
            </div>
        </div>
    </div>

</section>

<section class="container max-w-screen-md mx-auto bg-white rounded-lg password-reset-form-container hidden">
    <?= get_template_part( 'template-parts/signin/password-reset' ); ?>
</section>