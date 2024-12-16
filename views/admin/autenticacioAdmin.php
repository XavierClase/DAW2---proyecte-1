<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inici de sessió</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center mb-4">Inici de sessió</h2>
        <form id="login-form" onsubmit="checkLogin(event)">
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'usuari</label>
                <input type="text" class="form-control" id="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contrasenya</label>
                <input type="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Iniciar sessió</button>
        </form>
        <div id="error-message" class="text-danger text-center mt-3" style="display: none;">Credencials incorrectes o no ets administrador</div>
    </div>

    <!-- Bootstrap JS (with Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function checkLogin(event) {
            event.preventDefault();

            // Exemple senzill de comprovació (canviar per verificació amb backend real)
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (username === 'admin' && password === '1234') {
                window.location.href = 'admin-panel.html'; // Redirigir al panell d'administració
            } else {
                document.getElementById('error-message').style.display = 'block';
            }
        }
    </script>
</body>
</html>
