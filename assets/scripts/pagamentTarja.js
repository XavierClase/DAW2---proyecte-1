document.getElementById('pay-online-button').addEventListener('click', function () {
    // Validació dels camps previs
    const form = document.getElementById('checkout-form');
    const requiredFields = form.querySelectorAll('input[required], select[required]');
    let allValid = true;

    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            allValid = false;
            field.classList.add('is-invalid');
        } else {
            field.classList.remove('is-invalid');
        }
    });

    if (allValid) {
        // Mostrar el modal amb l'animació
        const modal = document.getElementById('payment-modal');
        modal.classList.add('show');
        modal.setAttribute('aria-hidden', 'false');
        modal.querySelector('#card-number').focus(); // Posar el focus al primer camp
    } else {
        alert('Si us plau, omple tots els camps obligatoris abans de pagar.');
    }
});

// Amagar el modal en fer clic a Cancel·lar
document.getElementById('cancel-payment').addEventListener('click', function (event) {
    event.stopPropagation(); // Evita propagació d'esdeveniments
    const modal = document.getElementById('payment-modal');
    modal.classList.remove('show');
    modal.setAttribute('aria-hidden', 'true');
    document.getElementById('pay-online-button').focus(); // Tornar el focus al botó inicial
});

// Confirmar pagament (per exemple: enviar dades)
document.getElementById('confirm-payment').addEventListener('click', function () {
    // Validar el formulari de pagament del modal
    const cardNumber = document.getElementById('card-number').value;
    const expiryDate = document.getElementById('expiry-date').value;
    const cvv = document.getElementById('cvv').value;

    if (cardNumber && expiryDate && cvv) {
        // Afegir un input ocult per al valor "online" al formulari de checkout
        const checkoutForm = document.getElementById('checkout-form');
        
        // Crear un input ocult per al camp "pagament"
        const paymentInput = document.createElement('input');
        paymentInput.type = 'hidden';
        paymentInput.name = 'pagament'; // El nom ha de coincidir amb el camp al formulari
        paymentInput.value = 'online';  // Afegir el valor "online"
        
        // Afegir el camp ocult al formulari
        checkoutForm.appendChild(paymentInput);

        // Enviar el formulari al mateix controlador i acció
        checkoutForm.submit();
    } else {
        alert('Si us plau, omple tots els camps de la targeta.');
    }
});



// Assegura't que el clic fora del modal no impedeixi la interacció amb els inputs
document.getElementById('payment-modal').addEventListener('click', function (event) {
    if (event.target === this) {
        // Amaga el modal si el clic és fora del contingut
        this.classList.remove('show');
        this.setAttribute('aria-hidden', 'true');
    }
});