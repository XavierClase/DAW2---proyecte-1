<?php
    include_once('config/database.php');
    include_once('models/Producte.php');


    class UsuariDao {
        public static function registre($usuari) 
        {
            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO Usuaris (Nom, Correu_electronic, Contrasenya, Telefon, Data_naixement) VALUES (?,?,?,?,?);");

            $nom = $usuari->getNom();
            $correu = $usuari->getCorreu_electronic();
            $contra = $usuari->getContrasenya();
            $telefon = $usuari->getTelefon();
            $dataNaixement = $usuari->getData_naixement();

            $stmt->bind_param("sssss",$nom,$correu, $contra, $telefon, $dataNaixement);

            $stmt->execute();
            $stmt->close();
        }

        public static function getUsuaris($correuUsuari) 
        {
            // Conectar a la base de datos
            $con = DataBase::connect();
            
            // Consulta preparada con marcador de posición
            $query = "SELECT * FROM Usuaris WHERE Correu_electronic = ?";
            
            // Preparar la consulta
            $stmt = $con->prepare($query);
            if (!$stmt) {
                die("Error al preparar la consulta: " . $con->error);
            }
            
            // Vincular el parámetro
            $stmt->bind_param("s", $correuUsuari); // "s" indica que el parámetro es una cadena
            
            // Ejecutar la consulta
            $stmt->execute();
            
            // Obtener los resultados
            $result = $stmt->get_result();
            if (!$result) {
                die("Error al obtener resultados: " . $stmt->error);
            }
            
            // Convertir resultados en un array de objetos "Usuari"
            $usuaris = [];
            while ($usuari = $result->fetch_object("Usuari")) {
                $usuaris[] = $usuari;
            }
            
            // Cerrar el statement y la conexión
            $stmt->close();
            $con->close();
            
            // Devolver el array de usuarios
            return $usuaris;
        }

    }