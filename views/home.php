<main>
    <section class="carrusel-container">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="assets/imatges/altres/banner1.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="home-section1">
        <div id="home-section1-menjarsPreparats">
            <a href="" class="home-section-links">
                <h3>MENJARS PREPARATS</h3>
                <button class="home-buttons">COMPRAR JA</button>
            </a>
        </div>
        <div id="home-section1-begudes">
            <a href="" class="home-section-links">
                <h3>BEGUDES</h3>
                <button class="home-buttons">COMPRAR JA</button>
            </a>
        </div>
        <div id="home-section1-postres">
            <a href="" class="home-section-links">
                <h3>POSTRES</h3>
                <button class="home-buttons">COMPRAR JA</button>
            </a>
        </div>
    </section>

    <section class="home-section2">
        <div id="home-section1-menjarsDeshidratats">
            <a href="" class="home-section-links">
                <h3>MENJARS DESHIDRATATS</h3>
                <button class="home-buttons">COMPRAR JA</button>
            </a>
        </div>
        <div id="home-section1-cerveses">
            <a href="" class="home-section-links">
                <h3>CERVESES</h3>
                <button class="home-buttons">COMPRAR JA</button>
            </a>
        </div>
    </section>

    <section class="home-section3-novetats">
        <h2>NOVETATS</h2>
        <div class="novetats-div">
            <?php
                foreach ($productes as $prodcute) {
            ?>
                <div class="novetat">
                        <a href="#">
                            <div class="novetat-imatge" style="background-image: url('<?=$prodcute->getImatge()?>');">
                            </div>
                        </a>
                        <a href="#"><h3><?=$prodcute->getNom()?></h3></a>
                        <p><?=$prodcute->getPreu()?>€</p>
                    </div> 
            <?php } ?>          
        </div>
    
    </section>

</main>