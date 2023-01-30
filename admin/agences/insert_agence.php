
<?php
	require('../utilisateurs/ma_session.php');
	require('../utilisateurs/mon_role.php');
?>


<?php
	
	
	require('../connexion.php');
	
	$nom=$_POST['nom'];
	$ville=$_POST['ville'];
	$adresse=$_POST['adresse'];
	$telephone=$_POST['telephone'];
	$email=$_POST['email'];

	try {
		
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

		$stmt = $pdo->prepare("INSERT INTO agence (nom, ville, adresse, telephone, email) VALUES (:nom, :ville, :adresse, :telephone,:email)");
		$stmt->execute(['nom' => $nom, 'ville' => $ville, 'adresse' => $adresse, 'telephone' => $telephone, 'email' => $email]);
	
		echo "New record created successfully";
			
	$msg= "Agence ajoutée avec succès";
	$url="agences/page_les_agences.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	} 
	catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$pdo = null;
		
	

		
	
?>