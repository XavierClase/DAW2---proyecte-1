<header>
    <div class="header-top">

        <a href="#" class="header-ajuda-link">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
            AJUDA
        </a>

        <div>
            <a href="#">INICIAR SESIÓ</a>
            <a href="#">CREAR UN COMPTE</a>
        </div>
    </div>
    <div class="header-bottom">
        <nav class="header-links-nav">
            <ul>
                <li><a href="#" id="header-links-nav-menjar">MENJARS</a></li>
                <li><a href="#" id="header-links-nav-begudes">BEGUDES</a></li>
                <li><a href="#" id="header-links-nav-postres">POSTRES</a></li>
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

            <a href="#">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                </svg>
                MI CESTA
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



<script src="assets/scripts/menuMapping.js"></script>