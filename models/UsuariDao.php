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
        }