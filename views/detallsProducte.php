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
                <form action="?controller=carro&action=anyadir" method="post">
                    <input type="number" name="quantitat" id="quantitat" value="1">
                    <input type="hidden" name="id"  value="<?=$producte->getID_Producte()?>">
                    <button class="button-anyadir-activat">ANYADIR AL CARRO</button>
                </form>
            <?php } else { ?>
                <button class="button-anyadir-desactivat">ESGOTAT</button>
            <?php } ?>
        </div>
    </section>
</main>