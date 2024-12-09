<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title> 
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/carta.css">
    <link rel="stylesheet" href="assets/css/detallsProducte.css">
    <link rel="stylesheet" href="assets/css/carro.css">
    <link rel="stylesheet" href="assets/css/registre.css">
    <link rel="stylesheet" href="assets/css/checkout.css">
    <link rel="stylesheet" href="assets/css/perfil.css">
</head>
<body>
    <?php
        ob_start();
        include_once('config/parameters.php');
        include_once('controllers/homeController.php');
        include_once('controllers/cartaController.php');   
        include_once('controllers/detallsProducteController.php'); 
        include_once('controllers/carroController.php');
        include_once('controllers/autenticacioController.php');
        include_once('controllers/sessioController.php');   
        include_once('controllers/checkoutController.php');
        include_once('controllers/perfilController.php');
        include_once('views/header.php');


        $default_controller = "home";
        $default_action = "index";

        $nombre_controller = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : $default_controller . 'Controller';
        $action = isset($_GET['action']) ? $_GET['action'] : $default_action;

        if (class_exists($nombre_controller)) {
            $controller = new $nombre_controller();

            if (method_exists($controller, $action)) {
                if ($action === 'categoria' && isset($_GET['categoria'])) {
                    $controller->$action($_GET['categoria']); 
                } elseif ($action === 'seleccioProducte' && isset($_GET['idProducte'])) {
                    $controller->$action($_GET['idProducte']);
                } else {
                    $controller->$action(); 
                }
            } else {
                echo "No existe la acción " . $action . " en el controlador " . $nombre_controller;
            }
        } else {
            echo "No existe el controlador " . $nombre_controller;
        }

        include_once('views/footer.php');
        ob_end_flush();
    ?>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>