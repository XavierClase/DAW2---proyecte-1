<main class="carro-main">
    <div class="carro-migas">

    </div>
    <section class="carro">
        <span class="carro-span-titol">
            <h1>El Teu Carro</h1>
            <p>(<?=$quantitatProductes?> producte/s)</p>
        </span>
        <section class="carro-dades">
            <div class="carro-productes">
                <?php 
                foreach ($carro as $producte) { ?>
                    <div class="carro-producte">
                        <div class="carro-producte-foto" style="background-image: url('<?=$producte["imatge"]?>');"></div>
                        <div class="carro-producte-info">
                            <div>
                                <h2><?=htmlspecialchars($producte['nom'])?></h2>
                                <span>
                                    <p id="tipus-producte-carro">Tipus: <span id="span-tipusProducte-bold"><?=htmlspecialchars($producte['categoria'])?></span></p>
                                    <span id="quantitat-span">
                                        <p>Quantitat: </p>
                                        <a href="?controller=carro&action=restarQuantitat&id=<?php echo $producte['id']; ?>">-</a>
                                        <p><?=htmlspecialchars($producte['quantitat'])?></p>
                                        <a href="?controller=carro&action=sumarQuantitat&id=<?php echo $producte['id']; ?>">+</a>
                                    </span>
                                    
                                    <p id="preu-producte-carro"><?=htmlspecialchars($producte['preu'])?> €</p>
                                </span>
                            </div>
                            <span class="carro-producte-span">
                                <a href="?controller=carro&action=eliminar&id=<?=$producte['id']?>">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    ELIMINAR
                                </a>
                            </span>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div class="carro-resum-comanda">
                <strong id="resum-comanda-titol">Resum de la comanda</strong>
                <span id="codi-promocional-p">
                    <p>CODI PROMOCIONAL</p>
                </span>

                <form action="?controller=carro&action=promocio" method="POST">
                    <input type="text" name="codiPromocional" id="codiPromocionaltext" placeholder="Introduïr el codi promocional">
                    <button type="submit">Aplicar</button>
                </form>
                
                <span>
                    <p>Subtotal</p>
                    <p><?=$total_unitats?> €</p>
                </span>
                <span id="carro-span-totalComanda">
                    <strong>Preu Final:</strong>
                    <p><?=$_SESSION['carro_total']?> €</p>
                </span>
                <a href="?controller=checkout&action=index">
                    <button id="tramitar-comanda-button">TRAMITAR COMANDA</button>
                </a>
            </div>
        </section>
    </section>
</main>