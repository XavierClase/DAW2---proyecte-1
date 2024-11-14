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
                <select name="ordreProductes" id="ordreProductes">
                    <option value="posicio" selected="selected">Posició</option>
                    <option value="menor-major">Preu - Menor a Major</option>
                    <option value="major-menor">Preu - Major a Menor</option>
                </select>
            </div>
        </div>
        
        <div class="row">
            <?php
                foreach ($productes as $prodcute) {
            ?>
                <div class="col-sm-4">
                    <div class="producte">
                            <a href="#">
                                <div class="producte-imatge" style="background-image: url('<?=$prodcute->getImatge()?>');">
                                </div>
                            </a>
                            <a href="#"><h3><?=$prodcute->getNom()?></h3></a>
                            <p><?=$prodcute->getPreu()?>€</p>
                    </div> 
                </div>
            <?php } ?>
        </div>
        



        
    </section>
</main>