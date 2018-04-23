<?php 
include 'modele.php';
$table="categorie";
$btn="ajouter";
extract($_POST);//extraire  les infos dans des variables recus depuis un form
extract($_GET);////extraire  les infos dans des variables recus depuis un form
//echo $nom;//ou echo $_POST['nom']

//si ajout 
/*var_dump($_POST);
var_dump($_FILES);
*/
if (isset($nom)  && isset($_FILES['photo']) && !isset($id)  ) {  
$chemin= charger($_FILES['photo']);
$data=$_POST;
$data['photo']=$chemin;
ajouter($table, $data);
//header("location:categorie.php?m=addok");

}
// si suppression
if (isset($ids)) {
  
supprimer($ids, $table);
header("location:categorie.php?m=delok");

}
//si consultation
if (isset($idc)) {
$categorie_a_consulter=get_by_id($idc,$table);
  
}
//si edition 
if (isset($idm)) {
$categorie_a_modifier=get_by_id($idm,$table);
$btn="modifier";
  
}
//si modif

if (isset($nom) && isset($id)  ) {
$chemin="";
//var_dump($_FILES['photo']['name']);
if(isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name'])){
$chemin= charger($_FILES['photo']);
}
$data=$_POST;
$data['photo']=$chemin;

modifier($table, $id, $data);

//header("location:categorie.php?m=updok");
}

$categories=get_all("categorie");

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Edition des categories</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body >
  

  <div class="container">
    
<?php if (isset($m) && $m=='addok'): ?>
  
<div class="alert alert-success" role="alert">
        <strong>Bien fait! </strong>Ajout effectué avec succès
      </div>
    <?php endif ?>

    
<?php if (isset($m) && $m=='delok'): ?>
  
<div class="alert alert-danger" role="alert">
        <strong>Bien fait! </strong>Suppression effectuée avec succès
      </div>
    <?php endif ?>

    <?php if (isset($m) && $m=='updok'): ?>
  
<div class="alert alert-danger" role="alert">
        <strong>Bien fait! </strong>Modification effectuée avec succès
      </div>
    <?php endif ?>

    <form class="form-horizontal" method="post" action="categorie.php" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Nouvelle categorie : </legend>
<?php if (isset($idm)): ?>
  <input type="hidden" name="id" value="<?php echo $idm;  ?>">

<?php endif ?>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nom">Libellé : </label>  
  <div class="col-md-4">
  <input id="nom" name="nom" type="text" value="<?php if(isset($categorie_a_modifier))  echo $categorie_a_modifier['nom']?>" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>



<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="photo">Photo : </label>
  <div class="col-md-4">
    <input id="photo" name="photo" class="input-file" type="file">
  </div>
</div>



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary"><?php echo $btn; ?></button>
  </div>
</div>

</fieldset>
</form>

<table class="table table-striped">
            <thead>
              <tr>
                <th>Ref</th>
                <th>nom</th>
               
                <th>Photo</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

<?php foreach ($categories as $ligne): ?>
   <tr>
                <td><?php echo $ligne['id']; ?></td>
                <td><?php echo $ligne['nom']; ?></td>
               
                <td><img src="<?php echo $ligne['photo']; ?>" alt="" width="100"></td>
                <td><a onclick="return confirm('voulez vous vraiment supprimer cet élément')" href="categorie.php?ids=<?php echo $ligne['id']; ?>" class="btn  btn-danger">Supprimer</a>

<a  href="categorie.php?idc=<?php echo $ligne['id']; ?>" class="btn  btn-info">Consulter</a>
  <a  href="categorie.php?idm=<?php echo $ligne['id']; ?>" class="btn  btn-warning">Modifier</a>
  
                </td>
              </tr>
<?php endforeach ?>
            


            </tbody>
          </table>

<?php if (isset($categorie_a_consulter)): ?>
  <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Détials du categorie  : <?php echo $categorie_a_consulter['nom']  ?></h3>
            </div>
            <div class="panel-body">
              <img src="<?php echo $categorie_a_consulter['photo']  ?>"  width="200" alt="">
            </div>
          </div>
<?php endif ?>

  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>