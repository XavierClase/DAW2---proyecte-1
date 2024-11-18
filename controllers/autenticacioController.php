<?php
    include_once 'models/Usuari.php';
    include_once 'models/UsuariDao.php';
    class autenticacioController {
        public function registre() {
            include_once 'views/registre.php';
        }

        public function createUsuari() {
            $nom = $_GET['nom'];
            $correu = $_GET['correu'];
            $contra = $_GET['contra'];
            $confirmarContrasenya = $_GET['confirmar-contrasenya'];
            $telefon = $_GET['telefon'];
            $dataNaixement = $_GET['dataNaixement'];

            if ($contra == $confirmarContrasenya) {

                $usuari = new Usuari();

                $usuari->setNom($nom);
                $usuari->setCorreu_electronic($correu);
                $usuari->setContrasenya($contra);
                $usuari->setTelefon($telefon);
                $usuari->setData_naixement($dataNaixement);


                var_dump($usuari);

                //UsuariDao::registre($usuari);



                //header('index');
            }

        }
    }