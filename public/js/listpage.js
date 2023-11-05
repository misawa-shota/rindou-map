// ページトップへ戻る機能 //////////////////////////////////////////////////////////

const pagetop_btn = document.querySelector('.to_pagetop_btn');

pagetop_btn.addEventListener('click', function(){
    window.scroll({
        top: 0,
        behavior: "smooth"
    });
});

window.addEventListener('scroll', function(){
    if(this.window.scrollY > 500) {
        pagetop_btn.style.opacity = "1";
    } else if(this.window.scrollY < 500) {
        pagetop_btn.style.opacity = "0";
    }
});
