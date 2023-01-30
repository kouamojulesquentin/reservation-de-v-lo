	
	<?php
		require('../utilisateurs/ma_session.php');
	?>
	
	
	<?php
				
		require('../connexion.php');
		
		if(isset($_GET['nom']))
			$nom=$_GET['nom'];
		else
			$nom="";
		
		if(isset($_GET['marque']))
			$marque=$_GET['marque'];		
		else
			$marque="ALL";
		
		if($marque != "ALL"){ 
				$requete=" SELECT * 
								FROM velo		  
								WHERE nom like '%$nom%'
								AND marque = '$marque' ";
				
				$requete_count="	SELECT count(*) as nbr_velo
											FROM velo
											WHERE nom like '%$nom%'
											AND marque = '$marque' ";				
		}
		else{
				$requete=" SELECT * 
								FROM velo		  
								WHERE nom like '%$nom%' ";
				
				$requete_count="	SELECT count(*) as nbr_velo
											FROM velo
											WHERE nom like '%$nom%' ";	
		}
					  
		$les_velo=$pdo->query($requete);
		
		
		$tous_les_velo=$les_velo->fetchAll();
		
		
		
						  
		$req_nbr_velo=$pdo->query($requete_count);
		$resultat_req_nbr_velo=$req_nbr_velo->fetch();
		$nbr_velo=$resultat_req_nbr_velo['nbr_velo'];
		
		if($nbr_velo<=1)
			$msg="$nbr_velo velos trouvées";
		else
			$msg="$nbr_velo velos trouvées";
			
	?>		
	
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>  les Velos </title> 
		
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
			<h1 class="text-center"> Liste des velos </h1>
			
			<div class="panel panel-primary">
				<div class="panel-heading">Rechecher des velos(<?php echo  $msg ?> )</div>
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
						<th>Id</th> <th>Nom</th> <th>Marque</th> <th>Couleur </th><th>Agence </th>
						<?php if($_SESSION['user']['role']=='Directeur'){  ?>
							<th> Actions </th>
						<?php } ?>
					</tr>
				</thead>
					
				<tbody>
					<?php foreach($tous_les_velo as $le_velo){  ?>
						
						
						<tr>
							<td> <?php echo $le_velo['id'] ?>  				</td> 
							<td> <?php echo $le_velo['nom'] 	?>  			</td> 
							<td> <?php echo $le_velo['marque'] ?> 			</td>
							<td> <?php echo $le_velo['couleur'] ?> </td> 
							<td> <?php echo $le_velo['agence'] ?> </td> 
							<?php if($_SESSION['user']['role']=='Directeur'){  ?>
								<td> 
									
									<a href="page_edit_velo.php?id=<?php echo $le_velo['id']?>" 
									class="btn btn-success btn-edit-delete">Modifier
									</a>
										
									<a 
										onclick="return confirm('Etes-vous sûr de vouloir supprimer ce velo')"
										href="delete_velo.php?id=<?php echo $le_velo['id']?>" 
										class="btn btn-danger btn-edit-delete">Supprimer
									</a>
										
								</td>
							<?php } ?>
						</tr>
					
					<?php } ?>
				</tbody>
			</table>
			<?php if($_SESSION['user']['role']=='Directeur'){  ?>
				<a href="page_add_velo.php" class="btn btn-primary">Nouveau velo </a>
			<?php } ?>
		</div>
	</body>
	
</html>




