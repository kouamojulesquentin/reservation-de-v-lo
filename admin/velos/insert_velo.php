
<?php
	require('../utilisateurs/ma_session.php');
	require('../utilisateurs/mon_role.php');
?>


<?php
	
	
	require('../connexion.php');
	
	$nom=$_POST['nom'];
	$marque=$_POST['marque'];
	$couleur=$_POST['couleur'];
	$agence=$_POST['agence'];


	try {
		
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

		$stmt = $pdo->prepare("INSERT INTO velo (nom, marque, couleur,agence) VALUES (:nom, :marque, :couleur,:agence)");
		$stmt->execute(['nom' => $nom, 'marque' => $marque, 'couleur' => $couleur,'agence' => $agence]);
	
		echo "New record created successfully";
			
	$msg= "Velo ajouté avec succès";
	$url="velos/page_les_velos.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	} 
	catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$pdo = null;
		
	

		
	
?>