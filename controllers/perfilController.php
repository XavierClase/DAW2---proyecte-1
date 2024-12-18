<?php
    include_once 'models/Usuari.php';
    include_once 'models/UsuariDao.php';
    include_once 'models/Comanda.php';
    include_once 'models/ComandaDao.php';
final class perfilController {
    
    public static function index() {

        $usuari = [
            'id' => $_SESSION['usuari']->getID_Usuari(),
            'nom' => $_SESSION['usuari']->getNom(),
            'cognoms' => $_SESSION['usuari']->getCognoms(),
            'email' => $_SESSION['usuari']->getCorreu_electronic(),
            'contrasenya' => $_SESSION['usuari']->getContrasenya(),
            'data_naixement' => $_SESSION['usuari']->getData_naixement(),
            'telefon' => $_SESSION['usuari']->getTelefon()
        ];

        $vista = 'views/perfil.php';
        include_once 'views/main.php';
        
    }

    public static function modificarUsuari() {
        $usuari = [
            'id' => $_SESSION['usuari']->getID_Usuari(),
            'nom' => $_SESSION['usuari']->getNom(),
            'cognoms' => $_SESSION['usuari']->getCognoms(),
            'email' => $_SESSION['usuari']->getCorreu_electronic(),
            'contrasenya' => $_SESSION['usuari']->getContrasenya(),
            'data_naixement' => $_SESSION['usuari']->getData_naixement(),
            'telefon' => $_SESSION['usuari']->getTelefon()
        ];
    
        $canviarContrasenya = isset($_GET['canviarContrasenya']) && $_GET['canviarContrasenya'] === 'True';
    
        $vista  ='views/modificarUsuari.php';
        include_once 'views/main.php';
    }
    

    public static function updateUsuari() {
        $nouNom = $_POST['nom'];
        $nouCognom = $_POST['cognoms'];
        $nouData_naixement = $_POST['data_naixement'];
        $nouTelefon = $_POST['telefon'];
        $ID_Usuari = $_SESSION['usuari']->getID_Usuari();
    
        UsuariDao::updateUsuari($ID_Usuari, $nouNom, $nouCognom, $nouData_naixement, $nouTelefon);
    
        if (isset($_POST['contrasenya_actual']) && !empty($_POST['contrasenya_actual'])) {
            $contrasenyaActual = $_POST['contrasenya_actual'];
            $novaContrasenya = $_POST['nova_contrasenya'];
            $confirmarNovaContrasenya = $_POST['confirmar_nova_contrasenya'];
    
            if ($contrasenyaActual !== $_SESSION['usuari']->getContrasenya()) {
                echo "La contrasenya actual no és correcta.";
                return;
            } else {
                if ($novaContrasenya === $confirmarNovaContrasenya) {
                    UsuariDao::updatePassword($ID_Usuari, $novaContrasenya);
                } else {
                    echo "Les contrasenyes no coincideixen.";
                }
            }
            
        }
    
        $usuari = $_SESSION['usuari'];
        $usuari->setNom($nouNom);
        $usuari->setCognoms($nouCognom);
        $usuari->setData_naixement($nouData_naixement);
        $usuari->setTelefon($nouTelefon);

        if (isset($novaContrasenya)) {
            $usuari->setContrasenya($novaContrasenya);
        }
    
        $_SESSION['usuari'] = $usuari;
    
        header('Location: ?controller=perfil&action=index');
    }

    public static function mostrarComandes() {

        $comandes = ComandaDao::getComandes($_SESSION['usuari']->getID_Usuari());
        
        $vista =  'views/comandesUsuari.php';
        include_once 'views/main.php';
    }
    
}