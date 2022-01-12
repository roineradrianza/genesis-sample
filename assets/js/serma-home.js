window.addEventListener('load', () => {

    let carousel = document.querySelector('.serma-carousel')
    let carousel_arrow_left = document.querySelector('.serma-carousel-arrow-left')
    let carousel_arrow_right = document.querySelector('.serma-carousel-arrow-right')

    carousel_arrow_left.addEventListener('click', () => {
        carousel.scrollLeft = carousel.scrollLeft - 250
    })

    carousel_arrow_right.addEventListener('click', () => {
        carousel.scrollLeft = carousel.scrollLeft + 250
    })

})