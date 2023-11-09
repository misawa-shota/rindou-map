// swiper //////////////////////////////////////////////////////////////////////////////////////

import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

const swiper = new Swiper('.swiper', {
    loop: true,
    autoplay: {
        delay: 5000,
    },
    // pagination: {
    //     el: '.swiper-pagination',
    // },
    // navigation: {
    //     nextEl: '.swiper-button-next',
    //     prevEl: '.swiper-button-prev',
    // },
});

///////////////////////////////////////////////////////////////////////////////////////////////
