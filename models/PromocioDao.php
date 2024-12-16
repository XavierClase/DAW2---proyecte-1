<?php
    class PromocioDao {
        public static function comprovarPromocio($promocioComprovar)
        {
            try {
                $con = DataBase::connect();
            
                $query = "SELECT Descompte FROM Promocions WHERE Codi_Promocional = ?";
                $stmt = $con->prepare($query);
                $stmt->bind_param("s", $promocioComprovar);
                $stmt->execute();
                $result = $stmt->get_result();
            
                $promocio = $result->fetch_object();
                
                $stmt->close();
                $con->close();
                return $promocio; 
            } catch (Exception $e) {
                die("Error al validar la promoció: " . $e->getMessage());
            }
        } 
    }