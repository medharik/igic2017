<?php 
session_start();
include 'modele.php';
extract($_POST);
check($email,$passe);
if($_SESSION['droit']=='admin'){
header('location:admin.php');

}else if($_SESSION['droit']=='user'){
header('location:user.php');

}else {
	header('location:public.php');
}





 ?>