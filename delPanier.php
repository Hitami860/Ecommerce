<?php
session_start();
require('classe/panierclass.php');

$newpanier = new panier();
$del = $_GET['id'];
unset($_SESSION["panier"][$del]);

$newpanier->deletePanier($del);




header("Location: panier.php");