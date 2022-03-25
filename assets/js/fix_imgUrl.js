jQuery(document).ready(()=>{
    const origin = window.location.origin;
    const wordpressDir = '/wordpress2/';

    jQuery('.page img').each((index,el)=>{
        const src = jQuery(el).attr('src');
        jQuery(el).attr('src', origin + wordpressDir + src);
    });
});