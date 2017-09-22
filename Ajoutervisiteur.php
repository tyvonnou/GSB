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
        <li class="current_page_item" ><a href='Ajoutervisiteur.php' accesskey="4" title="Se déconnecter">Ajouter un visiteur</a></li>
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
        <form id="formulaire" action="" method="get" >

      		<fieldset>
      		    <legend>NOUVEAU VISITEUR : </legend>

            <label for="id">Id: </label>
        		<input id="id" name="id" type="text"  size="3" maxlength="6"/>
            <br />
      			<label for="nom">Nom : </label>
      			<input id="nom" name="nom" type="text"  size="10" maxlength="20"/>
            <br />
            <label for="prenom">Prénom : </label>
      			<input id="prenom" name="prenom" type="text"  size="10" maxlength="20"/>
            <br />
            <label for="login">Login : </label>
      			<input id="login" name="login" type="text"  size="10" maxlength="20"/>
            <br />
            <label for="mdp">Mot de passe : </label>
      			<input id="mdp" name="mdp" type="text"  size="10" maxlength="20"/>
            <br />
            <label for="adresse">Adresse : </label>
      			<input id="adresse" name="adresse" type="text"  size="10" maxlength="20"/>
            <br />
            <label for="cp">Code postal : </label>
      			<input id="cp" name="cp" type="text"  size="10" maxlength="20"/>
            <br />
            <label for="ville">Ville : </label>
      			<input id="ville" name="ville" type="text"  size="10" maxlength="20"/>
            <br />
            <label for="dateEmbauche">Date d'embauche : </label>
      			<input id="dateEmbauche" name="dateEmbauche" type="date"  size="10" maxlength="20"/>
            <br />
            <label for="Type">Type : </label>
      			<input id="Type" name="Type" type="text"  size="10" maxlength="20"/>

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
			</tbody>
  	   	 </table>
         <?php
         	//on recupere les varirable issue du formulaire
         @$nom=$_GET['nom'];
         @$prenom=$_GET['prenom'];
         @$id=$_GET['id'];
         @$lgin=$_GET['login'];
         @$md=$_GET['mdp'];
         @$adresse=$_GET['adresse'];
         @$cp=$_GET['cp'];
         @$ville=$_GET['ville'];
         @$dateEmbauche=$_GET['dateEmbauche'];
         @$Type=$_GET['Type'];


           if (!empty($lgin)) {
             include 'connectAD.php';

         		$sql = "INSERT INTO visiteur (id, nom, prenom, login, mdp, adresse, cp, ville, dateEmbauche, Type)
                    VALUES ('".$id."','".$nom."','".$prenom."','".$lgin."','".$md."','".$adresse."','".$cp."','".$ville."','".$dateEmbauche."','".$Type."');";
         		$result = executeSQL($sql);

         		if ($result)
         			echo "Ajout realise ";
         		else
         			echo "Erreur";

         	}else
         		echo "Merci de renseigner les informations ci dessus";

         ?>
		</div>
</body>
</html>
