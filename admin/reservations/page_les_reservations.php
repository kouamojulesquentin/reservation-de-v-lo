	
	<?php
		require('../utilisateurs/ma_session.php');
	?>
	
	
	<?php
				
		require('../connexion.php');
		
		if(isset($_GET['nom']))
			$nom=$_GET['nom'];
		else
			$nom="";
		
		if(isset($_GET['telephone']))
			$telephone=$_GET['telephone'];		
		else
			$telephone="ALL";
		
		if($telephone != "ALL"){ 
				$requete=" SELECT * 
								FROM reservation		  
								WHERE nom like '%$nom%'
								AND telephone = '$telephone' ";
				
				$requete_count="	SELECT count(*) as nbr_reservation
											FROM reservation
											WHERE nom like '%$nom%'
											AND telephone = '$telephone' ";				
		}
		else{
				$requete=" SELECT * 
								FROM reservation		  
								WHERE nom like '%$nom%' ";
				
				$requete_count="	SELECT count(*) as nbr_reservation
											FROM reservation
											WHERE nom like '%$nom%' ";	
		}
					  
		$les_reservation=$pdo->query($requete);
		
		
		$toutes_les_reservation=$les_reservation->fetchAll();
		
		
		
						  
		$req_nbr_reservation=$pdo->query($requete_count);
		$resultat_req_nbr_reservation=$req_nbr_reservation->fetch();
		$nbr_velo=$resultat_req_nbr_reservation['nbr_reservation'];
		
		if($nbr_reservation<=1)
			$msg="$nbr_reservation reservations trouvées";
		else
			$msg="$nbr_reservation reservations trouvées";
			
	?>		
	
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>  les Reservations </title> 
		
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/monStyle.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		
		<script src="../js/jquery-1.10.2.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		
	</head>
		
	<body>
	<!-- debut *************************************** -->
	<?php include('../menu.php'); ?>
	<!--  fin **************************************** -->
	<br><br>
		<div class="container">
			<h1 class="text-center"> Liste des Reservations </h1>
			
			<div class="panel panel-primary">
				<div class="panel-heading">Rechecher des reservations(<?php echo  $msg ?> )</div>
				<div class="panel-body">
					<form class="form-inline" >
							
						<input type="text" name="nom" 
								value="<?php echo $nom ?>" class="form-control" placeholder="Recherche par nom">
													
						<input type="submit" value="Rechercher" class="btn btn-primary"> 
					</form>
				</div>
			</div>
			
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Id</th> <th>Nom</th> <th>Prenom</th> <th>Telephone </th><th>Email </th><th>Date Emprunr </th><th>Date Remise </th>
						<?php if($_SESSION['user']['role']=='Directeur'){  ?>
							<th> Actions </th>
						<?php } ?>
					</tr>
				</thead>
					
				<tbody>
					<?php foreach($toutes_les_reservation as $la_reservation){  ?>
						
						
						<tr>
							<td> <?php echo $la_reservation['id'] ?>  				</td> 
							<td> <?php echo $la_reservation['nom'] 	?>  			</td> 
							<td> <?php echo $la_reservation['prenom'] 	?>  			</td> 
							<td> <?php echo $la_reservation['telephone'] ?> 			</td>
							<td> <?php echo $la_reservation['email'] ?> </td> 
							<td> <?php echo $la_reservation['date_e'] ?> </td> 
							<td> <?php echo $la_reservation['date_f'] ?> </td> 
							<?php if($_SESSION['user']['role']=='Directeur'){  ?>
								<td> 
									
									<a href="page_edit_reservation.php?id=<?php echo $la_reservation['id']?>" 
									class="btn btn-success btn-edit-delete">Modifier
									</a>
										
									<a 
										onclick="return confirm('Etes-vous sûr de vouloir supprimer cette reservation')"
										href="delete_reservation.php?id=<?php echo $la_reservation['id']?>" 
										class="btn btn-danger btn-edit-delete">Supprimer
									</a>
										
								</td>
							<?php } ?>
						</tr>
					
					<?php } ?>
				</tbody>
			</table>
			
				<a href="page_add_reservation.php" class="btn btn-primary">Faite une reservation </a>
			
		</div>
	</body>
	
</html>




