document.addEventListener("DOMContentLoaded", () => {
    function loadContent(section) {
        const content = document.getElementById('main-content');
        switch (section) {
            case 'comandas':
                content.innerHTML = `
                    <h1>Gestió de Comandas</h1>
                    <table id="comandas-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID Pedido</th>
                                <th>ID Usuari</th>
                                <th>Data i Hora</th>
                                <th>Estat</th>
                                <th>Mètode de Pagament</th>
                                <th>Total</th>
                                <th>Direcció</th>
                                <th>Nom Client</th>
                                <th>Telèfon</th>
                                <th>Correu</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                `;
                fetchComandasData();
                break;
            default:
                content.innerHTML = '<h1>Selecciona una opció del menú</h1>';
                break;
        }
    }

    function fetchComandasData() {
        fetch('?controller=adminAPI&action=getComandas')
    .then(response => {
        console.log('Respuesta del servidor:', response);
        if (!response.ok) {
            throw new Error('Error en la respuesta de la API: ' + response.statusText);
        }
        return response.text(); // Usamos text() para depurar si la respuesta no es JSON
    })
    .then(data => {

        console.log('Datos recibidos:', data);
        try {
            const comandas = JSON.parse(data);  // Intentamos parsear la respuesta a JSON
            populateComandasTable(comandas);
        } catch (error) {
            throw new Error('Error al parsear los datos JSON: ' + error.message);
        }
    })
    .catch(error => {
        console.error("Error al cargar comandas:", error);
        const content = document.getElementById('main-content');
        content.innerHTML = `<h1>Error al cargar las comandas</h1><p>${error.message}</p>`;
    });


    }

    function populateComandasTable(comandas) {
        const tableBody = document.querySelector('#comandas-table tbody');
        tableBody.innerHTML = ''; 

        if (comandas.length === 0) {
            const row = document.createElement('tr');
            row.innerHTML = `<td colspan="10" class="text-center">No hi ha comandas disponibles.</td>`;
            tableBody.appendChild(row);
        } else {
            comandas.forEach(comanda => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${comanda.ID_Pedido}</td>
                    <td>${comanda.ID_Usuari}</td>
                    <td>${comanda.Data_Hora}</td>
                    <td>${comanda.Estat}</td>
                    <td>${comanda.Metode_pagament}</td>
                    <td>${comanda.Total.toFixed(2)} €</td>
                    <td>${comanda.Direccio}</td>
                    <td>${comanda.Nom_client || 'N/A'}</td>
                    <td>${comanda.Telefon_client || 'N/A'}</td>
                    <td>${comanda.Correu_client || 'N/A'}</td>
                `;
                tableBody.appendChild(row);
            });
        }
    }

    window.loadContent = loadContent;
});
