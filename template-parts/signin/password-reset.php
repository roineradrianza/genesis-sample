<div class="container mx-auto pt-6 pb-10 px-4 md:px-0">
    <div class="container ml-6">
        <i class="fas fa-arrow-left fa-lg cursor-pointer"
            onclick="hide('.password-reset-form-container'); show('.serma-signin-container')">
        </i>
    </div>
    <div class="container max-w-md mx-auto">
        <?= get_template_part( 'template-parts/signin/password-reset/form' ); ?>
    </div>
</div>