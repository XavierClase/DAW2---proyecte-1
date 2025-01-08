<main class="modificarUsuari-main">
    <div id="barra-lateral-perfil" class="container mt-5 perfil-main">
        <div class="row">
            <div class="col-md-3" id="barraLateral-pefil">
                <ul class="list-group">
                    <li class="list-group-item active"><a href="?controller=perfil&action=index">El Meu Perfil</a></li>
                    <li class="list-group-item"><a href="?controller=perfil&action=mostrarComandes">Les Meves Comandes</a></li>
                    <li class="list-group-item">Informació Del Compte</li>
                </ul>
            </div>

            <div class="col-md-9">
                <h3>Informació del compte</h3>
                <form action="?controller=perfil&action=updateUsuari" method="POST">
                    <div class="row">
                        <!-- Información Personal -->
                        <div class="col-md-6">
                            <h4>Informació Personal</h4>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom *</label>
                                <input type="text" class="form-control" name="nom" id="nom" value="<?=$usuari['nom']?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="cognoms" class="form-label">Cognoms *</label>
                                <input type="text" class="form-control" name="cognoms" id="cognoms" value="<?=$usuari['cognoms']?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefon" class="form-label">Telèfon *</label>
                                <input type="number" class="form-control" name="telefon" id="telefon" value="<?=$usuari['telefon']?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="dataNaixement" class="form-label">Data de naixement</label>
                                <input type="date" class="form-control" name="data_naixement" id="dataNaixement" value="<?=$usuari['data_naixement']?>">
                            </div>
                        </div>

                        <?php if (isset($_GET['canviarContrasenya']) && $_GET['canviarContrasenya'] === 'True'): ?>
                        <div class="col-md-6">
                            <h4>Canviar la Contrasenya</h4>
                            <div class="mb-3">
                                <label for="contrasenyaActual" class="form-label">Contrasenya actual *</label>
                                <input type="password" class="form-control" name="contrasenya_actual" id="contrasenyaActual">
                            </div>
                            <div class="mb-3">
                                <label for="novaContrasenya" class="form-label">Nova contrasenya *</label>
                                <input type="password" class="form-control" name="nova_contrasenya" id="novaContrasenya">
                            </div>
                            <div class="mb-3">
                                <label for="confirmarNovaContrasenya" class="form-label">Confirmar nova contrasenya *</label>
                                <input type="password" class="form-control" name="confirmar_nova_contrasenya" id="confirmarNovaContrasenya">
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" name="action" value="update_info" class="btn btn-primary">Desar Canvis</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
