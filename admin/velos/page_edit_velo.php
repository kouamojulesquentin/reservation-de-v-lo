<?php
require('../utilisateurs/ma_session.php');
require('../utilisateurs/mon_role.php');
?>

<?php
require('../connexion.php');
$id = $_GET['id'];
$requete = $pdo->query("SELECT * FROM velo WHERE id=$id");
$levelo = $requete->fetch();

$requete_agence = "SELECT * FROM agence";
$result_requete_agence = $pdo->query($requete_agence);
$tous_les_agences = $result_requete_agence->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> Modifier le velo </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
<?php include('../menu.php'); ?>
<br><br><br>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading" align="center"> Modifier le velo</div>
        <div class="panel-body">

            <form method="post" action="update_velo.php">

                <input type="hidden" name="id" value="<?php echo $levelo['id']; ?>">

                <div class="row my-row">
                    <label for="nom" class="control-label col-sm-2"> Nom </label>
                    <div class="col-sm-4">
                        <input type="text" name="nom" id="nom" class="form-control"
                               value="<?php echo $levelo['nom']; ?>">
                    </div>
                    


                    

                </div>
                <br>
                <div class="row my-row">
                <label for="marque" class="control-label col-sm-2"> Marque </label>
                    <div class="col-sm-4">
                        <input type="text" name="marque" id="marque" class="form-control"
                               value="<?php echo $levelo['marque']; ?>">
                    </div>
                </div>
                <br>
                <div class="row my-row">
                    <label for="couleur" class="control-label col-sm-2"> Couleur </label>
                    <div class="col-sm-4">
                        <input type="text" name="couleur" id="couleur" class="form-control"
                               value="<?php echo $levelo['couleur']; ?>">
                    </div>

                

                </div>
                <br>
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
         


                <button onclick="return confirm('Voulez-vous enregistrer les modificatios')"
                        type='submit'
                        class="btn btn-success btn-block"> Enregistrer
                </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
