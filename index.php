<?php
	session_start();
	if ($_POST) {
		$get = $_POST;
		$mysqli = new mysqli("127.0.0.1", "root", "", "si6");

		$sql = "SELECT * FROM visiteur WHERE login = '".$get['login']."' and mdp = '".$get['mdp']."'";
		$result = $mysqli->query($sql);
		if ($result) {
			$row = $result->fetch_assoc();
			$_SESSION['login'] = $row['login'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['prenom'] = $row['prenom'];
			$_SESSION['nom'] = $row["nom"];
			$_SESSION['Type'] = $row['Type'];
		}
	} // Variable de session
?>

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
				<li><a href='Deconnexion.php' accesskey="4" title="Se d�connecter">Deconnexion</a></li>
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
				if ($_SESSION) {
					foreach ($_SESSION as $key => $value) {
						//echo "<span class='byline'>".$key." : ".$value."</span><br />"; //afficher les données session
					}
					if ($_SESSION['login']){
					echo "<span class='byline'>"."Bonjour ".$_SESSION['prenom']." ".$_SESSION['nom'].", <br /> Bienvenue"."</span><br />";
				} else {
					echo "<span class='byline'>"."Identifiant ou mot de passe incorrect"."</span><br />";
					session_unset();
					session_destroy();		// Permet de vérifier les identifiants
				}
				}
				if ($_SESSION) {
				if ($_SESSION['Type'] == "C") {
					echo "<br />";
					echo "<a href='index_compta.php'> <input type='button' value='Continuer'/></a>";
				}
				elseif ($_SESSION['Type'] == "V") {
					echo "<br />";
					echo "<a href='index_visiteur.php'> <input type='button' value='Continuer'/></a>";
				}
				elseif ($_SESSION['Type'] == "A") {
					echo "<br />";
					echo "<a href='index_admin.php'> <input type='button' name='' value='Continuer'/></a>";
				}
} // Permet de savoir si il s'agit du comptable ou du visiteur
				else {
					echo "<br /><span class='byline'>Bienvenue sur GSB, merci de vous connecter avec votre compte</span><br />";
				}


				?>

			</div>

</body>
</html>
