<main class="checkout-main">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-4">ENVIAMENT</h1>
                <form id="checkout-form" action="?controller=checkout&action=checkout" method="POST">
                    <div class="row mb-3">
                        <label class="form-label">Adreça d'enviament</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Nom *" name="nom" value="<?=$nomUsuari?>" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Cognoms *" name="cognoms" value="<?=$cognomsUsuari?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Correu Elèctronic *" name="correu" value="<?=$correuUsuari?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Adreça completa *" name="adreca" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <select class="form-select" name="provincia" required>
                                <option value="">Selecciona una província *</option>
                                <option>Catalunya</option>
                                <option>Madrid</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Codi postal *" name="codiPostal" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Ciutat *" name="ciutat" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control" placeholder="Telèfon *" name="telefon" value="<?=$telefonUsuari?>" required>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" name="pagament" value="efectiu" class="btn btn-primary btn-lg">Pagar en persona</button>
                        <button type="button" id="pay-online-button"  value="online" class="btn btn-primary btn-lg">Pagar ja</button>
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

<div id="payment-modal" class="modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <h3>Informació de la Targeta</h3>
        <form id="payment-form">
            <div class="mb-3">
                <label for="card-number" class="form-label">Número de la targeta</label>
                <input type="text" id="card-number" class="form-control" maxlength="16" placeholder="1234 5678 9012 3456" required>
            </div>
            <div class="mb-3">
                <label for="expiry-date" class="form-label">Data de caducitat</label>
                <input type="text" id="expiry-date" class="form-control" maxlength="5" placeholder="MM/YY" required>
            </div>
            <div class="mb-3">
                <label for="cvv" class="form-label">CVV</label>
                <input type="text" id="cvv" class="form-control" maxlength="3" placeholder="123" required>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" id="cancel-payment" class="btn btn-secondary me-2">Cancel·lar</button>
                <button type="button" id="confirm-payment" class="btn btn-primary">Confirmar Pagament</button>
            </div>
        </form>
    </div>
</div>


<script src="assets/scripts/pagamentTarja.js"></script>
