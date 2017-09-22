<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Skeleton
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130902

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="page" class="container"/>
	<div id="header">
		<div id="logo">

			<h1><img src="Images/icone.png" alt="" class="icone" /></h1>

		</div>
		<div id="menu">
			<ul>
				<li><a href="Connexion_admin.php" accesskey="3" title="Se connecter">Connexion</a></li>
				<li><a href='Deconnexion.php' accesskey="4" title="Se déconnecter">Deconnexion</a></li>
			</ul>
		</div>
	</div>
	<div id="main"/>
		<div id="banner">
			<img src="Images/logo.png" alt="" class="image-full" />
		</div>
		<div id="welcome"/>
			<div class="title">
        <?php
        session_start();
        if ($_SESSION) {
         	$row['prenom'] = $_SESSION['prenom'];
        	$row["nom"] = $_SESSION['nom'];
          echo "<span class='byline'>"."Au revoir ".$_SESSION['prenom']." ".$_SESSION['nom'].","."</span><br />";
        	session_unset(); //Enlève les variables session
        	session_destroy(); //Détruit la session
        } else {
        //header("location: index.php");
          echo "<span class='byline'>"."Vous n'êtes pas connecté actuellement"."</span>";
        	exit();
        }
        ?>
				<!-- <h2>Selectionner un type de connection</h2>
				<span class="byline">Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue</span> -->
			</div>

</body>
</html>
