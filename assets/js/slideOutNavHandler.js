console.log('works');

jQuery(document).ready(
    ()=>{
        const navMenuSlideOutTransitionClass = 'nav-menu-transition';
        function toggleSlideOutNavMenu (){
            jQuery('.mobile-nav-bar').toggleClass(navMenuSlideOutTransitionClass);
        }

        jQuery('.hamburger-menu-wrapper').click(toggleSlideOutNavMenu);
    }
)