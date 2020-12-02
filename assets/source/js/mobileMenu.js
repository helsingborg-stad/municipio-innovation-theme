export default (() => {
    window.addEventListener('DOMContentLoaded', (event) => {
        const menuTrigger = document.querySelectorAll('.js-trigger-mobile-menu');
        const closeMenu = document.querySelectorAll('.js-close-mobile-menu');
        const menu = document.querySelector('.js-mobile-menu');

        if (!menu) {
            return;
        }

        if (menuTrigger && menuTrigger.length > 0) {
            menuTrigger.forEach(element => {
                function cb(e) {
                    if (!menu.classList.contains('is-open')) {
                        menu.classList.toggle('is-open');
                        document.body.classList.toggle('has-open-mobile-menu');
                        element.classList.toggle('is-active');

                        return;
                    }
                    
                    menu.classList.remove('is-open');
                    document.body.classList.toggle('has-open-mobile-menu');
                    element.classList.toggle('is-active');

                }
                element.addEventListener('click', cb);
            });
        }
    
        if (closeMenu && closeMenu.length > 0) {
            closeMenu.forEach(element => {
                function cb(e) {
                    menu.classList.remove('is-open');
                    enableBodyScroll(menu);
                }
                element.addEventListener('click', cb);
            });
        }
    });
})();