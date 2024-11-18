<main>
    <div class="detallsProducteMigas">

    </div>
    <section class="detallsProducte">
        <div class="detallsProducte-img" style="background-image: url('<?=$producte->getImatge()?>');">
        </div>
        <div class="detallsProducte-dades">
            <div class="detallsProducte-dades-titol">
                <span>
                    <h1><?=$producte->getNom()?></h1>
                    <p><?=$producte->getCategoria()?></p>
                </span>
                <p id="detallsProducte-dades-preu"><?=$producte->getPreu()?>€</p>
            </div>
            <p id="descripcioProducteDetalls"><?=$producte->getDescripcio()?></p>

            <?php if ($producte->getDisponibilitat() == 1) {?>
                <button class="button-anyadir-activat">ANYADIR AL CARRO</button>
            <?php } else { ?>
                <button class="button-anyadir-desactivat">ESGOTAT</button>
            <?php } ?>
        </div>
    </section>
</main>