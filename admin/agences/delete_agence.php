
<?php
	require('../utilisateurs/ma_session.php');
	require('../utilisateurs/mon_role.php');
	
?>

<?php
	
	
	require('../connexion.php');
	
	$id_agence=$_GET['id'];		
	
	$requete="DELETE FROM agence where id=?";
	
	$valeur=array($id_agence);
	
	$resultat=$pdo->prepare($requete);
	
	$resultat->execute($valeur);
	
	$msg= "agence supprimée avec succès";
	$url="agences/page_les_agences.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
	
?>