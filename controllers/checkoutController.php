<?php
    include_once 'models/Comanda.php';
    include_once 'models/ComandaDao.php';
    include_once 'models/Usuari.php';
    include_once 'models/UsuariDao.php';
    class CheckoutController {
        public function index() {
            if (isset($_SESSION['usuari'])) {
                $nomUsuari = $_SESSION['usuari']->getNom();
                $cognomsUsuari = $_SESSION['usuari']->getCognoms();
                $telefonUsuari = $_SESSION['usuari']->getTelefon();
                $correuUsuari = $_SESSION['usuari']->getCorreu_electronic();
            } else {
                $nomUsuari = null;
                $cognomsUsuari = null;
                $telefonUsuari = null;
                $correuUsuari = null;
            }
    
            include_once('views/checkout.php');
        } 
        public function checkout() {
            $carro = $_SESSION['carro'];
        
            $nom_client = $_POST["nom"] . " " . $_POST["cognoms"];
            $telefonUsuari = $_POST["telefon"];
            $adrecaUsuari = $_POST["adreca"];
            $codiPostal = $_POST["codiPostal"];
            $ciutatUsuari = $_POST["ciutat"];
            $correuClient = $_POST["correu"];
        
            $metodePagament = $_POST["pagament"]; 
        
            if (isset($_SESSION['usuari'])) {
                $ID_Usuari = $_SESSION['usuari']->getID_Usuari();
            } else {
                $ID_Usuari = 0;
            }
        
            $datetime = date("Y-m-d H:i:s");
            $estat = "pendent";
            $total = $_SESSION["carro_total"];
            $direccio = $codiPostal . ", " . $ciutatUsuari . ", " . $adrecaUsuari;
        
            $ComandaDades = new Comanda(null, $ID_Usuari, $datetime, $estat, $metodePagament, $total, $direccio, $nom_client, $telefonUsuari, $correuClient);
        
            ComandaDao::pujarComanda($ComandaDades, $carro);
        
            unset($_SESSION['carro']);
        

            header("Location: ?controller=home&action=index");
            
        }
        
    }

?>