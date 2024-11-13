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

        public static function getCategoria($categoria)
        {
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM Productes WHERE categoria = ?");
            $stmt->bind_param("s", $categoria);
            $stmt->execute();
            $result = $stmt->get_result();

            $productes = [];
            while($producte = $result->fetch_object("Producte")) {
                $productes[] = $producte;
            }

            $stmt->close(); 
            $con->close(); 
            return $productes;
        }

        
        public static function getNovetats()
        {
            $con = DataBase::connect();
            // Seleccionem els últims quatre productes afegits, ordenant per id en ordre descendent
            $stmt = $con->prepare("SELECT * FROM Productes ORDER BY ID_PRODUCTE DESC LIMIT 7");
            $stmt->execute();
            $result = $stmt->get_result();
    
            $novetats = [];
            while ($producte = $result->fetch_object("Producte")) {
                $novetats[] = $producte;
            }
            $con->close();
            return $novetats;
        }
        
        
    }

