document.addEventListener("DOMContentLoaded", () => {
    let comandasData = [];
    let usuarisData = [];
    let currentSort = { field: null, direction: null };

    function loadContent(section) {
        const content = document.getElementById('main-content');
        switch (section) {
            case 'comandas':
                content.innerHTML = `
                    <h1>Gestió de Comandas</h1>
                    <table id="comandas-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th data-sort="ID_Pedido">ID Pedido</th>
                                <th data-sort="ID_Usuari">ID Usuari</th>
                                <th data-sort="Data_Hora">Data i Hora</th>
                                <th>Estat</th>
                                <th>Mètode de Pagament</th>
                                <th data-sort="Total">Total</th>
                                <th>Direcció</th>
                                <th>Nom Client</th>
                                <th>Telèfon</th>
                                <th>Correu</th>
                                <th>Accions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                `;
                fetchComandasData();
                break;

            case 'usuaris':
                content.innerHTML = `
                    <h1>Gestió D'Usuaris</h1>
                    <table id="usuaris-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID Usuari</th>
                                <th>Nom</th>
                                <th>Correu</th>
                                <th>Telèfon</th>
                                <th>Data Naixement</th>
                                <th>Tipus Usuari</th>
                                <th>Accions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                    <div class="modal" id="modificarUsuariModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modificar Usuari</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="modificarUsuariForm">
                                        <input type="hidden" id="usuariId">
                                        <div class="mb-3">
                                            <label for="nom" class="form-label">Nom</label>
                                            <input type="text" class="form-control" id="nom" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cognoms" class="form-label">Cognoms</label>
                                            <input type="text" class="form-control" id="cognoms" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="correu" class="form-label">Correu electrònic</label>
                                            <input type="email" class="form-control" id="correu" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="telefon" class="form-label">Telèfon</label>
                                            <input type="tel" class="form-control" id="telefon" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dataNaixement" class="form-label">Data naixement</label>
                                            <input type="date" class="form-control" id="dataNaixement" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tipusUsuari" class="form-label">Tipus usuari</label>
                                            <select class="form-select" id="tipusUsuari" required>
                                                <option value="client">Client</option>
                                                <option value="administrador">Administrador</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" id="tancaModal">Tancar</button>
                                    <button type="button" class="btn btn-primary" id="guardarCanvisUsuari">Guardar canvis</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                fetchUsuarisData();
                break;
            case 'productes':
                content.innerHTML = `
                    <h1>Gestió de Productes</h1>
                    <table id="productes-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID Producte</th>
                                <th>Nom</th>
                                <th>Descripció</th>
                                <th>Preu</th>
                                <th>Categoria</th>
                                <th>disponibilitat</th>
                                <th>Imatge</th>
                                <th>Accions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                    <div class="modal" id="modificarProducteModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modificar Producte</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="modificarProducteForm">
                                        <input type="hidden" id="producteId">
                                        <div class="mb-3">
                                            <label for="nomProducte" class="form-label">Nom</label>
                                            <input type="text" class="form-control" id="nomProducte" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="descripcioProducte" class="form-label">Descripció</label>
                                            <textarea class="form-control" id="descripcioProducte" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="preuProducte" class="form-label">Preu</label>
                                            <input type="number" step="0.01" class="form-control" id="preuProducte" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="categoriaProducte" class="form-label">Categoria</label>
                                            <select class="form-select" id="categoriaProducte" required>
                                                <option value="MENJARS PREPARATS">Menjars Preparats</option>
                                                <option value="MENJARS DESHIDRATATS">Menjars Deshidratats</option>
                                                <option value="APERITIUS DE MUNTANYA">Aperitius de Muntanya</option>
                                                <option value="CERVESES">Cerveses</option>
                                                <option value="VINS">Vins</option>
                                                <option value="REFRESCOS">Refrescos</option>
                                                <option value="POSTRES CLASICS">Postres Clasics</option>
                                                <option value="POSTRES RURALS">Postres Rurals</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="disponibilitatProducte" class="form-label">Disponibilitat</label>
                                            <select class="form-select" id="disponibilitatProducte" required>
                                                <option value="1">Disponible</option>
                                                <option value="0">No disponible</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="imatgeProducte" class="form-label">URL Imatge</label>
                                            <input type="text" class="form-control" id="imatgeProducte" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" id="tancaModalProducte">Tancar</button>
                                    <button type="button" class="btn btn-primary" id="guardarCanvisProducte">Guardar canvis</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                fetchProductesData();
                break;
            case 'logs':
                content.innerHTML = `
                    <h1>Logs</h1>
                    <table id="productes-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID Admin</th>
                                <th>Accio</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                `;
                fetchLogsData();
                break;
                

            default:
                content.innerHTML = '<h1>Selecciona una opció del menú</h1>';
                break;
        }
    }

    function fetchComandasData() {
        fetch('?controller=adminAPI&action=getComandas')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la resposta de l\'API: ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                comandasData = data;
                populateComandasTable(comandasData);
            })
            .catch(error => {
                console.error("Error al carregar comandas:", error);
                const content = document.getElementById('main-content');
                content.innerHTML = `<h1>Error al carregar les comandas</h1><p>${error.message}</p>`;
            });
    }

    function populateComandasTable(comandas) {
        const tableBody = document.querySelector('#comandas-table tbody');
        tableBody.innerHTML = '';

        if (comandas.length === 0) {
            const row = document.createElement('tr');
            row.innerHTML = `<td colspan="11" class="text-center">No hi ha comandas disponibles.</td>`;
            tableBody.appendChild(row);
        } else {
            comandas.forEach(comanda => {
                const row = document.createElement('tr');

                const selectEstado = `
                    <select class="estado-select" data-id="${comanda.ID_Pedido}">
                        <option value="pendent" ${comanda.Estat === 'pendent' ? 'selected' : ''}>Pendent</option>
                        <option value="preparant" ${comanda.Estat === 'preparant' ? 'selected' : ''}>Preparant</option>
                        <option value="entregant" ${comanda.Estat === 'entregant' ? 'selected' : ''}>Entregant</option>
                        <option value="completat" ${comanda.Estat === 'completat' ? 'selected' : ''}>Completat</option>
                        <option value="cancel·lat" ${comanda.Estat === 'cancel·lat' ? 'selected' : ''}>Cancel·lat</option>
                    </select>
                    <button class="modificar-estat-btn btn btn-primary">Modificar</button>
                `;

                row.innerHTML = `
                    <td>${comanda.ID_Pedido}</td>
                    <td>${comanda.ID_Usuari}</td>
                    <td>${comanda.Data_Hora}</td>
                    <td>${selectEstado}</td>
                    <td>${comanda.Metode_pagament}</td>
                    <td>${comanda.Total.toFixed(2)} €</td>
                    <td>${comanda.Direccio}</td>
                    <td>${comanda.Nom_client || 'N/A'}</td>
                    <td>${comanda.Telefon_client || 'N/A'}</td>
                    <td>${comanda.Correu_client || 'N/A'}</td>
                    <td>
                        <button class="eliminar-comanda-btn btn btn-danger" data-id="${comanda.ID_Pedido}">Eliminar</button>
                    </td>
                `;

                row.querySelector('.modificar-estat-btn').addEventListener('click', function () {
                    const estado = row.querySelector('.estado-select').value;
                    modificarEstat(comanda.ID_Pedido, estado);
                });

                row.querySelector('.eliminar-comanda-btn').addEventListener('click', function () {
                    eliminarComanda(comanda.ID_Pedido);
                });

                tableBody.appendChild(row);
            });
        }
    }

    function fetchUsuarisData() {
        fetch('?controller=adminAPI&action=getUsuaris')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la resposta de l\'API: ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                usuarisData = data;
                populateUsuarisTable(usuarisData);
            })
            .catch(error => {
                console.error("Error al carregar usuaris:", error);
                const content = document.getElementById('main-content');
                content.innerHTML = `<h1>Error al carregar els usuaris</h1><p>${error.message}</p>`;
            });
    }

    function populateUsuarisTable(usuaris) {
        const tableBody = document.querySelector('#usuaris-table tbody');
        tableBody.innerHTML = '';

        if (usuaris.length === 0) {
            const row = document.createElement('tr');
            row.innerHTML = `<td colspan="7" class="text-center">No hi ha usuaris disponibles.</td>`;
            tableBody.appendChild(row);
        } else {
            usuaris.forEach(usuari => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${usuari.ID_Usuari}</td>
                    <td>${usuari.Nom} ${usuari.Cognoms}</td>
                    <td>${usuari.Correu_electronic}</td>
                    <td>${usuari.Telefon}</td>
                    <td>${usuari.Data_naixement}</td>
                    <td>${usuari.Tipus_usuari}</td>
                    <td>
                        <button class="modificar-usuari-btn btn btn-primary me-2" data-id="${usuari.ID_Usuari}">Modificar</button>
                        <button class="eliminar-usuari-btn btn btn-danger" data-id="${usuari.ID_Usuari}">Eliminar</button>
                    </td>
                `;

                row.querySelector('.modificar-usuari-btn').addEventListener('click', function() {
                    obrirModalModificarUsuari(usuari);
                });

                row.querySelector('.eliminar-usuari-btn').addEventListener('click', function() {
                    eliminarUsuari(usuari.ID_Usuari);
                });

                tableBody.appendChild(row);
            });
        }
    }

    function obrirModalModificarUsuari(usuari) {
        const existingBackdrop = document.querySelector('.modal-backdrop');
        if (existingBackdrop) {
            existingBackdrop.remove();
        }
        document.body.classList.remove('modal-open');
        
        const modalElement = document.getElementById('modificarUsuariModal');
        
        modalElement.style.zIndex = '1050';
        
        document.getElementById('usuariId').value = usuari.ID_Usuari;
        document.getElementById('nom').value = usuari.Nom;
        document.getElementById('cognoms').value = usuari.Cognoms;
        document.getElementById('correu').value = usuari.Correu_electronic;
        document.getElementById('telefon').value = usuari.Telefon;
        document.getElementById('dataNaixement').value = usuari.Data_naixement;
        document.getElementById('tipusUsuari').value = usuari.Tipus_usuari;
    
        let existingModal = bootstrap.Modal.getInstance(modalElement);
        if (existingModal) {
            existingModal.dispose();
        }
    
        const modal = new bootstrap.Modal(modalElement, {
            backdrop: 'static',
            keyboard: false
        });
    
        const cleanupModal = () => {
            const backdrop = document.querySelector('.modal-backdrop');
            if (backdrop) {
                backdrop.remove();
            }
            document.body.classList.remove('modal-open');
            document.body.style.removeProperty('overflow');
            document.body.style.removeProperty('padding-right');
        };
    
        const handleClose = () => {
            modal.hide();
            cleanupModal();
        };
    
        const handleSave = () => {
            guardarCanvisUsuari();
            cleanupModal();
        };
    
        const tancaBtn = document.getElementById('tancaModal');
        const guardarBtn = document.getElementById('guardarCanvisUsuari');
        
        tancaBtn.replaceWith(tancaBtn.cloneNode(true));
        guardarBtn.replaceWith(guardarBtn.cloneNode(true));
        
        document.getElementById('tancaModal').addEventListener('click', handleClose);
        document.getElementById('guardarCanvisUsuari').addEventListener('click', handleSave);
        
        modalElement.addEventListener('hidden.bs.modal', cleanupModal, { once: true });
    
        const style = document.createElement('style');
        style.textContent = `
            .modal { 
                z-index: 1050 !important; 
            }
            .modal-backdrop { 
                z-index: 1040 !important; 
            }
            .modal-dialog {
                z-index: 1050 !important;
            }
        `;
        document.head.appendChild(style);
    
        modal.show();
    }

    function guardarCanvisUsuari() {
        const guardarBtn = document.getElementById('guardarCanvisUsuari');
        const tancarBtn = document.getElementById('tancaModal');
        guardarBtn.disabled = true;
        tancarBtn.disabled = true;
    
        const userData = {
            ID_Usuari: document.getElementById('usuariId').value,
            Nom: document.getElementById('nom').value,
            Cognoms: document.getElementById('cognoms').value,
            Correu_electronic: document.getElementById('correu').value,
            Telefon: document.getElementById('telefon').value,
            Data_naixement: document.getElementById('dataNaixement').value,
            Tipus_usuari: document.getElementById('tipusUsuari').value
        };
    
        fetch('?controller=adminAPI&action=modificarUsuari', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(userData)
        })
        .then(response => {
            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                return response.json().then(data => {
                    if (!response.ok) {
                        throw new Error(data.message || 'Error del servidor');
                    }
                    return data;
                });
            } else {
                return response.text().then(text => {
                    throw new Error('Resposta no vàlida del servidor');
                });
            }
        })
        .then(data => {
            if (data.status === 'success') {
                alert('Usuari modificat correctament!');
                const modal = bootstrap.Modal.getInstance(document.getElementById('modificarUsuariModal'));
                if (modal) {
                    modal.hide();
                }
                fetchUsuarisData(); 
            } else {
                throw new Error(data.message || 'Error desconegut');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al modificar l\'usuari: ' + error.message);
        })
        .finally(() => {
            guardarBtn.disabled = false;
            tancarBtn.disabled = false;
        });
    }

    function eliminarComanda(idPedido) {
        fetch(`?controller=adminAPI&action=borrarComanda`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ idPedido })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la resposta de l\'API: ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            alert(`Comanda ${idPedido} eliminada correctament!`);
            fetchComandasData();
        })
        .catch(error => {
            console.error("Error al eliminar comanda:", error);
        });
    }

    function eliminarUsuari(idUsuari) {
        fetch('?controller=adminAPI&action=borrarUsuari', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ idUsuari })
        })
        .then(response => {
            if (response.headers.get('content-type')?.includes('text/html')) {
                console.error('Error en la respuesta del servidor: respuesta HTML inesperada');
                return response.text(); 
            }
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                alert(`Usuari ${idUsuari} eliminat correctament!`);
                fetchUsuarisData();
            } else {
                alert(`Error: ${data.message}`);
            }
        })
        .catch(error => {
            console.error("Error al eliminar usuari:", error);
            alert('Error al eliminar l\'usuari');
        });
    }

    function eliminarProducte(idProducte) {
        fetch(`?controller=adminAPI&action=borrarProducte`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ idProducte })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la resposta de l\'API: ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            alert(`Producte ${idProducte} eliminat correctament!`);
            fetchProductesData();
        })
        .catch(error => {
            console.error("Error al eliminar producte:", error);
        });
    }
    
    

    const menuLinks = document.querySelectorAll('.sidebar .nav-link');
    menuLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const section = link.getAttribute('data-section');
            loadContent(section);
        });
    });

    document.body.addEventListener('click', function(e) {
        if (e.target && e.target.id === 'guardarCanvisUsuari') {
            guardarCanvisUsuari();
        }
    });


    function fetchProductesData() {
        fetch('?controller=adminAPI&action=getProductes')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la resposta de l\'API: ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                populateProductesTable(data);
            })
            .catch(error => {
                console.error("Error al carregar productes:", error);
                const content = document.getElementById('main-content');
                content.innerHTML = `<h1>Error al carregar els productes</h1><p>${error.message}</p>`;
            });
    }

    function populateProductesTable(productes) {
        const tableBody = document.querySelector('#productes-table tbody');
        tableBody.innerHTML = '';
    
        if (productes.length === 0) {
            const row = document.createElement('tr');
            row.innerHTML = `<td colspan="6" class="text-center">No hi ha productes disponibles.</td>`;
            tableBody.appendChild(row);
        } else {
            productes.forEach(producte => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${producte.ID_Producte}</td>
                    <td>${producte.Nom}</td>
                    <td>${producte.Descripcio}</td>
                    <td>${producte.Preu} €</td>
                    <td>${producte.Categoria}</td>
                    <td>${producte.Disponibilitat ? 'Disponible' : 'No disponible'}</td>
                    <td><img src="${producte.Imatge}" alt="${producte.Nom}" width="50" height="50"></td>
                    <td>
                        <button class="modificar-producte-btn btn btn-primary me-2" data-id="${producte.ID_Producte}">Modificar</button>
                        <button class="eliminar-producte-btn btn btn-danger" data-id="${producte.ID_Producte}">Eliminar</button>
                    </td>
                `;
    
                row.querySelector('.modificar-producte-btn').addEventListener('click', function() {
                    obrirModalModificarProducte(producte);
                });
    
                row.querySelector('.eliminar-producte-btn').addEventListener('click', function() {
                    eliminarProducte(producte.ID_Producte);
                });
    
                tableBody.appendChild(row);
            });
        }
    }

    function obrirModalModificarProducte(producte) {
        const modalElement = document.getElementById('modificarProducteModal');
        
        const existingBackdrop = document.querySelector('.modal-backdrop');
        if (existingBackdrop) {
            existingBackdrop.remove();
        }
        
        document.getElementById('producteId').value = producte.ID_Producte;
        document.getElementById('nomProducte').value = producte.Nom;
        document.getElementById('descripcioProducte').value = producte.Descripcio;
        document.getElementById('preuProducte').value = producte.Preu;
        document.getElementById('categoriaProducte').value = producte.Categoria;
        document.getElementById('disponibilitatProducte').value = producte.Disponibilitat ? "1" : "0";
        document.getElementById('imatgeProducte').value = producte.Imatge;
    
        const modal = new bootstrap.Modal(modalElement, {
            backdrop: 'static',
            keyboard: false
        });
    
        const cleanupModal = () => {
            const backdrop = document.querySelector('.modal-backdrop');
            if (backdrop) {
                backdrop.remove();
            }
            document.body.classList.remove('modal-open');
            document.body.style.removeProperty('overflow');
            document.body.style.removeProperty('padding-right');
        };
    
        const tancaBtn = document.getElementById('tancaModalProducte');
        const guardarBtn = document.getElementById('guardarCanvisProducte');
        
        tancaBtn.onclick = () => {
            modal.hide();
            cleanupModal();
        };
        
        guardarBtn.onclick = guardarCanvisProducte;
    
        modalElement.addEventListener('hidden.bs.modal', cleanupModal, { once: true });
    
        modal.show();
    }
    
    function guardarCanvisProducte() {
        const guardarBtn = document.getElementById('guardarCanvisProducte');
        const tancarBtn = document.getElementById('tancaModalProducte');
        guardarBtn.disabled = true;
        tancarBtn.disabled = true;
    
        const producteData = {
            ID_Producte: document.getElementById('producteId').value,
            Nom: document.getElementById('nomProducte').value,
            Descripcio: document.getElementById('descripcioProducte').value,
            Preu: parseFloat(document.getElementById('preuProducte').value),
            Categoria: document.getElementById('categoriaProducte').value,
            Disponibilitat: document.getElementById('disponibilitatProducte').value === "1",
            Imatge: document.getElementById('imatgeProducte').value
        };
    
        fetch('?controller=adminAPI&action=modificarProducte', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(producteData)
        })
        .then(response => {
            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                return response.json().then(data => {
                    if (!response.ok) {
                        throw new Error(data.message || 'Error del servidor');
                    }
                    return data;
                });
            } else {
                return response.text().then(text => {
                    throw new Error('Resposta no vàlida del servidor');
                });
            }
        })
        .then(data => {
            if (data.status === 'success') {
                alert('Producte modificat correctament!');
                const modal = bootstrap.Modal.getInstance(document.getElementById('modificarProducteModal'));
                if (modal) {
                    modal.hide();
                }
                fetchProductesData();
            } else {
                throw new Error(data.message || 'Error desconegut');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al modificar el producte: ' + error.message);
        })
        .finally(() => {
            guardarBtn.disabled = false;
            tancarBtn.disabled = false;
        });
    }
    

    function fetchLogsData() {
        fetch('?controller=adminAPI&action=getLogs')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la resposta de l\'API: ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                populateLogsTable(data);
            })
            .catch(error => {
                console.error("Error al carregar logs:", error);
                const content = document.getElementById('main-content');
                content.innerHTML = `<h1>Error al carregar els logs</h1><p>${error.message}</p>`;
            });
    }

    function populateLogsTable(logs) {
        const tableBody = document.querySelector('#productes-table tbody');
        tableBody.innerHTML = '';
    
        if (logs.length === 0) {
            const row = document.createElement('tr');
            row.innerHTML = `<td colspan="4" class="text-center">No hi ha logs disponibles.</td>`;
            tableBody.appendChild(row);
        } else {
            logs.forEach(log => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${log.ID}</td>
                    <td>${log.ID_Admin}</td>
                    <td>${log.Accio}</td>
                    <td>${log.Data}</td>
                `;
                tableBody.appendChild(row);
            });
        }
    }
    

    loadContent('dashboard');
});