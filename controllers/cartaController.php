<?php
    include_once('models/ProducteDao.php');
    include_once('models/Producte.php');

    class cartaController {
        public function index() {
            $order = $_GET['order'] ?? 'posicio';
            $productes = ProducteDao::getAll($order);

            $vista = 'views/carta.php';
            include_once 'views/main.php';
        }
    
        public function categoria($categoria) {
            $descripcioCategoria = $this->getDescripcioCategoria($categoria);
            $order = $_GET['order'] ?? 'posicio';
            
            $currentOrder = $_GET['order'] ?? 'posicio';
            
            if ($categoria) {
                $productes = ProducteDao::getCategoria($categoria, $order);
                

                $vista = 'views/carta.php';
                include_once 'views/main.php';
            }
        }
    
        private function getDescripcioCategoria($categoria) {
            switch ($categoria) {
                case 'MENJARS PREPARATS':
                    $descripcioCategoria = "Plats tradicionals i casolans, llestos per gaudir amb el sabor i l'essència d'un bon àpat fet a mà. Des de guisats fins a receptes de tota la vida, ideal per sentir-se com a casa amb cada mossegada.";
                    break;
                case 'MENJARS DESHIDRATATS':
                    $descripcioCategoria = "Ingredients i plats preparats amb cura per conservar tot el sabor i les propietats dels aliments, llestos per prepara i gaudir on vulguis. Perfecte per travesies llargas per la muntanya.";
                    break;
                case 'APERITIUS MUNTANYA':
                    $descripcioCategoria = "Delícies de muntanya per compartir o gaudir en solitari. Sabors intensos i autèntics que et transporten al camp amb cada mos, ideals per guanyar les energies necessàries a les teves travesies.";
                    break;
                case 'VINS':
                    $descripcioCategoria = "Vins amb caràcter i història, perfectes per maridar amb plats casolans. Tant si prefereixes un vi jove com un de reserva, trobaràs opcions per a tots els gustos.";
                    break;
                case 'CERVESES':
                    $descripcioCategoria = "Una selecció de cerveses tradicionals i artesanes, amb un ampli ventall de sabors que van des de les més suaus fins a les més intenses. Per gaudir en moments especials o per acompanyar un bon àpat rural.";
                    break;
                case 'REFRESCOS':
                    $descripcioCategoria = "Begudes fresques i clàssiques, ideals per acompanyar qualsevol àpat o per prendre durant el dia. Des de refrescs tradicionals fins a opcions amb tocs originals.";
                    break;
                case 'POSTRES RURALS':
                    $descripcioCategoria = "Delícies artesanals amb ingredients autèntics del camp, des de pastissos fins a galetes fetes amb receptes antigues. Són postres que capturen l’essència de la cuina rural, ideals per als amants dels sabors de sempre.";
                    break;
                case 'POSTRES CLASICS':
                    $descripcioCategoria = "Dolços de tota la vida, aquells que sempre trobem a casa de l’àvia. Des de flams fins a pudins, són postres senzills però plens de records i sabor.";
                    break;
                default:
                    $descripcioCategoria = "";
                    break;
            }
            return $descripcioCategoria;
        }
    }
    
?>