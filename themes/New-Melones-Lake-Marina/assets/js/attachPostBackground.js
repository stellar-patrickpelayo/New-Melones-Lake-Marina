jQuery(document).ready(()=>{
    const postBackgroundSelector = '.post .header-background';
    const postThumbnailUrl = jQuery(postBackgroundSelector).data('url');
    
    if(postThumbnailUrl){
        const styleBackground = `linear-gradient(0deg,rgba(8,9,14,0.6) 0%,rgba(8,9,14,0.6) 100%), url("${postThumbnailUrl}")`;
        const keyBackground = 'background';

        const keyBackgroundSize = 'background-size';
        const styleBackgroundSize = 'cover';

        const keyBackgroundPosition = 'background-position';
        const styleBackgroundPosition = 'center center';

        jQuery(postBackgroundSelector).css(keyBackground,styleBackground);
        jQuery(postBackgroundSelector).css(keyBackgroundSize,styleBackgroundSize);
        jQuery(postBackgroundSelector).css(keyBackgroundPosition, styleBackgroundPosition);
        
    }
});