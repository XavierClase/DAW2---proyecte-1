<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panell d'Administració</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
        }
        .sidebar {
            height: 100%;
            position: fixed;
            top: 56px; 
            left: 0;
            width: 250px;
            background-color: #f8f9fa;
            border-right: 1px solid #ddd;
        }
        .content {
            margin-left: 250px; 
            margin-top: 56px; 
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <span class="navbar-brand">Panell d'Administració</span>
            <div class="d-flex align-items-center">
                <span class="me-3">Usuari: <strong><?php echo $_SESSION['username']; ?></strong></span>
                <a href="/logout.php" class="btn btn-outline-danger btn-sm">Tanca sessió</a>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#" onclick="loadContent('dashboard')">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadContent('usuaris')">Gestió d'usuaris</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadContent('productes')">Gestió de productes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadContent('informes')">Informes</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div id="main-content">
            <h1>Benvingut al panell d'administració</h1>
            <p>Selecciona una opció del menú per començar.</p>
        </div>
    </div>

    <!-- Bootstrap JS (with Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Simulació de càrrega de contingut
        function loadContent(section) {
            const content = document.getElementById('main-content');
            switch (section) {
                case 'dashboard':
                    content.innerHTML = '<h1>Dashboard</h1><p>Estadístiques i resum general del sistema.</p>';
                    break;
                case 'usuaris':
                    content.innerHTML = '<h1>Gestió d\'usuaris</h1><p>Eines per gestionar usuaris.</p>';
                    break;
                case 'productes':
                    content.innerHTML = '<h1>Gestió de productes</h1><p>Opcions per gestionar productes a la botiga.</p>';
                    break;
                case 'informes':
                    content.innerHTML = '<h1>Informes</h1><p>Consulta i generació d\'informes.</p>';
                    break;
                default:
                    content.innerHTML = '<h1>Benvingut al panell d\'administració</h1><p>Selecciona una opció del menú per començar.</p>';
                    break;
            }
        }
    </script>
</body>
</html>
