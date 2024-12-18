<main class="autenticacioAdminMain">


    <div class="login-container">
        <h2 class="text-center mb-4">Inici de sessió</h2>
        <form id="login-form" action="?controller=admin&action=autenticacio" method="POST">
            <div class="mb-3">
                <label for="correuAdmin" class="form-label">Correu elèctronic</label>
                <input type="email" class="form-control" name="correuAdmin" id="correuAdmin" required>
            </div>
            <div class="mb-3">
                <label for="contraAdmin" class="form-label">Contrasenya</label>
                <input type="password" class="form-control" name="contraAdmin" id="contraAdmin" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Iniciar sessió</button>
        </form>
        <div id="error-message" class="text-danger text-center mt-3" style="display: none;">Credencials incorrectes o no ets administrador</div>
    </div>
</main>
