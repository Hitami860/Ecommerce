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

var_dump($_SESSION['panier']);


?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="CSS/style_panier.css">
  <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
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




          <div class="text-center">
            <button class="text-white bg-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example">
              <img src="icons8-panier-24.png" alt="">
            </button>
          </div>


        </div>
        <div id="drawer-example" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label">
          <h5 id="drawer-label" class="text-xl inline-flex items-center mb-4 text-base font-semibold text-black dark:text-gray-400">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />Panier
          </h5>
          <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example" class="text-black bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
          </button>

          <div class="cart-item">
            <?php foreach ($_SESSION['panier'] as $key => $article) {
              $produit = $newpanier->getArticle($key); ?>

              <a href="produit.php?id=<?php echo $produit['id'] ?>"><img class="w-[20%] h-[20%]" src="ressources/uploads/<?php echo $produit['image']; ?>" alt="photo de l'article"></a>
              <div class="details">
                <h3 class="font-semibold"><?php echo $produit['name']; ?></h3>
                <p>
                  <span class="quantity">Quantité: 1</span>
                  <span class="price"><?php echo $produit['prix'] ?>€</span>
                </p>
              </div>
              <div class="cancel"><i class="fas fa-window-close"></i></div>
            <?php } ?>
          </div>
          <p class="mb-6 text-sm text-gray-500 dark:text-gray-400">Supercharge your hiring by taking advantage of our <a href="#" class="text-blue-600 underline dark:text-blue-500 hover:no-underline">limited-time sale</a> for Flowbite Docs + Job Board. Unlimited access to over 190K top-ranked candidates and the #1 design job board.</p>
          <div class="grid grid-cols-2 gap-4">
            <a href="panier.php" class="px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-orange-500 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Voir le panier</a>
            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-[#EDAC70] rounded-lg hover:bg-gray-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Procéder au paiement<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
              </svg></a>
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

  <div class="flex flex-row gap-6 bg-[#EDAC70] pt-[3%] pb-[3%]">
    <?php foreach ($articles as $article) { ?>
      <div class="w-[15%] rounded overflow-hidden shadow-lg">
        <a href="produit.php?id=<?php echo $article['id'] ?>"><img class="w-full" src="ressources/uploads/<?php echo $article['image']; ?>" alt="photo de l'article"></a>
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2"><?php echo $article['name']; ?></div>
        </div>
        <div class="px-6 pt-4 pb-2">
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?php echo $article['prix'] ?>€</span>
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