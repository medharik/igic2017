<?php 
extract($_GET);
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>login</title>

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
<div class = "container">
	<div class="wrapper">
		
		<form action="verifier.php" method="post" name="Login_Form" class="form-signin" >    
		   <?php if (isset($cn) && $cn=="no"): ?>
			<div class="alert alert-danger">
				Login / Mot de passe invalides
			</div>
		<?php endif ?>
		 <?php if (isset($droit) && $droit=="no"): ?>
			<div class="alert alert-danger">
				Vois n'avez pas le droit d'accéder à cette page
			</div>
		<?php endif ?>
		    <h3 class="form-signin-heading">Connexion</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="text" class="form-control" name="email" placeholder="email" required="" autofocus="" />
			  <input type="password" class="form-control" name="passe" placeholder="mot de passe..." required=""/>     		  
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Connexion</button>  			
		</form>			
	</div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>