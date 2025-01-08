<?php
    include_once 'models/Usuari.php';
    include_once 'models/UsuariDao.php';
    include_once 'controllers/sessioController.php';

    class AdminController {

        public static function index() {
            if (isset($_SESSION['usuari'])) {
                $usuari = $_SESSION['usuari'];
                if ($usuari->getTipus_usuari() === 'administrador') {
                    $vista = 'views/admin/panellAdministrador.php';
                    include_once 'views/admin/adminMain.php';
                } else {
                    $vista = 'views/admin/autenticacioAdmin.php';
                    include_once 'views/admin/adminMain.php';
                }
            } else {
                $vista = 'views/admin/autenticacioAdmin.php';
                include_once 'views/admin/adminMain.php';
            }
        }
    
        

        public static function autenticacio() {
            if (isset($_POST['correuAdmin']) && isset($_POST['contraAdmin'])) {
                $correu = $_POST['correuAdmin'];
                $contra = $_POST['contraAdmin'];
                $usuari = UsuariDao::getUsuaris($correu);

                if ($usuari[0]->getTipus_usuari() == 'administrador') {
                    $contraEncriptada = $usuari[0]->getContrasenya();
                    if (password_verify($contra, $contraEncriptada)) {
                        sessioController::iniciarSesio($usuari[0]);                        
                    }
                }
            }
            header('Location: ?controller=admin');
        }
    }
    
    

?>