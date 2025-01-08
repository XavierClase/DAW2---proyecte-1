<?php
    include_once('config/database.php');
    include_once('models/Producte.php');


    class ProducteDao {
        public static function getAll($order = 'posicio') {
            $con = DataBase::connect();
            
            $query = "SELECT * FROM Productes";
            $query .= self::getOrderByClause($order);
            
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
    
            $productes = [];
            while($producte = $result->fetch_object("Producte")) {
                $productes[] = $producte;
            }
            
            $con->close();
            return $productes;
        }
    
        public static function getCategoria($categoria, $order = 'posicio') {
            $con = DataBase::connect();
            
            $query = "SELECT * FROM Productes WHERE categoria = ? OR precategoria = ?";
            $query .= self::getOrderByClause($order);
        
            $stmt = $con->prepare($query);
        
            $stmt->bind_param("ss", $categoria, $categoria);
        
            $stmt->execute();
            $result = $stmt->get_result();
        
            $productes = [];
            while ($producte = $result->fetch_object("Producte")) {
                $productes[] = $producte;
            }
            
            $stmt->close();
            $con->close();
            return $productes;
        }
        
    
        private static function getOrderByClause($order) {
            switch ($order) {
                case 'menor-major':
                    return " ORDER BY preu ASC";
                case 'major-menor':
                    return " ORDER BY preu DESC";
                default:
                    return " ORDER BY ID_PRODUCTE"; 
            }
        }
        
        public static function getNovetats()
        {
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM Productes ORDER BY ID_Producte DESC LIMIT 7");
            $stmt->execute();
            $result = $stmt->get_result();
    
            $novetats = [];
            while ($producte = $result->fetch_object("Producte")) {
                $novetats[] = $producte;
            }
            $con->close();
            return $novetats;
        }

        public static function getProducte($idProducte)
        {
            $con = DataBase::connect();
            
            $query = "SELECT * FROM Productes WHERE ID_Producte  = ?";
    
            $stmt = $con->prepare($query);
            $stmt->bind_param("s", $idProducte);
            $stmt->execute();
            $result = $stmt->get_result();
    
            $producte = $result->fetch_object("Producte");
            
            $stmt->close();
            $con->close();
            return $producte;
        }
        public static function getNom($idProducte)
        {
            $con = DataBase::connect();

            $query = "SELECT nom FROM Productes WHERE ID_Producte  = ?";

            $stmt = $con->prepare($query);
            $stmt->bind_param("s", $idProducte);
            $stmt->execute();
            $result = $stmt->get_result();

            $producte = $result->fetch_object("Producte");

            $stmt->close();
            $con->close();
            return $producte;
        }
        public static function getCarroInfo($idProducte) {
            $con = DataBase::connect();
            $query = "SELECT ID_Producte, nom, preu, categoria, imatge FROM Productes WHERE ID_Producte = ?";
            
            $stmt = $con->prepare($query);
            $stmt->bind_param("i", $idProducte); 
            $stmt->execute();
            $result = $stmt->get_result();
            
            $producte = null;
            if ($row = $result->fetch_assoc()) {
                $producte = new Producte();
                $producte->setID_Producte($row['ID_Producte']);
                $producte->setNom($row['nom']);
                $producte->setPreu($row['preu']);
                $producte->setCategoria($row['categoria']);
                $producte->setImatge($row['imatge']);
            }
        
            $stmt->close();
            $con->close();
            return $producte;
        }

        public static function getAllforAdmin() {
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM Productes");
            $stmt->execute();
            $result = $stmt->get_result();
            $productes = [];
        
            while ($row = $result->fetch_assoc()) {
                $producte = new Producte();
                $producte->setID_Producte($row['ID_Producte']);
                $producte->setNom($row['nom']);
                $producte->setDescripcio($row['descripcio']);
                $producte->setPreu($row['preu']);
                $producte->setCategoria($row['categoria']);
                $producte->setDisponibilitat($row['disponibilitat']);
                $producte->setDescompte($row['descompte']);
                $producte->setImatge($row['imatge']);
                $productes[] = $producte;
            }
        
            $stmt->close();
            $con->close();
            return $productes;
        }

        public static function delProducte($idProducte) {
            $con = DataBase::connect();
            $stmt = $con->prepare("DELETE FROM Productes WHERE ID_Producte = ?");
            $stmt->bind_param("i", $idProducte);
            $stmt->execute();
            $stmt->close();
            $con->close();
        }

        public static function modProducte($ID_Producte, $nom, $descripcio, $preu, $categoria, $disponibilitat, $imatge) {
            $con = DataBase::connect();
        
            $stmt = $con->prepare("UPDATE Productes SET nom = ?, descripcio = ?, preu = ?, categoria = ?, disponibilitat = ?, imatge = ? WHERE ID_Producte = ?");
        
            $stmt->bind_param("ssdsssi", $nom, $descripcio, $preu, $categoria, $disponibilitat, $imatge, $ID_Producte);
        
            $stmt->execute();
        
            $stmt->close();
        }
        
        
        
    }