<?php
    include_once('models/ProducteDao.php');
    include_once('models/Producte.php');

    class detallsProducteController {

        public function seleccioProducte($idProducte) {
            $producte = ProducteDao::getProducte($idProducte);

            $vista = 'views/detallsProducte.php';
            include_once 'views/main.php';
        }
    
    }
    
?>