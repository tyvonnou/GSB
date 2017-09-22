<?php
	//on recupere les varirable issue du formulaire

	$id=$_GET['id'];




  if (!empty($id)) {
  	include 'connectAD.php';


		$sql = "DELETE FROM Forfait WHERE id=".$id;
		$result = $mysqli->query($sql);

		if ($result)
			echo "Suppression realise ";
		else
			echo "Erreur";

	}else
		echo "Merci de renseigner l'information ci dessus  ";

?>
