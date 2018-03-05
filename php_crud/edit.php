<?php 
include 'fonctions.php';
extract($_GET);//$id
$ligne=get_by_id($id);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edition produit</title>
</head>
<body>
	
<form action="update.php" method="post">
<table align="center">
		<tr>
<td>Libellé : </td>
<td><input type="text" name="libelle" required="" value="<?php echo  $ligne['libelle']; ?>"></td>
		</tr>
		<tr>
			<td>Prix :</td>
			<td><input type="number" name="prix" value="<?php echo  $ligne['prix']; ?>"></td>
			<input type="hidden" name="id" value="<?php echo  $ligne['id']; ?>">
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Modifier"></td>
		</tr>
	</table>	

</form>

</body>
</html>