<?php
    include_once('config/database.php');
    include_once('models/Producte.php');


    class UsuariDao {
        public static function registre($usuari) 
        {
            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO Usuaris (Nom, Cognoms, Correu_electronic, Contrasenya, Telefon, Data_naixement) VALUES (?,?,?,?,?,?);");

            $nom = $usuari->getNom();
            $cognoms = $usuari->getCognoms();
            $correu = $usuari->getCorreu_electronic();
            $contra = $usuari->getContrasenya();
            $telefon = $usuari->getTelefon();
            $dataNaixement = $usuari->getData_naixement();

            $stmt->bind_param("ssssss",$nom,$cognoms, $correu, $contra, $telefon, $dataNaixement);

            $stmt->execute();
            $stmt->close();
        }

        public static function getUsuaris($correuUsuari) 
        {
            $con = DataBase::connect();
            
            $query = "SELECT * FROM Usuaris WHERE Correu_electronic = ?";
            
            $stmt = $con->prepare($query);
            if (!$stmt) {
                die("Error al preparar la consulta: " . $con->error);
            }
            
            $stmt->bind_param("s", $correuUsuari); 
            
            // Ejecutar la consulta
            $stmt->execute();
            
            $result = $stmt->get_result();
            if (!$result) {
                die("Error al obtener resultados: " . $stmt->error);
            }
            
            $usuaris = [];
            while ($usuari = $result->fetch_object("Usuari")) {
                $usuaris[] = $usuari;
            }
            
            $stmt->close();
            $con->close();
            
            return $usuaris;
        }

    }