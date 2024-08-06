<?php
require_once('config/db.php');
require_once('ressources/produits.php');
require_once('classe/panierclass.php');
session_start();

$db = new db();
$db->connecte();
$newArticles = new Produits();
$articles = $newArticles->getAllProduits();
$newpanier = new panier();



?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="CSS/style_panier.css">
  <title>Articles</title>
</head>

<body>
<div class="flex flex-wrap ">
    <section class="relative mx-auto">
 
        <nav class="flex justify-between border-b-2  border-black bg-white-300 text-black w-screen">
            <div class="px-5 xl:px-12 py-6 flex w-full items-center">
                <a class="text-3xl font-bold font-heading" href="panier.php">
                    <img class="h-16" src="imagelog/logo1.png" alt="">

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

                    <li><a class="hover:text-orange-500" href="#">Contact Us</a></li>
                </ul>






              <div class="border border-black border-2 ">
                <div class="hidden xl:flex items-center space-x-5 items-center">
                    
                    <a class="flex items-center hover:text-orange-500" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h- w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="flex absolute -mt-5 ml-4">
                            <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-orange-500 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-orange-500">
                            </span>
                        </span>
                    </a>
                    <div class="flex flex-col gap-1">
                    <h2 class="text-xl font-semibold">Mon Panier</h2>
                    <?php if(isset($_POST['panier'])) { ?>
                    <?php foreach ($articles as $article) { ?>
                      <?php echo $article['id'] ?><img class="h-[7%] w-[7%]" src="ressources/uploads/<?php echo $article['image']; ?>" alt="photo de l'article">
                      <?php }} ?>

                    <h3>Total: 0 €</h3>
                    <a href=""><h3 class="border border-black bg-orange-400 text-center font-semibold">Paiement</h3></a>
                    <a href=""><h3 class="border border-black bg-orange-400 text-center font-semibold">Voir le panier</h3></a>
                    </div>
                    </div>
                    
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

  <a class="border border-2 border-black bg-[#EDAC70]" href="panier.php">Panier</a>

  <div class="flex flex-row gap-6 bg-[#EDAC70] pt-[3%] pb-[3%]">
    <?php foreach ($articles as $article) { ?>
      <div class="w-[15%] rounded overflow-hidden shadow-lg">
        <a href="produit.php?id=<?php echo $article['id'] ?>"><img class="w-full" src="ressources/uploads/<?php echo $article['image']; ?>" alt="photo de l'article"></a>
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2"><?php echo $article['name']; ?></div>
        </div>
        <div class="px-6 pt-4 pb-2">
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?php echo $article['prix'] ?>€</span>
          <a href="addPanier.php?id=<?php echo $article['id'] ?>">
            <button name="panier" method="post"><span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Ajouter au Panier</span></button>
          </a>
        </div>
      </div>
    <?php } ?>
  </div>
<footer>
<?php include('compo/footer.php'); ?>

</footer>

<script src="script_panier.js"></script>
</body>
f
</html>