<main class="checkout-main">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-4">ENVIAMENT</h1>
                <form action="?controller=checkout&action=checkout" method="POST">
                    <div class="row mb-3">
                        <label class="form-label">Adreça d'enviament</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Nom *" name="nom" value="<?=$nomUsuari?>" required>
                            <div class="text-danger small mt-1 d-none">Camp obligatori.</div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Cognoms *" name="cognoms" value="<?=$cognomsUsuari?>" required>
                            <div class="text-danger small mt-1 d-none">Camp obligatori.</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Correu Elèctronic *" name="correu" value="<?=$correuUsuari?>" required>
                        <div class="text-danger small mt-1 d-none">Camp obligatori.</div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Adreça completa *" name="adreca" required>
                        <div class="text-danger small mt-1 d-none">Camp obligatori.</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <select class="form-select" name="provincia" required>
                                <option value="">Selecciona una província *</option>
                                <option>Catalunya</option>
                                <option>Madrid</option>
                            </select>
                            <div class="text-danger small mt-1 d-none">Camp obligatori.</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Codi postal *" name="codiPostal" required>
                            <div class="text-danger small mt-1 d-none">Camp obligatori.</div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Ciutat *" name="ciutat" required>
                            <div class="text-danger small mt-1 d-none">Camp obligatori.</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control" placeholder="Telèfon *" name="telefon" value="<?=$telefonUsuari?>" required>
                        <div class="text-danger small mt-1 d-none">Camp obligatori.</div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">Pagar en persona</button>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <?php if (isset($_SESSION['carro'])) { ?>
                    <div class="carro-header-productes">
                        <?php foreach ($_SESSION['carro'] as $producte) { ?>
                            <div class="carro-header-producte">
                                <img src="<?=$producte['imatge']?>" alt="">
                                <div class="carro-header-producte-dades">
                                    <div>
                                        <h3><?=$producte['nom']?></h3>
                                        <p><?=$producte['preu']?>€</p>
                                    </div>
                                    <p>Quantitat: <?=$producte['quantitat']?></p>
                                </div>
                            </div>  
                        <?php } ?>
                        <div class="carro-header-bottom">
                            <div class="carro-header-subtotal">
                                <p>SUBTOTAL:</p>
                                <P><?=$_SESSION['carro_total']?> €</P>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <h3>No hi ha productes al teu carro</h3>
                <?php }?>
            </div>
        </div>
    </div>
</main>