<main class="perfil-main">
    <div id="barra-lateral-perfil" class="container mt-5 perfil-main">
        <div class="row">
            
            <div class="col-md-3" id="barraLateral-pefil">
                <ul class="list-group">
                    <li class="list-group-item active">El Meu Perfil</li>
                    <li class="list-group-item"><a href="?controller=perfil&action=mostrarComandes">Les Meves Comandes</a></li>
                    <li class="list-group-item"><a href="?controller=perfil&action=modificarUsuari">Informació del Compte</a></li>
                </ul>
            </div>

            <div class="col-md-9">
                <h1 class="mb-4">El Meu Perfil</h1>
                <div>
                    <h2>Detalls</h2>
                    <h5>Informació de Contacte</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                <strong>Nom i Cognoms:</strong> <?=$usuari['nom'] . ' ' . $usuari['cognoms']?><br>
                                <strong>Email:</strong> <?=$usuari['email']?>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <strong>Data de Naixement:</strong> <?=$usuari['data_naixement']?><br>
                                <strong>Telèfon:</strong> <?=$usuari['telefon']?>
                            </p>
                        </div>
                    </div>
                    <a href="?controller=perfil&action=modificarUsuari" class="btn-link">Editar</a>
                    <a href="?controller=perfil&action=modificarUsuari&canviarContrasenya=True" class="btn-link">Canviar Contrasenya</a>
                </div>
            </div>
        </div>
    </div>
</main>