<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="views\styles\css\home.css">
</head>
<body>
    <main>
        <section class="carrusel-container">
            
        </section>

        <section class="home-section1">
            <div>
                <a href="" class="home-section-links">
                    <h3>MENJARS PREPARATS</h3>
                    <button class="home-buttons">COMPRAR JA</button>
                </a>
            </div>
            <div>
                <a href="" class="home-section-links">
                    <h3>BEGUDES</h3>
                    <button class="home-buttons">COMPRAR JA</button>
                </a>
            </div>
            <div>
                <a href="" class="home-section-links">
                    <h3>POSTRES</h3>
                    <button class="home-buttons">COMPRAR JA</button>
                </a>
            </div>
        </section>

        <section class="home-section2">
            <div>
                <a href="" class="home-section-links">
                    <h3>MENJARS DESHIDRATATS</h3>
                    <button class="home-buttons">COMPRAR JA</button>
                </a>
            </div>
            <div>
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
</body>
</html>