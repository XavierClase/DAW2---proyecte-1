<?php
include_once('config/database.php');
include_once('models/Comanda.php');
include_once('models/Producte.php');
include_once('models/ProducteDao.php');

class ComandaDao {
    
    public static function pujarComanda($comanda, $carro) {
        $con = DataBase::connect();
        
        $con->begin_transaction();

        try {
            $stmt = $con->prepare("INSERT INTO Pedido (ID_Usuari, Data_Hora, Estat, Metode_pagament, Total, direccio, Nom_client, Telefon_client, Correu_client) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $ID_Usuari = (int)$comanda->getID_Usuari();
            $Data_Hora = (string)$comanda->getData_Hora(); 
            $Estat = (string)$comanda->getEstat();
            $Metode_pagament = (string)$comanda->getMetode_pagament();
            $Total = (float)$comanda->getTotal();
            $direccio = (string)$comanda->getDireccio();
            $Nom_client = (string)$comanda->getNom_client();
            $Telefon_client = (string)$comanda->getTelefon_client();
            $Correu_client = (string)$comanda->getCorreu_client();

            

            $stmt->bind_param("isssdssss", $ID_Usuari, $Data_Hora, $Estat, $Metode_pagament, $Total, $direccio, $Nom_client, $Telefon_client, $Correu_client);

            if (!$stmt->execute()) {
                throw new Exception("Error al insertar el pedido: " . $stmt->error);
            }

            $ID_Pedido = $stmt->insert_id;
            $stmt->close();

            foreach ($carro as $producte) {
                $stmt = $con->prepare("INSERT INTO Detalls_Pedido (ID_Pedido, ID_Producte, Quantitat, Preu, Descompte_aplicat) VALUES (?, ?, ?, ?, ?)");

                $ID_ProducteCarro = (int)$producte['id'];
                $Quantitat = (int)$producte['quantitat'];
                $Preu = (float)$producte['preu'];
                $Descompte_aplicat = 0; 


                $stmt->bind_param("iiidi", $ID_Pedido, $ID_ProducteCarro, $Quantitat, $Preu, $Descompte_aplicat);

                if (!$stmt->execute()) {
                    throw new Exception("Error al insertar detalle de pedido: " . $stmt->error);
                }

                $stmt->close();
            }

            $con->commit();

        } catch (Exception $e) {
            $con->rollback();
            die("Error al procesar el pedido: " . $e->getMessage());
        } finally {
            $con->close();
        }
    }

    // public static function getProductesComanda($ID_Pedido) {
    //     $con = DataBase::connect();
    //     $stmt = $con->prepare("SELECT * FROM Detalls_Pedido WHERE ID_Pedido = ?");
    //     $stmt->bind_param("i", $ID_Pedido);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     $productes = array();

    //     while ($row = $result->fetch_assoc()) {
    //         $productes[] = new Producte($row['ID_Producte'], $row['Nom'], $row['Descripcio'], $row['Preu'], $row['Stock'], $row['Imatge'], $row['ID_Categoria'], $row['Descompte']);
    //     }
    //     $stmt->close();
    //     $con->close();
    //     return $productes;
    // }

    public static function getComandes($ID_Usuari) {
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT ID_Pedido, ID_Usuari, Data_Hora, Estat, Metode_pagament, Total, direccio FROM Pedido WHERE ID_Usuari = ?");
        $stmt->bind_param("i", $ID_Usuari);
        $stmt->execute();
        $result = $stmt->get_result();
        $comandes = [];

        while ($row = $result->fetch_assoc()) {
            $comanda = new Comanda(
                $row['ID_Pedido'], 
                $row['ID_Usuari'], 
                $row['Data_Hora'], 
                $row['Estat'], 
                $row['Metode_pagament'], 
                $row['Total'], 
                $row['direccio']
            );
            $comandes[] = $comanda;
        }

        $stmt->close();
        $con->close();
        return $comandes;
    }

}
