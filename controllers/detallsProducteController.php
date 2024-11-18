<?php
    include_once('models/ProducteDao.php');
    include_once('models/Producte.php');

    class detallsProducteController {

        public function seleccioProducte($idProducte) {
            $producte = ProducteDao::getProducte($idProducte);

            include_once 'views/detallsProducte.php';
        }
    
    }
    
?>