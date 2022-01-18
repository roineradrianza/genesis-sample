
const Http = {
    async get(url) {
        let response = await fetch(url)
        return response.json()
    },

    post(url, data) {
        let response = fetch(url,
            {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/json'
                },
                referrerPolicy: 'no-referrer',
                body: JSON.stringify(data)
            }
        ).then(response => {
            return response.json()
        })
        return response
    },

}

class blogPosts {
    constructor(
            {
                id = '', 
                container = "#serma_blog_posts_container", 
                container_sm = "#serma_blog_post_container_sm", 
                loader_container = "#serma_blog_posts_loader"
            }
        ) 
        {
        this.id = id,
        this.container_sm_alias = container_sm
        this.container = document.querySelector(container)
        this.container_sm = document.querySelector(container_sm)
        this.loader_container = document.querySelector(loader_container)
        this.items = []
        this.load()
    }

    load() {
        var app = this
        let serma_post_category = document.querySelectorAll(`[serma-post-category]`)

        serma_post_category.forEach(element => {
            element.classList.remove('border-purple-darken')
        });

        let serma_post_label = document.querySelectorAll(`[serma-post-category-label]`)
        serma_post_label.forEach(element => {
            element.classList.remove('text-purple-darken')
        });

        if (app.id != null && app.id != 0) {
            document.querySelector(`[serma-post-category = '${app.id}']`).classList.add('border-purple-darken')
            document.querySelector(`[serma-post-category-label = '${app.id}']`).classList.add('text-purple-darken')
        } else {
            document.querySelector(`[serma-post-category = '0']`).classList.add('border-purple-darken')
            document.querySelector(`[serma-post-category-label = '0']`).classList.add('text-purple-darken')
        }
        let category_param = this.id == null || this.id == 0 ? '' : `&categories=${this.id}`
        var url = serma_ajax_url + 'serma_get_blog_posts' + category_param
        app.container.classList.add('hidden')
        app.loader_container.classList.remove('hidden')
        let container_lg_content = ''
        let container_sm_content = ''

        Http.get(url).then(res => {
            if (res.length > 0) {
                let articles = res.slice(0, 2)
                articles.forEach( (article, i) => {
                    container_lg_content += app.getPostCardLg(article, i)
                });
            }
            if(res.length > 2) {
                let articles = res.slice(2, 4)
                articles.forEach( (article, i) => {
                    container_sm_content += app.getPostCardSm(article, i)
                });
            }

            app.container.innerHTML = container_lg_content + '<div id="serma_blog_post_container_sm"></div>'
            app.container_sm_content = document.querySelector(app.container_sm_alias)

            app.container_sm_content.innerHTML = container_sm_content

            app.container.classList.remove('hidden')
            app.loader_container.classList.add('hidden')
        }, err => {
            app.response({type: 'error'})
        })
    }

    getPostCardLg (element, index) {
        let classes = index == 1 ? 'mr-n1 hidden md:inline' : 'ml-n1'
        return `
            <div class="${classes} rounded-lg border-2 border-t-0 border-gray-300" post-${index}>
                <div>
                    <div>
                        <div class="relative ml-n1">
                            <a href="${element.link}" target="_blank">
                                <img class="rounded-lg h-48 w-full object-cover" src="${element.featured_image}">
                            </a>
                            <span
                                class="bg-gradient-to-b from-transparent to-neutral-800 h-10 w-full absolute bottom-0 px-8 text-white font-normal text-md capitalize ">
                                ${element.published_at_formatted}
                            </span>
                        </div>
                    </div>

                    <div class="px-4 md:px-8 pt-4 pb-8">
                        <p class="text-primary mb-2 font-medium">
                            ${element.category.name}
                        </p>
                        <h4 class="text-black text-xl md:text-xl font-semibold">
                            <a href="${element.link}" target="_blank">
                                ${element.title}
                            </a>
                        </h4>
                        <p class="mt-4">${element.excerpt}</p>
                    </div>
                </div>
            </div>
        `
    }

    getPostCardSm (element, index) {
        return `
        <div class="grid grid-cols-3 gap-2 py-4 md:py-6 border-2 border-gray-300 rounded-lg mb-4">
            <div class="pl-4 md:pl-6 col-span-2">
                <p class="serma-category text-tiny md:text-base text-primary md:mb-2 font-medium">
                    ${element.category.name}
                </p>
                <h4 class="text-black text-lg md:text-xl font-semibold mb-4">
                    <a href="${element.link}" target="_blank">
                    ${element.title}
                    </a>
                </h4>
                <p class="text-secondary text-tiny md:text-base font-normal capitalize">
                    ${element.published_at_formatted}
                </p>
            </div>
            <div class="md:pr-6">
                <a href="${element.link}" target="_blank">
                    <img class="rounded-lg w-20 md:w-24 h-20 object-cover" src="${element.featured_image}">
                </a>
            </div>
        </div>
        `
    }

}

window.addEventListener('DOMContentLoaded', () => {
    new blogPosts({id: ''})
})

window.addEventListener('load', () => {

    let carousel = document.querySelector('.serma-carousel')
    let carousel_arrow_left = document.querySelectorAll('.serma-carousel-arrow-left')
    let carousel_arrow_right = document.querySelectorAll('.serma-carousel-arrow-right')

    carousel_arrow_left.forEach(item => {
        item.addEventListener('click', () => {
            let carousel_id = item.getAttribute('serma-carousel-target')
            let carousel = document.querySelector(`[serma-carousel-id=${carousel_id}]`)
            carousel.scrollLeft = carousel.scrollLeft - 250
        })
    })

    carousel_arrow_right.forEach(item => {
        let carousel_id = item.getAttribute('serma-carousel-target')
        let carousel = document.querySelector(`[serma-carousel-id=${carousel_id}]`)
        item.addEventListener('click', () => {
            carousel.scrollLeft = carousel.scrollLeft + 250
        })
    })

})
