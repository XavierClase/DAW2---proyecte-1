<?php
    include_once 'models/Producte.php';
    include_once 'models/ProducteDao.php';
    include_once 'models/PromocioDao.php';
    class carroController {

        public function index() {
            $carro = $_SESSION['carro'] ?? [];
            $quantitatProductes = count($carro);

            $total_unitats = 0.00;
            foreach ($carro as $producte) {
                $preu_per_tanda = intval($producte['preu']) * intval($producte['quantitat']);
                $total_unitats += $preu_per_tanda;
            }

            
            $vista = 'views/carro.php';
            include_once 'views/main.php';
        }

        public function slide() {
            $carro = $_SESSION['carro'] ?? [];
            $quantitatProductes = count($carro);

            $total_unitats = $_SESSION['carro_total'];


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
                        $_SESSION['carro_total'] = 0; 
                    }
        
                    if (isset($_SESSION['carro'][$producte_id])) {
                        $quantitat_antiga = $_SESSION['carro'][$producte_id]['quantitat'];
                        $_SESSION['carro'][$producte_id]['quantitat'] += $quantitat;
        
                        $_SESSION['carro_total'] -= $producte->getPreu() * $quantitat_antiga;
                        $_SESSION['carro_total'] += $producte->getPreu() * $_SESSION['carro'][$producte_id]['quantitat'];
                    } else {
                        $_SESSION['carro'][$producte_id] = $producto_data;
                        $_SESSION['carro_total'] += $producte->getPreu() * $quantitat;
                    }
                }
            }
        
            header('Location: ?controller=home&action=index');
        }
        

        public function eliminar() {
            $producte_id = $_GET['id'] ?? null;
        
            if ($producte_id && isset($_SESSION['carro'][$producte_id])) {
                $preu_producte = $_SESSION['carro'][$producte_id]['preu'];
                $quantitat_producte = $_SESSION['carro'][$producte_id]['quantitat'];
        
                $_SESSION['carro_total'] -= $preu_producte * $quantitat_producte;
        
                unset($_SESSION['carro'][$producte_id]);
            }
        
            header('Location: ?controller=carro&action=index');
        }
        

        public function sumarQuantitat() {
            $producte_id = $_GET['id'] ?? null;
        
            if ($producte_id && isset($_SESSION['carro'][$producte_id])) {
                $preu_producte = $_SESSION['carro'][$producte_id]['preu'];
                $quantitat_antiga = $_SESSION['carro'][$producte_id]['quantitat'];
        
                $_SESSION['carro'][$producte_id]['quantitat']++;
        
                $_SESSION['carro_total'] -= $preu_producte * $quantitat_antiga; 
                $_SESSION['carro_total'] += $preu_producte * $_SESSION['carro'][$producte_id]['quantitat']; 
            }
        
            header('Location: ?controller=carro&action=index');
        }
        

        public function restarQuantitat() {
            $producte_id = $_GET['id'] ?? null;
        
            if ($producte_id && isset($_SESSION['carro'][$producte_id])) {
                $preu_producte = $_SESSION['carro'][$producte_id]['preu'];
                $quantitat_antiga = $_SESSION['carro'][$producte_id]['quantitat'];
        
                if ($quantitat_antiga > 1) {
                    $_SESSION['carro'][$producte_id]['quantitat']--;
                }
        
                $_SESSION['carro_total'] -= $preu_producte * $quantitat_antiga; 
                $_SESSION['carro_total'] += $preu_producte * $_SESSION['carro'][$producte_id]['quantitat']; 
            }
        
            header('Location: ?controller=carro&action=index');
        }
        
        public function promocio() {
            $codiComprovar = $_POST['codiPromocional'] ?? null;
        
            if ($codiComprovar) {
                $promocio = PromocioDao::comprovarPromocio($codiComprovar);
                
                if ($promocio) {
                    $descompte = $promocio->Descompte; 
        
                    $_SESSION['carro_total'] -= ($_SESSION['carro_total'] * ($descompte / 100));
                    
                    $_SESSION['promocio_aplicada'] = "Codi promocional aplicat! Descompte del $descompte% aplicat al total.";
                } else {
                    $_SESSION['error_promocio'] = "Codi promocional no vàlid.";
                }
            }
        
            header(header: 'Location: ?controller=carro&action=index');
        }
        
    
    }