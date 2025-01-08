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

        

        public static function getID($nomUsuari)
        {
            $con = DataBase::connect();
    
            $query = "SELECT ID_Usuari FROM Usuaris WHERE Nom = ?";
    
            $stmt = $con->prepare($query);
            if (!$stmt) {
                die("Error al preparar la consulta: " . $con->error);
            }
    
            $stmt->bind_param("s", $nomUsuari);
    
            $stmt->execute();
    
            $result = $stmt->get_result();
            if (!$result) {
                die("Error al obtenir resultats: " . $stmt->error);
            }
    
            $ID_Usuari = $result;
    
            $stmt->close();
            $con->close();
    
            return $ID_Usuari;
        }

        public static function updateUsuari($ID_Usuari, $nouNom, $nouCognom, $nouData_naixement, $nouTelefon)
        {
            $con = DataBase::connect();

            $stmt = $con->prepare("UPDATE Usuaris SET Nom = ?, Cognoms = ?, Telefon = ?, Data_naixement = ? WHERE ID_Usuari = ?");

            $stmt->bind_param("ssssi", $nouNom, $nouCognom, $nouTelefon, $nouData_naixement, $ID_Usuari);

            $stmt->execute();

            $stmt->close();
        }

        public static function updatePassword($ID_Usuari, $novaContrasenya)
        {
            $con = DataBase::connect();

            $stmt = $con->prepare("UPDATE Usuaris SET Contrasenya = ? WHERE ID_Usuari = ?");

            $stmt->bind_param("si", $novaContrasenya, $ID_Usuari);

            $stmt->execute();

            $stmt->close();
        }

        public static function getAll() {
            $con = DataBase::connect();
            $stmt = $con->prepare("SELECT * FROM Usuaris");
            $stmt->execute();
            $result = $stmt->get_result();
            $usuaris = [];
    
            while ($row = $result->fetch_assoc()) {
                $usuari = new Usuari();
                $usuari->setID_Usuari($row['ID_Usuari']);
                $usuari->setNom($row['Nom']);
                $usuari->setCognoms($row['Cognoms']);
                $usuari->setCorreu_electronic($row['Correu_electronic']);
                $usuari->setContrasenya($row['Contrasenya']);
                $usuari->setTelefon($row['Telefon']);
                $usuari->setData_naixement($row['Data_naixement']);
                $usuari->setTipus_usuari($row['Tipus_usuari']);
                
                $usuaris[] = $usuari;
            }
    
            $stmt->close();
            $con->close();
    
            return $usuaris;
        }

        public static function delUser($ID_Usuari) {
            $con = DataBase::connect();
            $stmt = $con->prepare("DELETE FROM Usuaris WHERE ID_Usuari = ?");
            $stmt->bind_param("i", $ID_Usuari);
            $stmt->execute();
            $stmt->close();
        }

        public static function modUserByAdmin($ID_Usuari, $nouNom, $nouCognom, $nouCorreu, $nouTelefon, $nouData_naixement, $nouTipus)
        {
            $con = DataBase::connect();

            $stmt = $con->prepare("UPDATE Usuaris SET Nom = ?, Cognoms = ?, Correu_electronic = ?, Telefon = ?, Data_naixement = ?, Tipus_usuari = ? WHERE ID_Usuari = ?");

            $stmt->bind_param("sssssss", $nouNom, $nouCognom, $nouCorreu, $nouTelefon, $nouData_naixement, $nouTipus, $ID_Usuari);

            $stmt->execute();

            $stmt->close();
        }

        
    }