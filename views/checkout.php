<main class="checkout-main">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-4">ENVIAMENT</h1>
                <form action="?controller=checkout&action=checkout" method="POST">
                    <div class="row mb-3">
                        <label class="form-label">Adreça d'enviament</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Nom *" name="nom" required>
                            <div class="text-danger small mt-1 d-none">Camp obligatori.</div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Cognoms *" name="cognoms" required>
                            <div class="text-danger small mt-1 d-none">Camp obligatori.</div>
                        </div>
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
                        <input type="tel" class="form-control" placeholder="Telèfon *" name="telefon" required>
                        <div class="text-danger small mt-1 d-none">Camp obligatori.</div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">Pagar en persona</button>
                    </div>
                </form>
            </div>

            <div class="col-md-6">

            </div>
        </div>
    </div>
</main>