	<?php
		require('../utilisateurs/ma_session.php');
		require('../utilisateurs/mon_role.php');
	?>
<?php
	
	require('../connexion.php');
	
	$id_velo=$_POST['id'];
	
	$requete=$pdo->query("SELECT * FROM velo WHERE id=$id_velo");
	$lagence=$requete->fetch();
	
	$nom=$_POST['nom'];
	$marque=$_POST['marque'];
	$couleur=$_POST['couleur'];
	$couleur=$_POST['agence'];

	
	$nouvelles_valeurs=array($nom,$marque,$couleur ,$agence);
					
	$requete="UPDATE velo SET nom=?,marque=?,couleur=?, agence=?
					where id=?";
		
	$resultat=$pdo->prepare($requete);
	
	$resultat->execute($nouvelles_valeurs);
	
	$msg= "Velo modifié avec succès";
	$url="agences/page_les_velos.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
	
	
?>