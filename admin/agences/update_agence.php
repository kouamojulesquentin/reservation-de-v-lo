	<?php
		require('../utilisateurs/ma_session.php');
		require('../utilisateurs/mon_role.php');
	?>
<?php
	
	require('../connexion.php');
	
	$id_agence=$_POST['id'];
	
	$requete=$pdo->query("SELECT * FROM agence WHERE id=$id_agence");
	$lagence=$requete->fetch();
	
	$nom=$_POST['nom'];
	$ville=$_POST['ville'];
	$adresse=$_POST['adresse'];
	$telephone=$_POST['telephone'];
	$email=$_POST['email'];
	
	$nouvelles_valeurs=array($nom,$ville,$adresse,$telephone );
					
	$requete="UPDATE agence SET nom=?,ville=?,adresse=?,telephone=?,email=?
					where id=?";
		
	$resultat=$pdo->prepare($requete);
	
	$resultat->execute($nouvelles_valeurs);
	
	$msg= "Agence modifiée avec succès";
	$url="agences/page_les_agences.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
	
	
?>