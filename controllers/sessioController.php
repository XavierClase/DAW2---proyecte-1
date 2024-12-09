<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start(); 
}

include_once 'models/Usuari.php';

class sessioController {
    public static function iniciarSesio($usuari) {
        if (!($usuari instanceof Usuari)) {
            throw new Exception("El paràmetre ha de ser un objecte de tipus Usuari.");
        }

        $_SESSION['usuari'] = $usuari;

        return true;
    }

    public function tancarSessio() { 
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit; 
    }

    public static function haySesionActiva() {
        return isset($_SESSION['usuari']);
    }

    public function obtenirIdUsuariSessio() {
        if (self::haySesionActiva()) {
            return $_SESSION['usuari'];
        }

        return null;
    }
}
?>
