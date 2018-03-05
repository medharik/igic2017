<?php 
include 'fonctions.php';
//extraire les infos du form
extract($_POST);//$libelle,$prix
ajouter_produit($libelle, $prix);
//redirection vers index.php
header("location:index.php");


 ?>