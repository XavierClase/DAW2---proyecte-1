const menuMapping = {
    'header-links-nav-menjar': document.querySelectorAll('.links-hover')[0],
    'header-links-nav-begudes': document.querySelectorAll('.links-hover')[1],
    'header-links-nav-postres': document.querySelectorAll('.links-hover')[2],
};

function showMenu(section) {
    section.style.display = 'block';
}

function hideMenu(section) {
    section.style.display = 'none';
}

Object.keys(menuMapping).forEach(linkId => {
    const linkElement = document.getElementById(linkId);
    const sectionElement = menuMapping[linkId];

    linkElement.addEventListener('mouseenter', () => showMenu(sectionElement));
    sectionElement.addEventListener('mouseenter', () => showMenu(sectionElement));

    linkElement.addEventListener('mouseleave', () => {
        setTimeout(() => {
            if (!sectionElement.matches(':hover') && !linkElement.matches(':hover')) {
                hideMenu(sectionElement);
            }
        }, 100);
    });

    sectionElement.addEventListener('mouseleave', () => {
        setTimeout(() => {
            if (!sectionElement.matches(':hover') && !linkElement.matches(':hover')) {
                hideMenu(sectionElement);
            }
        }, 100);
    });
});

document.addEventListener('DOMContentLoaded', () => {
    Object.values(menuMapping).forEach(section => hideMenu(section));
});


document.addEventListener('DOMContentLoaded', function() {
    const carroLink = document.querySelector('.header-carro-link');
    const carroHeader = document.querySelector('.carro-header');
    const tancaCarroButton = document.querySelector('.tanca-carro-header');

    
    carroLink.addEventListener('click', function(event) {
        event.preventDefault();
        carroHeader.classList.add('show'); 
    });


    tancaCarroButton.addEventListener('click', function() {
        carroHeader.classList.remove('show'); 
    });
});

