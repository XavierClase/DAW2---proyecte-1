<?php
    include_once 'models/Usuari.php';
    include_once 'models/UsuariDao.php';
    include_once 'controllers/sessioController.php';

    class autenticacioController {
        
        public function registre() {
            // Evita cualquier salida antes de esta línea
            include_once 'views/registre.php';
        }

        public function login() {
            // Evita cualquier salida antes de esta línea
            include_once 'views/login.php';
        }

        public function createUsuari() {

            // Asegúrate de que no haya salida antes de este código
            $nom = $_POST['nom'];
            $correu = $_POST['correu'];
            $contra = $_POST['contrasenya'];
            $confirmarContrasenya = $_POST['confirmar-contrasenya'];
            $telefon = $_POST['telefon'];
            $dataNaixement = $_POST['dataNaixement'];

            if ($contra == $confirmarContrasenya) {

                $usuari = new Usuari();
                $usuari->setNom($nom);
                $usuari->setCorreu_electronic($correu);
                $usuari->setContrasenya($contra);
                $usuari->setTelefon($telefon);
                $usuari->setData_naixement($dataNaixement);

                UsuariDao::registre($usuari);

                // Realiza la redirección después de guardar el usuario
                // Asegúrate de que no haya ninguna salida antes de esta línea
                header('Location:?controller=autenticacio&action=login');
                exit; // No olvides el exit después de header para evitar que el código siga ejecutándose
            }
        }

        public function loginUsuari() {
            $correu = $_POST['correuLogin'];
            $contra = $_POST['contrasenyaLogin'];

            $usuari = usuariDao::getUsuaris($correu);

            if (count($usuari) == 1) {
                if ($usuari[0]->getContrasenya() == $contra) {
                    // Llama a la sesión solo después de la verificación
                    sessioController::iniciarSesio($usuari[0]);
                    header('Location: index.php');
                    exit; // No olvides el exit después de header para evitar que el código siga ejecutándose
                } else {
                    echo "Contraseña incorrecta";
                }
            } else {
                echo "Usuario inexistent";
            }
        }
    }
?>
