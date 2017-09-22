<?php
	session_start();

	if ($_SESSION) {
			header("location: index.php");
		exit();
	}
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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
				<li class="current_page_item"><a href="index.php" accesskey="1" title="">Retour</a></li>
			</ul>
		</div>
	</div>
	<div id="main"/>
		<div id="banner">
			<img src="Images/logo.jpg" alt="" class="image-full" />
		</div>
		<div id="welcome"/>
			<div class="title">
				<h2>Connexion</h2>
				<span class="byline">Merci de renseignez vos identifiants ci-dessous :</span>
			</div>
			<form action="index.php" method="post">

			<fieldset>
					<label for = "login">Identifiant :</label>
					<input type="text" id="login" name="login" value="" />
					<br />
					<br />
					<label for = "pwd"> Mot de passe :</label>
					<input type="password" id="mdp" name="mdp" value="" />
				<br />
				<br />
					<input type="submit" name="Envoyer" value="Connexion" />
			</fieldset>
			</form>
</body>
</html>
