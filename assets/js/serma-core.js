window.addEventListener('load', () => {

    let menu_btn_toggle = document.querySelector('.serma-menu-toggle-btn')
    let menu_nav = document.querySelector('.serma-nav-menu')

    menu_btn_toggle.addEventListener('click', (e) => {
        let open_icon = document.querySelector('.open-icon')
        let close_icon = document.querySelector('.close-icon')

        if(menu_btn_toggle.classList.contains('opened')) {
            menu_btn_toggle.classList.remove('opened')
            menu_nav.classList.add('hidden')
            open_icon.classList.remove('hidden')
            close_icon.classList.add('hidden')
        } else {
            menu_btn_toggle.classList.add('opened')
            menu_nav.classList.remove('hidden')
            open_icon.classList.add('hidden')
            close_icon.classList.remove('hidden')
        }
        
    })

})