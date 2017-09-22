<?php
session_start();
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />



</head>
<body>
<div id="page" class="container">
	<div id="header">
		<div id="logo">

			<h1><img src="icone.png" alt="" class="icone" /></h1> <!-- icone de gsb -->

		</div>
		<div id="menu">
			<ul>
        <li ><a href="index.php" accesskey="1" title="">HOME</a></li>
      <li class="current_page_item"><a href="Ajouterfichefrais.php" accesskey="2" title="">Ajouter une fiche de frais</a></li>
			</ul>
		</div>
	</div>
	<div id="main">
		<div id="banner">
			<img src="logo.png" alt="" class="image-full" /><!-- Logo de GSB -->
		</div>
		<div id="welcome">
			<div class="title">
				<h2>Interface Visiteur</h2>
				<span class="byline">Ajouter et consulter mes fiche de frais : </span>
			</div>
		<ul class="actions">
			<li></li>
		</ul>
		</div>
		<div id="featured">
			<div class="tab">
        <form id="formulaire" action="" method="get" >

      		<fieldset>
      		    <legend>NOUVELLE FICHE DE FRAIS : </legend>

              <label for="mois">Mois: </label>
        		<input id="mois" name="mois" type="text"  size="3" maxlength="6"/>

      			<label for="annee">Année : </label>
      			<input id="annee" name="annee" type="text"  size="10" maxlength="20"/>
<br />
            <label for="nbjustificatifs">Nombre de justificatifs : </label>
      			<input id="nbjustificatifs" name="nbjustificatifs" type="text"  size="10" maxlength="20"/>
<br />
            <label for="montant">Nombre de nuitées : </label>
      			<input id="nuitee" name="nuitee" type="text"  size="10" maxlength="20"/>
<br/>      			
      		<label for="montant">Nombre de repas : </label>
      			<input id="repas" name="repas" type="text"  size="10" maxlength="20"/>
<br/>      			
      		<label for="montant">Nombre d'étapes : </label>
      			<input id="etape" name="etape" type="text"  size="10" maxlength="20"/>      			
<br/>      			
      		<label for="montant">Nombre de kilometres : </label>
      			<input id="kilometre" name="kilometre" type="text"  size="10" maxlength="20"/>      			
            
            <?php
          				if (isset($_GET['message']))
          					echo $_GET['message'];
          				else
          					echo "&nbsp;";
?>

              </fieldset>

              <p>
      	    	<input id="effacer" name="effacer" type="reset" value="Effacer" title="" />
      	    	<input id="envoyer" name="envoyer" type="submit" value="Envoyer" title="" />
      	    </p>

      	</form>
			</div>

<?php
	//on recupere les variable issue du formulaire
@$mois=$_GET['mois'];
@$annee=$_GET['annee'];
@$id=$_SESSION['id'];
@$nbJustificatifs=$_GET['nbjustificatifs'];
@$nuitee=$_GET['nuitee'];
@$repas=$_GET['repas'];
@$etape=$_GET['etape'];
@$kilometre=$_GET['kilometre'];



  if (!empty($nuitee)) {
    include 'connectAD.php';
		
		//Recuperation des montants dans la table fraisforfait
    	$sql = "SELECT montant FROM fraisforfait WHERE id = 'ETP'";
    	$results = tableSQL($sql);
    
    	foreach ($results as $ligne){
    		$montantetape = $ligne[0];
    	}
    
    	$sql = "SELECT montant FROM fraisforfait WHERE id = 'KM'";
    	$results = tableSQL($sql);
    
    	foreach ($results as $ligne){
    		$montantkm = $ligne[0];
    	}
    
    	$sql = "SELECT montant FROM fraisforfait WHERE id = 'NUI'";
    	$results = tableSQL($sql);
    	
    	foreach ($results as $ligne){
    		$montantnuitee = $ligne[0];
    	}
    	
    	$sql = "SELECT montant FROM fraisforfait WHERE id = 'REP'";
    	$results = tableSQL($sql);
    	
    	foreach ($results as $ligne){
    		$montantrepas = $ligne[0];
    	}
    
		$sql = "INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite)
			VALUES ('".$id."','".$mois."','NUI','".$nuitee."')";
		$result = executeSQL($sql);
		
		$sql = "INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite)
			VALUES ('".$id."','".$mois."','REP','".$repas."')";
		$result = executeSQL($sql);
		
		$sql = "INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite)
			VALUES ('".$id."','".$mois."','ETP','".$etape."')";
		$result = executeSQL($sql);
		
		$sql = "INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite)
			VALUES ('".$id."','".$mois."','KM','".$kilometre."')";
		$result = executeSQL($sql);
		
		//Calculs des cout des differents frais
		$coutnuitee = $montantnuitee * $nuitee;
		$coutrepas = $montantrepas * $repas;
		$coutetape= $montantetape * $etape;
		$coutkm= $montantkm * $kilometre;
		
		//Calcul du cout total de tous les frais reunis
		$couttot = $coutnuitee + $coutetape + $coutkm + $coutrepas;
		
		$date = date("Y-m-d");
		
		$sql = "INSERT INTO fichefrais (idVisiteur, mois, annee, nbJustificatifs, montantValide, DateModif, idEtat)
            VALUES ('".$id."','".$mois."','".$annee."','".$nbJustificatifs."','".$couttot."','".$date."','0');";
		$result = executeSQL($sql);
		
		if ($result)
			echo "Ajout realise";
		else
			echo "Erreur";

	}else
		echo "Merci de renseigner les informations ci-dessus";

?>
			</div>
			</div>
			</div>
</body>
</html>
