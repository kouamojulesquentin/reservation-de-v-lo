	<?php
		require('../utilisateurs/ma_session.php');
		require('../utilisateurs/mon_role.php');
	?>

<?php

	require('../connexion.php');
	
	$id_reservation=$_GET['id'];
	
	
	
	$requete="DELETE from reservation where id=?";
	
	$valeur=array($id_reservation);
					
	$resultat=$pdo->prepare($requete);
	$resultat->execute($valeur);
	
	$msg= "Reservation supprimé avec succés";
	$url="reservations/page_les_reservations.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	 
?>
