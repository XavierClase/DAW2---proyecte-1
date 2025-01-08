<?php
include_once 'models/Comanda.php';
include_once 'models/ComandaDao.php';
include_once 'models/UsuariDao.php';
include_once 'models/Usuari.php';
include_once 'models/Producte.php';
include_once 'models/ProducteDao.php';
include_once 'models/logsDao.php';

class adminAPIController {
    public static function getComandas()
    {
        $comandes = ComandaDAO::getAll();
        $comandesArray = [];
        foreach ($comandes as $comanda) {
            $comandesArray[] = $comanda->toArray();
        }

        $productesComandes = "a";


        header('Content-Type: application/json');
        
        echo json_encode($comandesArray);
    }

    public static function modEstat()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['idPedido']) && isset($data['estado'])) {
            $idComanda = $data['idPedido'];
            $nouEstat = $data['estado'];
            
            ComandaDao::modificarEstat($idComanda, $nouEstat);
            adminAPIController::setLog("Modificar estat comanda a " . $nouEstat);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Faltan datos']);
        }
    }

    public static function borrarComanda()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['idPedido'])) {
            $idComanda = $data['idPedido'];

            ComandaDao::delComanda($idComanda);
            adminAPIController::setLog("Eliminar Comanda");
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Faltan datos']);
        }
    }

    public static function setLog($accio)
    {
        $ID_Usuari = $_SESSION['usuari']->getID_Usuari();
        $data_hora = date('Y-m-d H:i:s');

        logsDao::setLog($ID_Usuari,  $accio, $data_hora);
    }

    public static function getUsuaris()
    {
        $usuaris = UsuariDAO::getAll();
        
        $usuarisArray = [];
        
        foreach ($usuaris as $usuari) {
            $usuarisArray[] = $usuari->toArray();
        }



        header('Content-Type: application/json');
        
        echo json_encode($usuarisArray);
    }

    public static function borrarUsuari()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['idUsuari'])) {
            $idUsuari = $data['idUsuari'];

            usuariDao::delUser($idUsuari);
            adminAPIController::setLog("Eliminar Usuari");

            echo json_encode(['status' => 'success', 'message' => 'Usuari eliminat']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Faltan datos']);
        }
    }

    public static function getProductes()
    {
        $productes = ProducteDao::getAllforAdmin();
        
        $productesArray = [];
        
        foreach ($productes as $producte) {
            $productesArray[] = $producte->toArray();
        }



        header('Content-Type: application/json');
        
        echo json_encode($productesArray);
    }

    public static function borrarProducte()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['idProducte'])) {
            $idProducte = $data['idProducte'];

            ProducteDao::delProducte($idProducte);
            adminAPIController::setLog("Eliminar Producte");

            echo json_encode(['status' => 'success', 'message' => 'Usuari eliminat']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Faltan datos']);
        }
    }
    
    public static function getLogs()
    {
        $logs = logsDao::getAll(); 
        $logsArray = [];

        
        while ($row = $logs->fetch_assoc()) {
            $logsArray[] = $row;
        }

        
        header('Content-Type: application/json');

        
        echo json_encode($logsArray);
    }

    public function modificarUsuari() {
        ini_set('display_errors', 0);
        header('Content-Type: application/json');
        
        try {
            $postData = json_decode(file_get_contents('php://input'), true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception('Invalid JSON data received');
            }
            
            $requiredFields = ['ID_Usuari', 'Nom', 'Cognoms', 'Correu_electronic', 'Telefon', 'Data_naixement', 'Tipus_usuari'];
            foreach ($requiredFields as $field) {
                if (!isset($postData[$field]) || empty($postData[$field])) {
                    throw new Exception("Missing required field: $field");
                }
            }

            $idUsuari = $postData['ID_Usuari'];
            $nom = $postData['Nom'];
            $cognoms = $postData['Cognoms'];
            $correu = $postData['Correu_electronic'];
            $telefon = $postData['Telefon'];
            $dataNaixement = $postData['Data_naixement'];
            $tipusUsuari = $postData['Tipus_usuari'];

            UsuariDAO::modUserByAdmin(
                $idUsuari,
                $nom,
                $cognoms,
                $correu,
                $telefon,
                $dataNaixement,
                $tipusUsuari
            );

            

            echo json_encode([
                'status' => 'success',
                'message' => 'Usuari actualitzat correctament'
            ]);
            
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
        exit;
    }
    

    public function modificarProducte() {
        ini_set('display_errors', 0);
        header('Content-Type: application/json');
        
        try {
            $postData = json_decode(file_get_contents('php://input'), true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception('Invalid JSON data received');
            }
            
            $requiredFields = ['ID_Producte', 'Nom', 'Descripcio', 'Preu', 'Categoria', 'Disponibilitat', 'Imatge'];
            foreach ($requiredFields as $field) {
                if (!isset($postData[$field])) {
                    throw new Exception("Missing required field: $field");
                }
            }

            $idProducte = $postData['ID_Producte'];
            $nom = $postData['Nom'];
            $descripcio = $postData['Descripcio'];
            $preu = $postData['Preu'];
            $categoria = $postData['Categoria'];
            $disponibilitat = $postData['Disponibilitat'];
            $imatge = $postData['Imatge'];

            ProducteDao::modProducte(
                $idProducte,
                $nom,
                $descripcio,
                $preu,
                $categoria,
                $disponibilitat,
                $imatge
            );



            echo json_encode([
                'status' => 'success',
                'message' => 'Producte actualitzat correctament'
            ]);
            
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
        exit;
    }
}
?>
