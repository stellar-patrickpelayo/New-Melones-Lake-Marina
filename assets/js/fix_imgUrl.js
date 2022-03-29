jQuery(document).ready(()=>{
    const origin = window.location.origin;
    const wordpressDir = '/wordpress2/';
    const selector = '.page img';
    const prefix = 'wp-content/';
    const flagResult = jQuery(selector).hasClass('category-rental-image-card') || jQuery(selector).hasClass('gall-img-responsive');

    jQuery(selector).each((index,el)=>{
        if(!flagResult){
            const src = jQuery(el).attr('src');
            if(src.startsWith(prefix)){
                jQuery(el).attr('src', origin + wordpressDir + src);
            }
        }
    });
});