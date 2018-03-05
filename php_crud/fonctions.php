<?php 
//fonctions (methodes): sous programme / module réutilisable permettant de faire une tache spécifique 

//connexion db
function connecter_db()
{
$cnx = new PDO('mysql:host=localhost;dbname=db2018',"root", ""); 
return $cnx;
}

//ajout
function ajouter_produit($libelle,$prix)
{ //connexion db
$cnx=	connecter_db();
	//prepare une requete (SQL)
$rp=$cnx->prepare("insert into produit (libelle,prix) values (?,?)");
	//executer la requete 
	$rp->execute(array($libelle,$prix));
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
	//executer la requete 
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



 ?>