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

			<h1><img src="Images/icone.png" alt="" class="icone" /></h1>

		</div>
		<div id="menu">
			<ul>
        <li ><a href="index.php" accesskey="1" title="">HOME</a></li>
        <li class="current_page_item"><a href='Ajouterforfait.php' accesskey="4" title="">Ajouter un forfait</a></li>
        <li><a href='Supprimerforfait.php' accesskey="4" title="">Supprimer un forfait</a></li>
        <li><a href='Validerfichefrais.php' accesskey="4" title="">Valider une fiche de frais</a></li>
			</ul>
		</div>
	</div>
	<div id="main">
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
		<div id="featured">
			<div class="tab">
        <form id="formulaire" action="" method="get" >

      		<fieldset>
      		    <legend>NOUVEAU FORFAIT : </legend>

              <label for="id">Id: </label>
        		<input id="id" name="id" type="text"  size="3" maxlength="6"/>

      			<label for="libelle">Libelle : </label>
      			<input id="libelle" name="libelle" type="text"  size="10" maxlength="20"/>

            <label for="montant">Montant : </label>
      			<input id="montant" name="montant" type="text"  size="10" maxlength="20"/>

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
	//on recupere les varirable issue du formulaire
@$libelle=$_GET['libelle'];
@$montant=$_GET['montant'];
@$id=$_GET['id'];




  if (!empty($montant)) {
    include 'connectAD.php';

		$sql = "INSERT INTO fraisforfait (id, libelle, montant) VALUES ('".$id."','".$libelle."', '".$montant."');";
		$result = executeSQL($sql);

		if ($result)
			echo "Ajout realise ";
		else
			echo "Erreur";

	}else
		echo "Merci de renseigner les informations ci dessus";

?>
			</div>
			</div>
			</div>
</body>
</html>
