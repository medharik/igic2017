<?php include 'fonctions.php';
$data=get_all();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>liste des produits</title>
</head>
<body>
	<div>
		<a href="new.php">Nouveau</a>
	</div>
<table  border="1" align="center" width="80%" >
	<tr>
		<td>id</td>
		<td>libellé</td>
		<td>prix</td>
		<td>Actions</td>
	</tr>

	 <?php foreach ($data as $ligne): ?>
	 	<tr>
		<td><?php echo $ligne['id'] ?></td>
		<td><?php echo $ligne['libelle'] ?></td>
		<td><?php echo $ligne['prix'] ?></td>
		<td>
<a href="delete.php?id=<?php echo $ligne['id'] ?>">Supprimer</a>
<a href="show.php?id=<?php echo $ligne['id'] ?>">Consulter</a>

		</td>
		</tr>
	
	 <?php endforeach ?>
</table>
</body>
</html>