<?php
require('../utilisateurs/ma_session.php');
require('../utilisateurs/mon_role.php');
?>

<?php
require('../connexion.php');
$id = $_GET['id'];
$requete = $pdo->query("SELECT * FROM reservation WHERE id=$id");
$lareservation = $requete->fetch();

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
        <div class="panel-heading" align="center"> Modifier la reservation</div>
        <div class="panel-body">

            <form method="post" action="update_reservation.php">

                <input type="hidden" name="id" value="<?php echo $lareservation['id']; ?>">

                <div class="row my-row">
                    <label for="nom" class="control-label col-sm-2"> Nom </label>
                    <div class="col-sm-4">
                        <input type="text" name="nom" id="nom" class="form-control"
                               value="<?php echo $lareservation['nom']; ?>">
                    </div>
                    <label for="prenom" class="control-label col-sm-2"> Prenom </label>
                    <div class="col-sm-4">
                        <input type="text" name="prenom" id="prenom" class="form-control"
                               value="<?php echo $lareservation['marque']; ?>">
                    </div>


					<div class="row my-row">
                    <label for="telephone" class="control-label col-sm-2"> Telephone </label>
                    <div class="col-sm-4">
                        <input type="text" name="telephone" id="telephone" class="form-control"
                               value="<?php echo $lareservation['telephone']; ?>">
                    </div>


                </div>
                <div class="row my-row">
                    <label for="email" class="control-label col-sm-2"> Email </label>
                    <div class="col-sm-4">
                        <input type="email" name="email" id="email" class="form-control"
                               value="<?php echo $lareservation['email']; ?>">
                    </div>
					<label for="date_e" class="control-label col-sm-2"> Date de Reservation </label>
                    <div class="col-sm-4">
                        <input type="date_e" name="date_e" id="date_e" class="form-control"
                               value="<?php echo $lareservation['date_e']; ?>">
                    </div>
					<label for="email" class="control-label col-sm-2"> Date de remise </label>
                    <div class="col-sm-4">
                        <input type="date_f" name="date_f" id="date_f" class="form-control"
                               value="<?php echo $lareservation['date_f']; ?>">
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
