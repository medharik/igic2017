<?php 
//fonctions (methodes): sous programme / module réutilisable permettant de faire une tache spécifique 

//connexion db
function connecter_db()
{
$cnx = new PDO('mysql:host=localhost;dbname=db2018',"root", ""); 
return $cnx;
}

//ajout
function ajouter_produit($libelle,$prix,$qtestock,$photo)
{ //connexion db
$cnx=	connecter_db();
	//prepare une requete (SQL)
$rp=$cnx->prepare("insert into produit (libelle,prix,qtestock,photo) values (?,?,?,?)");
	//executer la requete 
	$rp->execute(array($libelle,$prix,$qtestock,$photo));
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
function modifier_produit($id,$new_libelle,$new_prix)
{ //connexion db
$cnx=	connecter_db();
	//prepare une requete (SQL)
$rp=$cnx->prepare("update produit set libelle=?, prix=? where id=?");
	//executer la requete ,
	$rp->execute(array($new_libelle,$new_prix,$id));
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
{$nom=$infos['name'];
$fichier_temporaire=$infos['tmp_name'];
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
move_uploaded_file($fichier_temporaire,$chemin );

	return $chemin;

}


 ?>