
jQuery(document).ready(
    ()=>{
        const hamburgerMenuSelector = '.hamburger-menu-wrapper';
        const mobileNavSelector = '.mobile-nav-bar';
        const liSelector = `${mobileNavSelector} li`;

        function toggleSlideOutNavMenu (){
            const navMenuSlideOutTransitionClass = 'nav-menu-transition';
            const disableOverflowY = 'disable-overflow-y';

            jQuery(mobileNavSelector).toggleClass(navMenuSlideOutTransitionClass);
            jQuery('html').toggleClass(disableOverflowY);
        }

        function toggleSlideDownMenu(e){
            const subMenuElem = jQuery(e.currentTarget).find('.sub-menu')[0];
            jQuery(subMenuElem).slideToggle({duration:150});
            
        }

        jQuery(hamburgerMenuSelector).click(toggleSlideOutNavMenu);
        jQuery(liSelector).click(toggleSlideDownMenu);
    }   
)