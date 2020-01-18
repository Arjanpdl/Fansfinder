const navSlide = () => {
    const mobile = document.querySelector('.mob-nav');
    const mobilenav = document.querySelector('.nav-menu');
    const mobilelinks = document.querySelectorAll('.nav-menu li')
    
    mobile.addEventListener('click', () => {
        //toggle nav
        mobilenav.classList.toggle('mob-nav-active');
        //animate links
        mobilelinks.forEach((link, index) => {
            if(link.style.animation) {
                link.style.animation = '';
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 12 + 0.3}s`;
            }
        });
        //mob-nav animation
        mobile.classList.toggle('toggle');

    });
    
    
}

navSlide();