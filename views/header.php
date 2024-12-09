<header>
    <div class="header-top">

        <a href="#" class="header-ajuda-link">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
            AJUDA
        </a>

        <?php
            if (!isset($_SESSION['usuari'])) {?>
                <div>
                    <a href="?controller=autenticacio&action=login">INICIAR SESIÓ</a>
                    <a href="?controller=autenticacio&action=registre">CREAR UN COMPTE</a>
                </div>
            <?php } else { ?>
                <div class="menu-loged">
                    <input type="checkbox" id="toggle" class="menu-toggle">
                    <label for="toggle" class="menu-button"><?=$_SESSION['usuari']->getNom() . ' ' . $_SESSION['usuari']->getCognoms()?> V</label>
                    <div class="header-loged-links">
                        <a href="?controller=perfil&action=index">MI CUENTA</a>
                        <a href="#">LES MEVES COMANDES</a>
                        <a href="?controller=sessio&action=tancarSessio">CERRAR SESIÓN</a>
                    </div>
                </div>

        <?php }?>
        
    </div>
    <div class="header-bottom">
        <nav class="header-links-nav">
            <ul>
                <li><a href="?controller=carta&action=categoria&categoria=MENJARS" id="header-links-nav-menjar">MENJARS</a></li>
                <li><a href="?controller=carta&action=categoria&categoria=BEGUDES" id="header-links-nav-begudes">BEGUDES</a></li>
                <li><a href="?controller=carta&action=categoria&categoria=POSTRES" id="header-links-nav-postres">POSTRES</a></li>
                <li><a href="#">QUI SOM?</a></li>
            </ul>
        </nav>

        <a href="index.php" class="logo">
            <img src="assets/imatges/Logo claro.png" alt="">
        </a>

        <div class="header-right-icons">
            <a href="#">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                </svg>
                BUSCAR
            </a>  

            <a href="?controller=carro&action=slide" class="header-carro-link">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                </svg>
                CARRO
            </a>
        </div>
    </div>
    
</header>

<section class="links-hover">
    <nav>
        <ul>
            <h3>MENJARS</h3>
            <li><a href="?controller=carta&action=categoria&categoria=MENJARS%20PREPARATS">Menjars Preparats</a></li>
            <li><a href="?controller=carta&action=categoria&categoria=MENJARS%20DESHIDRATATS">Menjars Deshidratats</a></li>
            <li><a href="?controller=carta&action=categoria&categoria=APERITIUS%20MUNTANYA">Aperitius de Muntanya</a></li>
        </ul>
    </nav>    
</section>
<section class="links-hover">
    <nav>
        <ul>
            <h3>BEGUDES</h3>
            <li><a href="?controller=carta&action=categoria&categoria=VINS">Vins</a></li>
            <li><a href="?controller=carta&action=categoria&categoria=CERVESES">Cerveses</a></li>
            <li><a href="?controller=carta&action=categoria&categoria=REFRESCOS">Refrescos</a></li>
        </ul>
    </nav>    
</section>
<section class="links-hover">
    <nav>
        <ul>
            <h3>POSTRES</h3>
            <li><a href="?controller=carta&action=categoria&categoria=POSTRES%20CLASICS">Postres clasics</a></li>
            <li><a href="?controller=carta&action=categoria&categoria=POSTRES%20RURALS">Postres Rurals</a></li>
        </ul>
    </nav>    
</section>

<section class="carro-header">
    <div class="carro-header-top">
        <h2>El teu carro</h2>
        <button class="tanca-carro-header">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M19 5L4.99998 19M5.00001 5L19 19" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
        </button>
    </div>

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
        </div>
        <div class="carro-header-bottom">
            <div class="carro-header-subtotal">
                <p>SUBTOTAL:</p>
                <P><?=$_SESSION['carro_total']?> €</P>
            </div>
            <div class="carro-header-buttons">
                <a href="?controller=checkout&action=index">
                    <button id="carro-header-tramitar">TRAMITAR COMANDA</button>
                </a>

                <a href="?controller=carro&action=index">
                    <button id="carro-header-carro-link">EL TEU CARRO</button>
                </a>
            </div>
        </div>
    <?php } else{ ?>
        <h3>No hi ha productes al teu carro</h3>
    <?php }?>
</section>

<script src="assets/scripts/menuMapping.js"></script>

