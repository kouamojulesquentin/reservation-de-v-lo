	
	<?php
		require('../utilisateurs/ma_session.php');
	?>
	
	
	<?php
				
		require('../connexion.php');
		
		if(isset($_GET['nom']))
			$nom=$_GET['nom'];
		else
			$nom="";
		
		if(isset($_GET['ville']))
			$ville=$_GET['ville'];		
		else
			$ville="ALL";
		
		if($ville != "ALL"){ 
				$requete=" SELECT * 
								FROM agence		  
								WHERE nom like '%$nom%'
								AND ville = '$ville' ";
				
				$requete_count="	SELECT count(*) as nbr_agences
											FROM agence
											WHERE nom like '%$nom%'
											AND ville = '$ville' ";				
		}
		else{
				$requete=" SELECT * 
								FROM agence		  
								WHERE nom like '%$nom%' ";
				
				$requete_count="	SELECT count(*) as nbr_agences
											FROM agence
											WHERE nom like '%$nom%' ";	
		}
					  
		$les_agences=$pdo->query($requete);
		// $les_agences contient le résultat de la requete :SELECT * FROM agence	
		
		$toute_les_agences=$les_agences->fetchAll();
		// la methode fetchAll retourne toutes les lignes de la table agence
		
		
						  
		$req_nbr_agences=$pdo->query($requete_count);
		$resultat_req_nbr_agences=$req_nbr_agences->fetch();
		$nbr_agences=$resultat_req_nbr_agences['nbr_agences'];
		
		if($nbr_agences<=1)
			$msg="$nbr_agences agences trouvées";
		else
			$msg="$nbr_agences agences trouvées";
			
	?>		
	
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>  les Agences </title> 
		
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
			<h1 class="text-center"> Liste des agences </h1>
			
			<div class="panel panel-primary">
				<div class="panel-heading">Rechecher des agences(<?php echo  $msg ?> )</div>
				<div class="panel-body">
					<form class="form-inline" >
						<label> Ville: </label>
							<select name="ville" 
										class="form-control" onChange="this.form.submit();"	>
								<option value="ALL" <?php if($ville=="ALL")  echo "selected"?>>Toutes les villes</option>
								<option value="yaounde"    <?php  if($ville=="yaounde")  echo "selected"?>>Yaounde</option>
								<option value="douala"    <?php  if($ville=="douala")  echo "selected"?> >Douala</option>
								<option value="bafoussam"  <?php  if($villes=="bafoussam") echo "selected"?>>Bafoussam</option>
								<option value="maroua"  <?php  if($ville=="maroua") echo "selected"?>>Maroua</option>
								<option value="ebolowa"  <?php  if($ville=="ebolowa") echo "selected"?>>Ebolowa</option>
								<option value="bertoua"  <?php  if($ville=="bertoua") echo "selected"?>>Bertoua</option>
								<option value="ngaoundere"  <?php  if($ville=="ngaoundere") echo "selected"?>>Ngaoundere</option>
								<option value="garoua"  <?php  if($ville=="garoua") echo "selected"?>>Garoua</option>
								<option value="maroua"  <?php  if($ville=="maroua") echo "selected"?>>Maroua</option>
								<option value="bamenda"  <?php  if($ville=="bamenda") echo "selected"?>>Bamenda</option>
								
							</select>
							
						<input type="text" name="nom" 
								value="<?php echo $nom ?>" class="form-control" placeholder="Recherche par nom">
													
						<input type="submit" value="Rechercher" class="btn btn-primary"> 
					</form>
				</div>
			</div>
			
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Id</th> <th>Nom</th> <th>Ville</th> <th>Adresse </th><th>Telephone </th><th>Email </th>
						<?php if($_SESSION['user']['role']=='Directeur'){  ?>
							<th> Actions </th>
						<?php } ?>
					</tr>
				</thead>
					
				<tbody>
					<?php foreach($toute_les_agences as $l_agence){  ?>
						<!-- Pour chaque agence de l'ensemble  toute_les_agences -->
						
						<tr>
							<td> <?php echo $l_agence['id'] ?>  				</td> 
							<td> <?php echo $l_agence['nom'] 	?>  			</td> 
							<td> <?php echo $l_agence['ville'] ?> 			</td>
							<td> <?php echo $l_agence['adresse'] ?> </td> 
							<td> <?php echo $l_agence['telephone'] ?> </td> 
							<td> <?php echo $l_agence['email'] ?> </td> 
							<?php if($_SESSION['user']['role']=='Directeur'){  ?>
								<td> 
									
									<a href="page_edit_agence.php?id=<?php echo $l_agence['id']?>" 
									class="btn btn-success btn-edit-delete">Modifier
									</a>
										
									<a 
										onclick="return confirm('Etes-vous sûr de vouloir supprimer cette agence')"
										href="delete_agence.php?id=<?php echo $l_agence['id']?>" 
										class="btn btn-danger btn-edit-delete">Supprimer
									</a>
										
								</td>
							<?php } ?>
						</tr>
					
					<?php } ?>
				</tbody>
			</table>
			<?php if($_SESSION['user']['role']=='Directeur'){  ?>
				<a href="page_add_agence.php" class="btn btn-primary">Nouvelle agence </a>
			<?php } ?>
		</div>
	</body>
	
</html>




