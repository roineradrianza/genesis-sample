window.addEventListener('load', () => {

    let menu_btn_toggle = document.querySelector('.serma-menu-toggle-btn')
    let menu_nav = document.querySelector('.serma-nav-menu')

    menu_btn_toggle.addEventListener('click', (e) => {
        let toggle_icon = document.querySelector('#serma_menu_toggle_icon')

        if(menu_btn_toggle.classList.contains('opened')) {
            menu_btn_toggle.classList.remove('opened')
            menu_nav.classList.add('hidden')
            toggle_icon.classList.remove('fa-times')
            toggle_icon.classList.add('fa-bars')
        } else {
            menu_btn_toggle.classList.add('opened')
            menu_nav.classList.remove('hidden')
            toggle_icon.classList.remove('fa-bars')
            toggle_icon.classList.add('fa-times')
        }
        
    })

})