// Mapeo de enlaces a sus respectivas secciones
const menuMapping = {
    'header-links-nav-menjar': document.querySelectorAll('.links-hover')[0],
    'header-links-nav-begudes': document.querySelectorAll('.links-hover')[1],
    'header-links-nav-postres': document.querySelectorAll('.links-hover')[2],
};

// Función para mostrar la sección correspondiente
function showMenu(section) {
    section.style.display = 'block';
}

// Función para ocultar la sección correspondiente
function hideMenu(section) {
    section.style.display = 'none';
}

// Iterar sobre cada par de enlace y sección
Object.keys(menuMapping).forEach(linkId => {
    const linkElement = document.getElementById(linkId);
    const sectionElement = menuMapping[linkId];

    // Mostrar la sección cuando el ratón está sobre el enlace o la sección
    linkElement.addEventListener('mouseenter', () => showMenu(sectionElement));
    sectionElement.addEventListener('mouseenter', () => showMenu(sectionElement));

    // Ocultar la sección cuando el ratón sale del enlace o la sección
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

