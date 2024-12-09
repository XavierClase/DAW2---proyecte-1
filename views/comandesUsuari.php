<main class="mostrar-comandes-main">
    <div id="barra-lateral-perfil" class="container mt-5">
        <div class="row">
            <div class="col-md-3" id="barraLateral-pefil">
                <ul class="list-group">
                    <li class="list-group-item active"><a href="?controller=perfil&action=index">El Meu Perfil</a></li>
                    <li class="list-group-item">Les Meves Comandes</li>
                    <li class="list-group-item"><a href="?controller=perfil&action=modificarUsuari">Informació del Compte</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <div id="comandes-container">
                    <?php foreach ($comandes as $comanda) { ?>
                        <div class="col-md-3" id="comanda-perfil">
                            <div id="comanda-top">
                                <!-- Aquí mostramos el número de la comanda con su ID -->
                                <h3>Comanda Num <?= $comanda->getID_Pedido(); ?></h3>
                                <span>
                                    <!-- Aquí mostramos el precio de la comanda -->
                                    <strong id="comanda-top-preu"><?= $comanda->getTotal(); ?> €</strong>
                                    <!-- Aquí mostramos el método de pago -->
                                    <strong>Pagament: <?= $comanda->getMetode_pagament(); ?></strong>
                                </span>
                            </div>
                            <div id="comanda-bottom">
                                <!-- Aquí mostramos el estado de la comanda -->
                                <h4>Estat: <?= $comanda->getEstat(); ?></h4>
                                <!-- Aquí mostramos la fecha de la comanda -->
                                <p>Data Comanda: <?= $comanda->getData_Hora(); ?></p>
                                <!-- Aquí mostramos la dirección -->
                                <p>Destí: <?= $comanda->getDireccio(); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>
