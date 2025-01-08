<main class="login-main">
    <div class="container mt-5">
        <h1 class="mb-4">Inici de sessió de client</h1>
        <form action="?controller=autenticacio&action=loginUsuari" method="POST">
            <div class="row">

                <div class="col-md-6">
                    <h4>Clients registrats</h4>
                    <div class="mb-3">
                        <label for="correuLogin" class="form-label">Correu Electrònic *</label>
                        <input type="email" name="correuLogin" class="form-control" id="correuLogin" required>
                        <?php
                            if (isset($_SESSION['error_usuari'])) {
                                echo '<div class="text-danger mt-2">' . $_SESSION['error_usuari'] . '</div>';
                                unset($_SESSION['error_usuari']); 
                            }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="contrasenyaLogin" class="form-label">Contrasenya *</label>
                        <input type="password" name="contrasenyaLogin" class="form-control" id="contrasenyaLogin" required>
                        <?php
                            if (isset($_SESSION['error_contra'])) {
                                echo '<div class="text-danger mt-2">' . $_SESSION['error_contra'] . '</div>';
                                unset($_SESSION['error_contra']); 
                            }
                        ?>
                    </div>
                </div>


                <div class="col-md-5">
                    <h4>Nous clients</h4>
                    <p>Crea un compte per ganar comoditat a les teves compres.</p>
                    <div class="mb-3">
                        <a href="?controller=autenticacio&action=registre">
                            <button type="button" class="btn btn-primary mt-3">Crear compte</button>
                        </a>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Inicia sesió</button>
        </form>
    </div>
</main>