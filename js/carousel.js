$('.owl-carousel').owlCarousel({
    loop: false,
    margin: 20,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayHoverPause: true,
    responsiveRefreshRate: 50,
    responsive: {
        0: {
            items: 1
        },
        576: {
            items: 2
        },
        768: {
            items: 3
        },
        992: {
            items: 4
        },
        1200: {
            items: 5
        }
    }
})