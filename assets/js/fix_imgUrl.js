jQuery(document).ready(()=>{
    const origin = window.location.origin;
    const wordpressDir = '/wordpress2/';
    const selector = '.page img';

    jQuery('.page img').each((index,el)=>{
        if(!jQuery(selector).hasClass('category-rental-image-card')){
            const src = jQuery(el).attr('src');
            jQuery(el).attr('src', origin + wordpressDir + src);
        }
    });
});