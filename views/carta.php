<main class="carta-main">

    <section class="carta-top">
        <div class="carta-migas">
            <p>Inici/productes/</p>
        </div>
        <div class="carta-descripcio">
            <h1><?=$categoria?></h1>
            <span>
                <p><?=$descripcioCategoria?></p>
            </span>
        </div>
    </section>

    <section class="carta-productes">
        <div class="productes-top">
            <div id="num-productes">
                <p><?=count($productes)?> Productes</p>
            </div>
            <div id="div-ordreProductes">
                <p>Ordenar per: </p>
                <select name="ordreProductes" id="ordreProductes" onchange="ordenarProductes()">
                    <option value="posicio" <?= $currentOrder === 'posicio' ? 'selected' : '' ?>>Posició</option>
                    <option value="menor-major" <?= $currentOrder === 'menor-major' ? 'selected' : '' ?>>Preu - Menor a Major</option>
                    <option value="major-menor" <?= $currentOrder === 'major-menor' ? 'selected' : '' ?>>Preu - Major a Menor</option>
                </select>
            </div>
        </div>
        
        <div class="row">
            <?php
                foreach ($productes as $producte) {
            ?>
                <div class="col-sm-4">
                    <div class="producte">
                            <a href="?controller=detallsProducte&action=seleccioProducte&idProducte=<?=$producte->getID_PRODUCTE()?>">
                                <div class="producte-imatge" style="background-image: url('<?=$producte->getImatge()?>');">
                                </div>
                            </a>
                            <a href="#"><h3><?=$producte->getNom()?></h3></a>
                            <p><?=$producte->getPreu()?>€</p>
                    </div> 
                </div>
            <?php } ?>
        </div>
        



        
    </section>
</main>
<script src="assets/scripts/ordenarProductes.js"></script>
