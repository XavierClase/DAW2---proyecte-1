<?php
    include_once('config/database.php');
    include_once('models/Producte.php');


    class ProducteDao {
        public static function getAll()
        {
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM Productes");
            $stmt->execute();
            $result = $stmt->get_result();

            $productes = [];
            while($producte = $result->fetch_object("Producte")) {
                $productes[] = $producte;
            }
            $con->close();
            return $productes;
        }
    }

?>