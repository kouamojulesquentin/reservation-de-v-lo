<?php
require('../utilisateurs/ma_session.php');
require('../utilisateurs/mon_role.php');
require('../connexion.php');
$requete_agence = "SELECT * FROM agence";
$result_requete_agence = $pdo->query($requete_agence);
$tous_les_agences = $result_requete_agence->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> Nouveau vélo </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monStyle.css">
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
<?php include('../menu.php'); ?>
<br><br><br>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading" align="center"> Nouveau Velo</div>
        <div class="panel-body">

            <form method="post" action="insert_velo.php">
           <center> 
            <div class="row my-row" >
                <div class="row my-row">
                    <label for="nom" class="control-label col-sm-2"> Nom </label>
                    <div class="col-sm-4">
                        <input type="text" name="nom" id="nom" class="form-control">
                    </div>
                </div>
                <div class="row my-row">
                <label for="marque" class="control-label col-sm-2"> Marque </label>
                    <div class="col-sm-4">
                        <input type="text" name="marque" id="marque" class="form-control">
                    </div>
                    

                </div>

                <div class="row my-row">
                    <label for="couleur" class="control-label col-sm-2"> Couleur </label>
                    <div class="col-sm-4">
                        <input type="text" name="couleur" id="couleur" class="form-control">
                    </div>
                    
 
                </div>
                



                <div class="row my-row">
                <label class="control-label col-sm-2"> Agence </label>
                    <div class="col-sm-4">
                        <select class="form-control" name="agence">

                            <?php foreach ($tous_les_agences as $agence) { ?>
                                <option value="<?php echo $agence['nom'] ?>">
                                    <?php echo $agence['nom'] ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>
                    </div>
            
            </div>
</center>
                <button type='submit' class="btn btn-success btn-block"> Enregistrer</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
