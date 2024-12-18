<?php
include_once 'models/Comanda.php';
include_once 'models/ComandaDao.php';

class adminAPIController {
    public static function getComandas()
    {
        $comandes = ComandaDAO::getAll();
        $comandesArray = [];
        foreach ($comandes as $comanda) {
            $comandesArray[] = $comanda->toArray();
        }


        header('Content-Type: application/json');
        
        // Enviamos la respuesta JSON
        echo json_encode($comandesArray);
    }
}
?>
