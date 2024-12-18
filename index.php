<?php
ob_start();
include_once('config/parameters.php');  
include_once('controllers/carroController.php');
include_once('controllers/autenticacioController.php');



// Establecer el controlador y la acción por defecto
$default_controller = "home";
$default_action = "index";

// Determina el controlador y la acción actuales
$nom_controller = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : $default_controller . 'Controller';
$action = isset($_GET['action']) ? $_GET['action'] : $default_action;

$controller_file = 'controllers/' . $nom_controller . '.php';
if (file_exists($controller_file)) {
    include_once($controller_file);

    if (class_exists($nom_controller)) {
        $controller = new $nom_controller();
        
        // Llamar a la acción según corresponda
        if ($action === 'categoria' && isset($_GET['categoria'])) {
            $controller->$action($_GET['categoria']);
        } elseif ($action === 'seleccioProducte' && isset($_GET['idProducte'])) {
            $controller->$action($_GET['idProducte']);
        } else {
            $controller->$action();
        }
    } else {
        echo "No existeix el controlador " . $nom_controller;
    }
} else {
    echo "No exisetix l'arxiu " . $controller_file;
}



ob_end_flush();
?>
