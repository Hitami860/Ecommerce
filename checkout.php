    <?php
    require_once('classe/panierclass.php');
    require_once('ressources/produits.php');
    session_start();



    $newArticles = new Produits();
    $newPanier = new panier();
    $articles = $_SESSION['panier'];

    
    


    try {
        /*
         * Initialize the Mollie API library with your API key.
         *
         * See: https://www.mollie.com/dashboard/developers/api-keys
         */
        require "./initialize.php";

    
        foreach ($articles as $key => $article) {


            /* var_dump($article); */
            $produit = $newPanier->getArticle($key);
            /* var_dump($produit); */
            $total += ($produit['prix'] * $article);
            $total = number_format($total,2,".","");
    




        /*
         * Determine the url parts to these example files.
         */
        $protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
        $hostname = $_SERVER['HTTP_HOST'];
        $path = dirname($_SERVER['REQUEST_URI'] ?? $_SERVER['PHP_SELF']);

        /*
         * Required Payment Link parameters:
         *   amount        Amount in EUROs. This example creates a € 10,- payment.
         *   description   Description of the payment.
         */
        $paymentLink = $mollie->paymentLinks->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "$total", // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "$produit[name]",

        ]);
    }

        /*
         * Send the customer off to complete the payment.
         * This request should always be a GET, thus we enforce 303 http response code
         */
        header("Location: " . $paymentLink->getCheckoutUrl(), true, 303);
    } catch (\Mollie\Api\Exceptions\ApiException $e) {
        echo "API call failed: " . htmlspecialchars($e->getMessage());
    }
