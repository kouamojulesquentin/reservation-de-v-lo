	<?php
		require('../utilisateurs/ma_session.php');
	?>

<?php

	require('../connexion.php');
	

	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$telephone=$_POST['telephone'];
	$email=$_POST['email'];
	$date_e=$_POST['date_e'];
	$date_f=$_POST['date_f'];
	
	try {
		
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

		$stmt = $pdo->prepare("INSERT INTO reservation (nom, prenom, telephone, email,date_e,date_f) VALUES (:nom, :prenom, :telephone, :email,:date_e, :date_f)");
		$stmt->execute(['nom' => $nom, 'prenom' => $prenom, 'telephone' => $telephone, 'email' => $email, 'date_e' => $date_e, 'date_f'=>$date_f]);
	
		echo "New record created successfully";
			
	$msg= "reservation ajoutée avec succès";
	$url="reservations/page_les_reservations.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	} 
	catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$pdo = null;
		


	

	
?>
