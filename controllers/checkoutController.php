<?php
    include_once 'models/Comanda.php';
    include_once 'models/ComandaDao.php';
    include_once 'models/Usuari.php';
    include_once 'models/UsuariDao.php';
    class CheckoutController {
        public function index() {
            include_once('views/checkout.php');
        }

        public function checkout() {
            
            $carro = $_SESSION['carro'];

            $nomUsuari = $_POST["nom"];
            $cognomUsuari = $_POST["cognoms"];
            $telefonUsuari = $_POST["telefon"];
            $adrecaUsuari = $_POST["adreca"];
            $codiPostal = $_POST["codiPostal"];
            $ciutatUsuari = $_POST["ciutat"];

            $ID_Usuari = UsuariDao::getID($nomUsuari);

            $datetime = date("Y-m-d H:i:s");

            $estat = "pendent";

            $metodePagament = "efectiu";

            $total = $_SESSION['carro_total'];

            $direccio = $codiPostal . ", " . $ciutatUsuari . ", " . $adrecaUsuari;

            $ComandaDades = new Comanda(null, $ID_Usuari, $datetime, $estat, $metodePagament, $total, $direccio);

            ComandaDao::pujarComanda($ComandaDades, $carro);

            unset($_SESSION['carro']);

            header("Location: ?controller=home&action=index");

        }
    }

?>