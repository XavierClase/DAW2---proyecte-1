function ordenarProductes() {
    const orden = document.getElementById("ordreProductes").value;
    const urlParams = new URLSearchParams(window.location.search);
    
    urlParams.set('order', orden);

    window.location.search = urlParams.toString();
}