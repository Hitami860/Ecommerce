<div class="flex flex-wrap ">
    <section class="relative mx-auto">
 
        <nav class="flex justify-between border-b-2  border-black bg-white-300 text-black w-screen">
            <div class="px-5 xl:px-12 py-6 flex w-full items-center">
                <a class="text-3xl font-bold font-heading" href="index.php">
                    <img class="h-fit w-32" src="imagelog/logo1.png" alt="">

                </a>
           
                <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                    <li><a class="hover:text-orange-500" href="index.php">Accueil</a></li>
                    <li><a class="hover:text-orange-500" href="Articles.php">Nos Produits</a></li>
                    <?php if (isset($_SESSION['user'])) { ?>                        
                        <li><a href="logout.php" class="hover:text-orange-500">deconnexion</a></li>
                        <?php if ($_SESSION['user']['statut'] == 'admin') { ?>
                        <li><a class="hover:text-orange-600" href="stock.php">stock</a></li>
                        <?php } ?>
                    <?php } else { ?>

                        <li><a class="hover:text-orange-500" href="connexion.php">Connexion</a></li>
                        <li><a class="hover:text-orange-500" href="sign_in.php">inscription</a></li>
                    <?php } ?>

                    <li><a class="hover:text-orange-500" href="contact.php">Contact Us</a></li>
                </ul>






              
                <div class="hidden xl:flex items-center space-x-5 items-center">
                    
                    <a class="flex items-center hover:text-orange-500" href="panier.php">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h- w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="flex absolute -mt-5 ml-4">
                            <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-orange-500 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-orange-500">
                            </span>
                        </span>
                    </a>
                    
                    <a class="flex items-center hover:text-orange-500" href=<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>

                </div>
            </div>
       
            <a class="xl:hidden flex mr-6 items-center" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            
            </a>
            <a class="navbar-burger self-center mr-12 xl:hidden" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </a>
        </nav>

    </section>
</div>

