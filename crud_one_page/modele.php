<?php 
//fonctions (methodes): sous programme / module réutilisable permettant de faire une tache spécifique 

//connexion db
function connecter_db()
{
$cnx = new PDO('mysql:host=localhost;dbname=db2018',"root", ""); 
$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $cnx;
}

function intero($value)
{
	return '?';
}
//ajout générique
function ajouter($table,$data)
{ 
try{
$cles=join(',', array_keys($data));//nom,prix
$valeurs= array_values($data);// array(hp,5000)
$intero=join(',', array_map("intero",$data));//?,?
$sql="insert into $table ($cles) values ($intero)";
//echo "$sql";
//connexion db
$cnx=	connecter_db();
	//prepare une requete (SQL)
$rp=$cnx->prepare($sql);
	//executer la requete 
	$rp->execute($valeurs);
}catch(PDOException $e){
 die("erreur ajout de $table ".$e->getMessage());
}
}

//supprimer ($id)
function supprimer($id,$table)
{ //connexion db
$cnx=	connecter_db();
	//prepare une requete (SQL)
$rp=$cnx->prepare("delete from $table where id=?");
	//executer la requete 
	$rp->execute(array($id));
}
//modifier (connaitre quel produit à modifier ($id))+ nouveau libelle , $prix

function set($value){
return "$value =?";
}
function modifier($table,$id,$data)
{ //connexion db

if(empty($data['photo'])){
$element=get_by_id($id, $table);
$old_chemin=$element['photo'];
$data['photo']=$old_chemin;
}
	$keys=array_keys($data);//array(nom,prix);
	$sets=join(',',array_map("set",$keys));//array(nom=?,prix=?);
$valeurs=array_values($data);
$valeurs[]=$id;
$sql="update $table set $sets where id=?";
echo $sql;
$cnx=	connecter_db();
	//prepare une requete (SQL)
$rp=$cnx->prepare($sql);
	$rp->execute($valeurs);

	//executer la requete ,
}

//recuperer des produits
function get_all($table)
{
	$cnx=	connecter_db();
	//prepare une requete (SQL)
$rp=$cnx->prepare("select * from $table order by id desc");
	//executer la requete 
	$rp->execute();
$data=	$rp->fetchAll();
return $data;
}
function get_by($table, $condition)
{
	$cnx=	connecter_db();
	//prepare une requete (SQL)
$rp=$cnx->prepare("select * from $table where $condition");
	//executer la requete 
	$rp->execute();
$data=	$rp->fetchAll();
return $data;
}

//recuperer un produit spécifique par son id
//recuperer des produits
function get_by_id($id,$table)
{
	$cnx=	connecter_db();
	//prepare une requete (SQL)
$rp=$cnx->prepare("select * from $table where id=?");
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