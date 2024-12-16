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
                                <h3>Comanda Num <?= $comanda->getID_Pedido(); ?></h3>
                                <span>
                                    <strong id="comanda-top-preu"><?= $comanda->getTotal(); ?> €</strong>
                                    <strong>Pagament: <?= $comanda->getMetode_pagament(); ?></strong>
                                </span>
                            </div>
                            <div id="comanda-bottom">
                                <h4>Estat: <?= $comanda->getEstat(); ?></h4>
                                <p>Data Comanda: <?= $comanda->getData_Hora(); ?></p>
                                <p>Destí: <?= $comanda->getDireccio(); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>
