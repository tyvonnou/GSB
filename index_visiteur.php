<?php
session_start();
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
				<li ><a href="index.php" accesskey="1" title="">HOME</a></li>
      <li><a href="Ajouterfichefrais.php" accesskey="2" title="">Ajouter une fiche de frais</a></li>
			</ul>
		</div>
	</div>
	<div id="main"/>
		<div id="banner">
			<img src="Images/logo.png" alt="" class="image-full" />
		</div>
		<div id="welcome">
			<div class="title">
				<h2>Interface visiteur</h2>
				<span class="byline">Ajouter, consultez et suivez vos fiches de frais</span>
			</div>
			<ul class="actions">
				<li></li>
			</ul>
		</div>
		<div id="featured"/>
			<div class="tab">
				<form action="" method="get"/>

	        <table id='tableau'>
	          <caption> Mes fiches de frais : <a href="Ajoutefichefrais.php"></a>
					</caption>

	            <thead><!-- En tete du tableau -->
	            <tr>
	       				 <th>Mois</th>
							   <th>Annee</th>
						     <th>Montant total</th>
						     <th>Etat</th>

					    </tr>

	            </thead>

	 	<tbody><!-- Corps du tableau -->
	<?php
	$mysqli = new mysqli("127.0.0.1", "root", "", "si6");

	// $sql = "SELECT id, idVisiteur, montantValide, idEtat, mois, annee FROM FicheFrais ";
	// $result = $mysqli->query($sql);
	// if ($result) {
	// 	$row = $result->fetch_assoc();
	// 	$_SESSION['id'] = $row['id'];
	// 	$_SESSION['idVisiteur'] = $row['idVisiteur'];
	// 	$_SESSION['mois'] = $row['mois'];
	// 	$_SESSION['annee'] = $row['annee'];
	// 	$_SESSION['idEtat'] = $row["idEtat"];
	// }
$sql = "SELECT * FROM	fichefrais WHERE idVisiteur = '".$_SESSION['id']."'";
$result = $mysqli->query($sql);

while ($row = $result->fetch_assoc()) {



				echo"<tr>";
					if ($row['mois'] == 1) {
	            echo"<td> Janvier </td>";
						} elseif ($row['mois'] == 2) {
		            echo"<td> Février </td>";
						} elseif ($row['mois'] == 3) {
		            echo"<td> Mars </td>";
						 } elseif ($row['mois'] == 4) {
 		            echo"<td> Avril </td>";
 						} elseif ($row['mois'] == 5) {
		            echo"<td> Mai </td>";
						} elseif ($row['mois'] == 6) {
		            echo"<td> Juin </td>";
						} elseif ($row['mois'] == 7) {
		            echo"<td> Juillet </td>";
						} elseif ($row['mois'] == 8) {
		            echo"<td> Aôut </td>";
						} elseif ($row['mois'] == 9) {
		            echo"<td> Septembre </td>";
						} elseif ($row['mois'] == 10) {
		            echo"<td> Octobre </td>";
						} elseif ($row['mois'] == 11) {
		            echo"<td> Novembre </td>";
						} elseif ($row['mois'] == 12) {
		            echo"<td> Décembre </td>";
						} // transforme le mois en nom

					echo"<td>".$row['annee'].'</td>';
	            echo"<td>".$row['montantValide'].'</td>';
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
			</div>

</body>
</html>
