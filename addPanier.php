<?php
session_start();
require('classe/panierclass.php');
$panier = new panier();
// $_SESSION['panier'] = array();
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}
var_dump($_SESSION['panier']);
if (isset($_GET['id'])) {
    $produits_id = $_GET['id'];
}

if (isset($_POST['qty'])) {
    $produit_qty = $_POST['qty'];
}else{
    $produit_qty = null;
}


if (isset($_SESSION['panier'][$produits_id]) && $produit_qty == null) {
    $_SESSION['panier'][$produits_id]++;
} elseif ($produit_qty) {
    $_SESSION['panier'][$produits_id] += $produit_qty;
} else {
    $_SESSION['panier'][$produits_id] = 1;
    echo "le produit a bien été ajouté au panier";
}

foreach ($_SESSION["panier"] as $id => $quantity) {
    $panier->setProduitsid($id);
    $panier->setRowguid($_SESSION["rowguid"]);
    $panier->setTotal($quantity);
    $panier->addPanier();
}


header("Location: articles.php");
