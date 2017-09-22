<?php
session_start();
header('Content-Type: charset=utf-8');
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
<meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
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

			<h1><img src="Images/icone.png" alt="" class="icone" /></h1> <!-- icone de gsb -->

		</div>
		<div id="menu">
			<ul>
				<li ><a href="index.php" accesskey="1" title="">HOME</a></li>
        <li><a href='Ajoutervisiteur.php' accesskey="4" title="Se déconnecter">Ajouter un visiteur</a></li>
        <li><a href='Supprimervisiteur.php' accesskey="4" title="Se déconnecter">Supprimer un visiteur</a></li>
			</ul>
		</div>
	</div>
	<div id="main"/>
		<div id="banner">
			<img src="logo.png" alt="" class="image-full" /><!-- Logo de GSB -->
		</div>
		<div id="welcome">
			<div class="title">
				<h2>Interface Administrateur</h2>
				<span class="byline">Ajouter, supprimer ou modifier des visiteurs</span>
			</div>
		<ul class="actions">
			<li></li>
		</ul>
		</div>
		<div id="featured"/>
			<div class="tab">
			<table id="tableau">
	          <caption class="byline"> Les Visiteurs : </caption>
	            <thead><!-- En tete du tableau -->
	            	<tr>
                  <th>ID</th>
	       					<th>Nom</th>
									<th>Prénom</th>
									<th>Login</th>
									<th>Mot de passe</th>
									<th>Adresse</th>
									<th>Code postal</th>
									<th>Ville</th>
									<th>Date d'embauche</th>
									<th>Type</th>
									<th></th>
					</tr>
					</thead>
					<tbody><!-- Corps du tableau -->
					<?php
					$mysqli = new mysqli("localhost", "root", "", "si6");

					$sql = "SELECT * FROM	visiteur"; // Commande SQL dans une variable
					$result = $mysqli->query($sql);

					While ($row = $result->fetch_assoc()) {
					echo"<tr>";
                    echo"<td>".$row['id'].'</td>';
					echo"<td>".$row['nom'].'</td>';
					echo"<td>".$row['prenom'].'</td>';
					echo"<td>".$row['login'].'</td>';
					echo"<td>".$row['mdp'].'</td>';
					echo"<td>".$row['adresse'].'</td>';
					echo"<td>".$row['cp'].'</td>';
					echo"<td>".$row['ville'].'</td>';
					echo"<td>".$row['dateEmbauche'].'</td>';
					if ($row['Type'] == @A) {
					echo"<td> Administrateur </td>";
						} elseif ($row['Type'] == @V) {
		            echo"<td> Visiteur </td>";
						} elseif ($row['Type'] == @C) {
		            echo"<td> Comptable </td>";
						 } ;
					echo"</tr>";
					}
					$mysqli->close();
					?>
			</tbody>
  	   	 </table>
		</div>
</body>
</html>
