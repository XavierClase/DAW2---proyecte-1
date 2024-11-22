<?php
    include_once 'models/Producte.php';
    include_once 'models/ProducteDao.php';
    class carroController {

        public function index() {
            $carro = $_SESSION['carro'] ?? [];
            $quantitatProductes = count($carro);

            $total_unitats = 0.00;
            foreach ($carro as $producte) {
                $preu_per_tanda = intval($producte['preu']) * intval($producte['quantitat']);
                $total_unitats += $preu_per_tanda;
            }

            include_once 'views/carro.php';
        }

        public function anyadir() {
            $producte_id = $_POST['id'] ?? null;
            $quantitat = $_POST['quantitat'] ?? 1;

            if ($producte_id) {
                $producte = ProducteDao::getCarroInfo($producte_id);                
                if ($producte) {
                    $producto_data = [
                        'id' => $producte->getID_Producte(),
                        'nom' => $producte->getNom(),
                        'preu' => $producte->getPreu(),
                        'categoria' => $producte->getCategoria(), 
                        'imatge' => $producte->getImatge(),
                        'quantitat' => $quantitat,
                    ];

                    if (!isset($_SESSION['carro'])) {
                        $_SESSION['carro'] = [];
                    }
    
                    if (isset($_SESSION['carro'][$producte_id])) {
                        $_SESSION['carro'][$producte_id]['quantitat'] += $quantitat;
                    } else {
                        $_SESSION['carro'][$producte_id] = $producto_data;
                    }


                }
            }
            header('Location: ?controller=home&action=index');
    
        }

        public function eliminar() {
            
            $producte_id = $_GET['id'] ?? null;

            if ($producte_id && isset($_SESSION['carro'][$producte_id])) {
                unset($_SESSION['carro'][$producte_id]);
            }

            header('Location: ?controller=carro&action=index');
        }

    
        // public function clear() {
        //     unset($_SESSION['carrito']);
        //     header("Location: index.php?controller=carrito&action=index");
        // }
    
        // public function checkout() {
        //     require_once 'models/Pedido.php';
    
        //     if (!empty($_SESSION['carrito'])) {
        //         $pedido = new Pedido();
        //         $pedido->guardar($_SESSION['carrito']);
        //         unset($_SESSION['carrito']); 
        //         header("Location: index.php?controller=carrito&action=success");
        //     } else {
        //         header("Location: index.php?controller=carrito&action=index");
        //     }
        // }
    
    }