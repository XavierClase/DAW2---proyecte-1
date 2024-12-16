<?php
    include_once 'models/Usuari.php';

    class AdminController {

        public static function index() {
            if (isset($_SESSION['usuari'])) {
                $usuari = $_SESSION['usuari'];
                if ($usuari->getTipus_usuari() === 'Administrador') {
                    header('Location: admin.php');
                } else {
                    header('Location: views/admin/autenticacioAdmin.php');
                }
            } else {
                header('Location: views/admin/autenticacioAdmin.php');
            }
        }
    }

?>