<main class="admin-main">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <span class="navbar-brand">Panell d'Administració</span>
            <div class="d-flex align-items-center">
                <span class="me-3">Usuari: <strong><?php echo $_SESSION['usuari']->getNom(); ?></strong></span>
                <a href="?controller=sessio&action=tancarSessio" class="btn btn-outline-danger btn-sm">Tanca sessió</a>
            </div>
        </div>
    </nav>

    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="usuaris">Gestió d'usuaris</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="productes">Gestió de productes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="comandas">Comandas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-section="logs">Logs</a>
            </li>
        </ul>
    </div>

    <div class="content">
        <div id="main-content">
            <h1>Benvingut al panell d'administració</h1>
            <p>Selecciona una opció del menú per començar.</p>
        </div>
    </div>
</main>

<script src="assets/scripts/admin.js"></script>
