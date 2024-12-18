<?php
    include_once('models/ProducteDao.php');
    include_once('models/Producte.php');

    class homeController {
        public function index()
        {
            $productes = ProducteDao::getNovetats();
            
            $vista = 'views/home.php';

            include_once 'views/main.php';
        }
    }
?>