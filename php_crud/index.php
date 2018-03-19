<style type="text/css">
	
#igic_wrapper{
	
	margin:auto;
}
</style>
<?php include 'fonctions.php';
$data=get_all();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>liste des produits</title>
	<link rel="stylesheet" type="text/css" href="css/data.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/data.js"></script>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>



<div class="container">
	<div>
		<a href="new.php">Nouveau</a>
	</div>
	<table class="anas  table table-striped table-condensed" id="igic" border="1" align="center"  >
<thead>
	<tr>
		<td>#</td>
		<td>photo</td>
		<td>libellé</td>
		<td>prix</td>
		<td>Actions</td>
	</tr>
</thead>
<tbody>	
	 <?php foreach ($data as $ligne): ?>
	 	<tr>
		<td><?php echo $ligne['id'] ?></td>
			<td><img src="<?php echo $ligne['photo'] ?>" alt="" width='100'></td>
		<td><?php echo $ligne['libelle'] ?></td>
		<td><?php echo $ligne['prix'] ?></td>
		<td>
<a href="delete.php?id=<?php echo $ligne['id'] ?>" class="btn btn-danger">Supprimer</a>
<a href="show.php?id=<?php echo $ligne['id'] ?>" class="btn btn-primary">Consulter</a>
<a href="edit.php?id=<?php echo $ligne['id'] ?>" class="btn btn-warning">Modifier</a>

		</td>
		</tr>
	
	 <?php endforeach ?>
	</tbody>
</table>
</div>


<script type="text/javascript">
	$(document).ready( function () {
    $('#igic').DataTable({

    	"language":{
    "sProcessing":     "Traitement en cours...",
    "sSearch":         "Rechercher&nbsp;:",
    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
    "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
    "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
    "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
    "sInfoPostFix":    "",
    "sLoadingRecords": "Chargement en cours...",
    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
    "oPaginate": {
        "sFirst":      "Premier",
        "sPrevious":   "Pr&eacute;c&eacute;dent",
        "sNext":       "Suivant",
        "sLast":       "Dernier"
    },
    "oAria": {
        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
    }
}
    });
} );
</script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>
</body>
</html>