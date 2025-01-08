document.getElementById('pay-online-button').addEventListener('click', function () {
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
        const modal = document.getElementById('payment-modal');
        modal.classList.add('show');
        modal.setAttribute('aria-hidden', 'false');
        modal.querySelector('#card-number').focus(); 
    } else {
        alert('Si us plau, omple tots els camps obligatoris abans de pagar.');
    }
});

document.getElementById('cancel-payment').addEventListener('click', function (event) {
    event.stopPropagation();
    const modal = document.getElementById('payment-modal');
    modal.classList.remove('show');
    modal.setAttribute('aria-hidden', 'true');
    document.getElementById('pay-online-button').focus(); 
});

document.getElementById('confirm-payment').addEventListener('click', function () {
    const cardNumber = document.getElementById('card-number').value;
    const expiryDate = document.getElementById('expiry-date').value;
    const cvv = document.getElementById('cvv').value;

    if (cardNumber && expiryDate && cvv) {
        const checkoutForm = document.getElementById('checkout-form');
        
        const paymentInput = document.createElement('input');
        paymentInput.type = 'hidden';
        paymentInput.name = 'pagament'; 
        paymentInput.value = 'online';  
        
        
        checkoutForm.appendChild(paymentInput);

        
        checkoutForm.submit();
    } else {
        alert('Si us plau, omple tots els camps de la targeta.');
    }
});




document.getElementById('payment-modal').addEventListener('click', function (event) {
    if (event.target === this) {
        this.classList.remove('show');
        this.setAttribute('aria-hidden', 'true');
    }
});