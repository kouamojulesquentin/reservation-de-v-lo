
	<?php
		require('../utilisateurs/ma_session.php');
	?>

<meta charset="utf-8"/>
<?php


	require('../connexion.php');
	
	$id_stagiaire=$_POST['id'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$telephone=$_POST['telephone'];
	$email=$_POST['email'];
	$date_e=$_POST['date_f'];
	$ville=$_POST['ville'];



		$requete="UPDATE reservation SET 
					nom=?,prenom=?,telephone=?,
					email=?,date_e=?,date_f=?
					where id=?";
	
		$valeur=array($nom,$prenom,$telephone,
					$email,$date_e,$date_f);
	
	
	
	$resultat=$pdo->prepare($requete);
	$resultat->execute($valeur);
	
	

	$index_velo  = $_POST['index_velo'];

	
	$msg= "Reservation modifiée avec succes";
	$url="reservations/page_les_reservations.php?index_velo=$index_velo";
	header("location:../message.php?msg=$msg&color=v&url=$url");
?>
