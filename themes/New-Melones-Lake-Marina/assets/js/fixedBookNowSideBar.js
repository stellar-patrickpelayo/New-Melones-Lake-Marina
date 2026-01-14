jQuery(document).ready(()=>{
    const bookNowSelector = '.booking-side-bar';
    const screenScrollBeginFixed = 240;
    const screenScrollEndFixed = 2740;
    
    function scrollHandler(e){
        const screenPosY = e.currentTarget.pageYOffset;

        if(screenPosY >= screenScrollBeginFixed && screenPosY <= screenScrollEndFixed){
            jQuery(bookNowSelector).addClass('scroll-fixed');
        } else {
            jQuery(bookNowSelector).removeClass('scroll-fixed');
        }
    }

    jQuery(window).scroll(scrollHandler);
});