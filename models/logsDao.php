<?php
include_once('config/database.php');
    class LogsDao
    {
        public static function setLog($ID_Admin, $Accio, $Data)
        {
            $con = DataBase::connect();
            $stmt = $con->prepare("INSERT INTO Logs (ID_Admin, Accio, Data) VALUES (?, ?, ?);");
            $stmt->bind_param("iss", $ID_Admin, $Accio, $Data);
            $stmt->execute();
            $stmt->close();
            $con->close();
        }
        
        public static function getAll()
        {
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM Logs ORDER BY Data DESC;");
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $con->close();
            return $result;
        }
    }

?>