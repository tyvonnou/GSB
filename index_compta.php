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

			<h1><img src="Images/icone.png" alt="" class="icone" /></h1>

		</div>
		<div id="menu">
			<ul>
				<li ><a href="index.php" accesskey="1" title="">HOME</a></li>
        <li><a href='Ajouterforfait.php' accesskey="4" title="">Ajouter un forfait</a></li>
        <li><a href='Supprimerforfait.php' accesskey="4" title="">Supprimer un forfait</a></li>
        <li><a href='Validerfichefrais.php' accesskey="4" title="">Valider une fiche de frais</a></li>
			</ul>
		</div>
	</div>
	<div id="main"/>
		<div id="banner">
			<img src="logo.png" alt="" class="image-full" /><!-- Logo de GSB -->
		</div>
		<div id="welcome">
			<div class="title">
				<h2>Interface Comptable</h2>
				<span class="byline">Ajouter, supprimer ou modifier des forfaits</span>
			</div>
		<ul class="actions">
			<li></li>
		</ul>
		</div>
		<div id="featured"/>
			<div class="tab">
			<table id="tableau">
	          <caption class="byline"> Les forfaits : </caption>
	            <thead><!-- En tete du tableau -->
	            	<tr>
                  <th>ID</th>
	       			<th>Libelle</th>
					<th>Montant</th>
					</tr>
					</thead>
					<tbody><!-- Corps du tableau -->
					<?php
					$mysqli = new mysqli("localhost", "root", "", "si6");

					$sql = "SELECT * FROM	fraisforfait"; // Commande SQL dans une variable
					$result = $mysqli->query($sql);

					While ($row = $result->fetch_assoc()) {
					echo"<tr>";
                    echo"<td>".$row['id'].'</td>';
					echo"<td>".$row['libelle'].'</td>';
					echo"<td>".$row['montant']." €".'</td>';
					echo"</tr>";
					}
					$mysqli->close();
					?>
			</tbody>
  	   	 </table>
		</div>
    <table id="tableau">
          <caption class="byline"> Les Fiches de Frais : </caption>
            <thead><!-- En tete du tableau -->
              <tr>
                <th>Id visiteur</th>
            <th>mois</th>
        <th>Année</th>
        <th>Nombre de Justificatifs</th>
        <th>montant valide</th>
        <th>Date de modification</th>
        <th>Etat</th>
        </tr>
        </thead>
        <tbody><!-- Corps du tableau -->
        <?php
        $mysqli = new mysqli("localhost", "root", "", "si6");

        $sql = "SELECT * FROM	fichefrais"; // Commande SQL dans une variable
        $result = $mysqli->query($sql);

        While ($row = $result->fetch_assoc()) {
        echo"<tr>";
                  echo"<td>".$row['idVisiteur'].'</td>';
        echo"<td>".$row['mois'].'</td>';
        echo"<td>".$row['annee'].'</td>';
        echo"<td>".$row['nbJustificatifs'].'</td>';
        echo"<td>".$row['montantValide']." €".'</td>';
        echo"<td>".$row['dateModif'].'</td>';
        if ($row['idEtat'] == 0) {
                  echo"<td> En Cours </td>";
                } elseif ($row['idEtat'] == 1) {
                    echo"<td> Valide </td>";
                }
        echo"</tr>";
        }
        $mysqli->close();
        ?>
    </tbody>
       </table>
</body>
</html>
