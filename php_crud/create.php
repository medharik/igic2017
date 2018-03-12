<?php 
include 'fonctions.php';
//extraire les infos du form
extract($_POST);//$libelle,$prix
$chemin=charger($_FILES['photo']);
ajouter_produit($libelle, $prix, $qtestock, $chemin);
header('location:index.php');






 ?>