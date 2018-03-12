<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>nouveau produit</title>
</head>
<body>
	
<form action="create.php" method="post" enctype="multipart/form-data">
<table align="center">
		<tr>
<td>Libellé : </td>
<td><input type="text" name="libelle" required=""></td>
		</tr>
		<tr>
			<td>Prix :</td>
			<td><input type="number" name="prix"></td>
		</tr>
			<tr>
			<td>qauantité en stock :</td>
			<td><input type="number" name="qtestock"></td>
		</tr>
			<tr>
			<td>Photo : </td>
			<td><input type="file" name="photo"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Ajouter"></td>
		</tr>
	</table>	

</form>

</body>
</html>