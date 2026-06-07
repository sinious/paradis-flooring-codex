/**
 * PFC Mobile Quick Actions Controller (Scroll Tracking Only)
 */
(function() {
    let scrollTimeout;

    window.addEventListener('scroll', () => {
        if (window.innerWidth >= 981) return;
        
        const actionDock = document.querySelector('.pfc-mobile-action-dock');
        if (!actionDock) return;

        if (!scrollTimeout) {
            window.requestAnimationFrame(() => {
                // Manage the Floating "Back to Top" Action Button visibility
                if (window.scrollY > 300) {
                    actionDock.classList.add('is-visible');
                } else {
                    actionDock.classList.remove('is-visible');
                }
                scrollTimeout = false;
            });
            scrollTimeout = true;
        }
    }, { passive: true });
})();