<?php
// Iniciar la sesión lo más pronto posible
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Esto debe estar al principio del archivo
}

include_once 'models/Usuari.php';

class sessioController {
    // Mètode per iniciar una sessió amb un objecte Usuari
    public static function iniciarSesio($usuari) {
        // Validar que sigui un objecte de tipus Usuari
        if (!($usuari instanceof Usuari)) {
            throw new Exception("El paràmetre ha de ser un objecte de tipus Usuari.");
        }

        // Guardar l'ID de l'usuari a la sessió
        $_SESSION['usuari'] = $usuari;

        // Confirmar que la sessió s'ha iniciat
        return true;
    }

    // Mètode per tancar la sessió
    public function tancarSessio() {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit; 
    }

    // Mètode per verificar si hi ha una sessió activa
    public static function haySesionActiva() {
        return isset($_SESSION['usuari']);
    }

    // Mètode per obtenir l'ID de l'usuari actual en sessió
    public function obtenirIdUsuariSessio() {
        if (self::haySesionActiva()) {
            return $_SESSION['usuari'];
        }

        return null;
    }
}
?>
