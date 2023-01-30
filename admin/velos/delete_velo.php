
<?php
	require('../utilisateurs/ma_session.php');
	require('../utilisateurs/mon_role.php');
	
?>

<?php
	
	
	require('../connexion.php');
	
	$id_velo=$_GET['id'];		
	
	$requete="DELETE FROM velo where id=?";
	
	$valeur=array($id_velo);
	
	$resultat=$pdo->prepare($requete);
	
	$resultat->execute($valeur);
	
	$msg= "velo supprimé avec succès";
	$url="velos/page_les_velos.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
	
?>