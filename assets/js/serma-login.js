window.addEventListener('load', () => {
    let serma_login_form = document.querySelector('#serma_login_form')
    let serma_reset_password_form = document.querySelector('#serma_reset_password_form')

    serma_login_form.addEventListener('submit', (e) => {
        e.preventDefault()
        serma_login('serma_login_form')
    })
    
    serma_reset_password_form.addEventListener('submit', (e) => {
        e.preventDefault()
        serma_reset_pass('serma_reset_password_form')
    })
})

function serma_login(form) {
    let url = wp_url + 'serma_login'
    let data = new FormData(document.getElementById(form))

    let submit_btn = document.querySelector(`#${form} [serma-submit-btn]`)
    let alert_container = document.querySelector(`#${form} [serma-alert-container]`)
    let alert_container_txt = document.querySelector(`#${form} [serma-alert-txt]`)

    alert_container.classList = ['flex p-4 mb-4 rounded-lg hidden']

    submit_btn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i>'

    Http.post(url, data).then(res => {
        submit_btn.innerHTML = 'Acceder'
        if (res.hasOwnProperty('message')) {

            alert_container_txt.innerHTML = res.message

            let status = 'error'

            if (res.status == 'success') {
                if (res.data.hasOwnProperty('errors')) {
                    status = 'error'
                    var errors = res.data.errors
                    if (errors.hasOwnProperty('incorrect_password')) {
                        alert_container_txt.innerHTML = errors.incorrect_password[0]
                    }
                    else if (errors.hasOwnProperty('invalid_email')) {
                        alert_container_txt.innerHTML = errors.invalid_email[0]
                    }
                }
                else {
                    status = 'success'
                    window.location = res.redirect_url
                }
            }
            alert_container.classList.add(`bg-${status}`)
            alert_container.classList.remove('hidden')
        }
        else {
            alert_container.classList.add(`bg-error`)
            alert_container.classList.remove('hidden')
            alert_container_txt.innerHTML = 'Ocurrió un error desconocido, intente de nuevo'
        }
    }, err => {
        submit_btn.innerHTML = 'Acceder'
        alert_container.classList.add(`bg-error`)
        alert_container.classList.remove('hidden')
        alert_container_txt.innerHTML = "No ha sido posible procesar la información enviada"
    })
}

function serma_reset_pass(form) {
    let url = wp_url + 'serma_reset_password'
    let data = new FormData(document.getElementById(form))

    let submit_btn = document.querySelector(`#${form} [serma-submit-btn]`)
    let alert_container = document.querySelector(`#${form} [serma-alert-container]`)
    let alert_container_txt = document.querySelector(`#${form} [serma-alert-txt]`)

    alert_container.classList = ['flex p-4 mb-4 rounded-lg hidden']

    submit_btn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i>'

    Http.post(url, data).then(res => {
        submit_btn.innerHTML = 'Recuperar contraseña'
        if (res.hasOwnProperty('message')) {
            alert_container_txt.innerHTML = res.message
            let status = res.status

            alert_container.classList.add(`bg-${status}`)
            alert_container.classList.remove('hidden')
        }
        else {
            alert_container.classList.add(`bg-error`)
            alert_container.classList.remove('hidden')
            alert_container_txt.innerHTML = 'Ocurrió un error desconocido, intente de nuevo'
        }
    }, err => {
        submit_btn.innerHTML = 'Acceder'
        alert_container.classList.add(`bg-error`)
        alert_container.classList.remove('hidden')
        alert_container_txt.innerHTML = "No ha sido posible procesar la información enviada"
    })
}

function hide(element) {
    document.querySelector(element).classList.add('hidden')
}

function show(element) {
    document.querySelector(element).classList.remove('hidden')
}