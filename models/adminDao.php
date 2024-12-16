<?php

    class adminDao {
        public static function comprovarAdmin($correuUsuari) {
            $con = DataBase::connect();
            
            $query = "SELECT Tipus_usuari FROM Usuaris WHERE Correu_electronic = ?";
            
            $stmt = $con->prepare($query);
            if (!$stmt) {
                die("Error al preparar la consulta: " . $con->error);
            }
            
            $stmt->bind_param("s", $correuUsuari); 
            
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

?>