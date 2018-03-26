<?php 
//fonctions (methodes): sous programme / module réutilisable permettant de faire une tache spécifique 

//connexion db
function connecter_db()
{
$cnx = new PDO('mysql:host=localhost;dbname=db2018',"root", ""); 
$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $cnx;
}

//ajout
function ajouter_produit($libelle,$prix,$qtestock,$photo)
{ 
try{
//connexion db
$cnx=	connecter_db();
	//prepare une requete (SQL)
$rp=$cnx->prepare("insert into produit (libelle,prix,qtestock,photo) values (?,?,?,?)");
	//executer la requete 
	$rp->execute(array($libelle,$prix,$qtestock,$photo));

}catch(PDOException $e){
 die("erreur ajout de produit ".$e->getMessage());
}
}

//supprimer ($id)
function supprimer_produit($id)
{ //connexion db
$cnx=	connecter_db();
	//prepare une requete (SQL)
$rp=$cnx->prepare("delete from produit where id=?");
	//executer la requete 
	$rp->execute(array($id));
}

//modifier (connaitre quel produit à modifier ($id))+ nouveau libelle , $prix
function modifier_produit($id,$libelle,$prix,$photo,$qtestock)
{ //connexion db
$cnx=	connecter_db();
	//prepare une requete (SQL)
if(!empty($photo)){
	$rp=$cnx->prepare("update produit set libelle=?, prix=?, photo=?, qtestock=? where id=?");
	$rp->execute(array($libelle,$prix,$photo,$qtestock,$id));

}
else {
	$rp=$cnx->prepare("update produit set libelle=?, prix=?, qtestock=? where id=?");
	$rp->execute(array($libelle,$prix,$qtestock,$id));
}

	//executer la requete ,
}

//recuperer des produits
function get_all()
{
	$cnx=	connecter_db();
	//prepare une requete (SQL)
$rp=$cnx->prepare("select * from produit");
	//executer la requete 
	$rp->execute();
$data=	$rp->fetchAll();
return $data;
}

//recuperer un produit spécifique par son id
//recuperer des produits
function get_by_id($id)
{
	$cnx=	connecter_db();
	//prepare une requete (SQL)
$rp=$cnx->prepare("select * from produit where id=?");
	//executer la requete 
	$rp->execute(array($id));
$data=	$rp->fetch();
return $data;
}

function charger($infos)
{$nom=$infos['name'];//ok
$fichier_temporaire=$infos['tmp_name'];//ok
$new_name= sha1( date('Y_m_d_h_i_s')."_".rand(0,9999)).$nom;
$extension=pathinfo($nom, PATHINFO_EXTENSION);
$autorises=array('jpg','jpeg','png','gif');
$taille=$infos['size'];
if( ! in_array($extension, $autorises)){
die("ce n'est pas une image");
}
if($taille > 8000000){
die("ce fichier est trop volumineux");
}
$chemin="images/$new_name";
move_uploaded_file($fichier_temporaire,$chemin );//ok

	return $chemin;

}


 ?>