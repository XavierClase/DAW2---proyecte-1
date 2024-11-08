<?php
    include_once('models/ProducteDao.php');
    include_once('models/Producte.php');

    class homeController {
        public function index()
        {
            $productes = ProducteDao::getNovetats();
            include_once 'views/home.php';
        }
    }
?>