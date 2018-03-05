<?php 
include 'fonctions.php';
extract($_GET);//$id
$ligne=get_by_id($id);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>consultation produit</title>
</head>
<body>

Consultation du produit : 
<h3>Libellé : <?php echo $ligne['libelle'] ?> </h3>
<p>Prix : <?php echo $ligne['prix'] ?> dhs</p>
</body>
</html>