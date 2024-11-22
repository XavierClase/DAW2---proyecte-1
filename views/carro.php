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
                                    <p>Quantitat: <?=htmlspecialchars($producte['quantitat'])?></p>
                                    <p id="preu-producte-carro"><?=htmlspecialchars($producte['preu'])?> €</p>
                                </span>
                            </div>
                            <span class="carro-producte-span">
                                <a href="#"> 
                                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.5,10.2071068 L8,14.7071068 L8,16 L9.29289322,16 L13.7928932,11.5 L12.5,10.2071068 Z M13.2071068,9.5 L14.5,10.7928932 L15.7928932,9.5 L14.5,8.20710678 L13.2071068,9.5 Z M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M12,21 C16.9705627,21 21,16.9705627 21,12 C21,7.02943725 16.9705627,3 12,3 C7.02943725,3 3,7.02943725 3,12 C3,16.9705627 7.02943725,21 12,21 Z M14.8535534,7.14644661 L16.8535534,9.14644661 C17.0488155,9.34170876 17.0488155,9.65829124 16.8535534,9.85355339 L9.85355339,16.8535534 C9.7597852,16.9473216 9.63260824,17 9.5,17 L7.5,17 C7.22385763,17 7,16.7761424 7,16.5 L7,14.5 C7,14.3673918 7.05267842,14.2402148 7.14644661,14.1464466 L14.1464466,7.14644661 C14.3417088,6.95118446 14.6582912,6.95118446 14.8535534,7.14644661 Z"/>
                                    </svg>
                                    EDITAR
                                </a>
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

                <form action="">
                    <input type="text" name="codiPromocional" id="codiPromocionaltext" placeholder="Introduïr el codi promocional">
                    <button type="submit">Aplicar</button>
                </form>
                
                <span>
                    <p>Subtotal</p>
                    <p><?=$total_unitats?> €</p>
                </span>
                <span id="carro-span-totalComanda">
                    <strong>Total de comanda</strong>
                    <p>12 €</p>
                </span>
                <button id="tramitar-comanda-button">TRAMITAR COMANDA</button>
            </div>
        </section>
    </section>
</main>