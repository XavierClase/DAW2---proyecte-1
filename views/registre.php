<main class="registre-main">
    <div class="container mt-5">
        <h1 class="mb-4">Crear un nou compte de client</h1>
        <form action="?controller=autenticacio&action=createUsuari" method="POST">
            <div id="row-registre" class="row">
                <!-- Informació Personal -->
                <div class="col-md-6">
                    <h4>Informació Personal</h4>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom *</label>
                        <input type="text" name="nom" class="form-control" id="nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="cognoms" class="form-label">Cognoms *</label>
                        <input type="text" name="cognoms" class="form-control" id="cognoms" required>
                    </div>
                    <div class="mb-3">
                        <label for="data-naixement" class="form-label">Data de naixement</label>
                        <input type="date" name="dataNaixement" class="form-control" id="data-naixement">
                    </div>
                    <div class="mb-3">
                        <label for="telefon" class="form-label">Telèfon</label>
                        <input type="text" name="telefon" class="form-control" id="telefon">
                    </div>
                </div>

                <!-- Informació d'inici de sessió -->
                <div class="col-md-5">
                    <h4>Informació d'inici de sessió</h4>
                    <div class="mb-3">
                        <label for="correu" class="form-label">Correu electrònic *</label>
                        <input type="email" name="correu" class="form-control" id="correu" required>

                        <?php
                            if (isset($_SESSION['error_correu'])) {
                                echo '<div class="text-danger mt-2">' . $_SESSION['error_correu'] . '</div>';
                                unset($_SESSION['error_correu']); 
                            }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="contrasenya" class="form-label">Contrasenya *</label>
                        <input type="password" name="contrasenya" class="form-control" id="contrasenya" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmar-contrasenya" class="form-label">Confirmar contrasenya *</label>
                        <input type="password" name="confirmar-contrasenya" class="form-control" id="confirmar-contrasenya" required>

                        <?php
                            if (isset($_SESSION['error_contra'])) {
                                echo '<div class="text-danger mt-2">' . $_SESSION['error_contra'] . '</div>';
                                unset($_SESSION['error_contra']); 
                            }
                        ?>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Crear compte</button>
        </form>
    </div>
</main>
