<?php
require('../utilisateurs/ma_session.php');
require('../utilisateurs/mon_role.php');
?>

<?php
require('../connexion.php');
$id = $_GET['id'];
$requete = $pdo->query("SELECT * FROM agence WHERE id=$id");
$lagence = $requete->fetch();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> Modifier l'agence </title>
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
        <div class="panel-heading" align="center"> Modifier l'agence</div>
        <div class="panel-body">

            <form method="post" action="update_agence.php">

                <input type="hidden" name="id" value="<?php echo $lagence['id']; ?>">

                <div class="row my-row">
                    <label for="nom" class="control-label col-sm-2"> Nom </label>
                    <div class="col-sm-4">
                        <input type="text" name="nom" id="nom" class="form-control"
                               value="<?php echo $lagence['nom']; ?>">
                    </div>


                    <label for="ville" class="control-label col-sm-2"> Ville </label>
                    <div class="col-sm-4">
                        <select name="ville" id="ville" class="form-control">
                            <option value="yaounde" <?php if ($lagence['ville'] === "yaounde") echo 'selected' ?> >
                                Yaounde
                            </option>
                            <option value="douala" <?php if ($lagence['ville'] === "douala") echo 'selected' ?> >
                                Douala
                            </option>
                            <option value="bafoussam" <?php if ($lagence['ville'] === "bafoussam") echo 'selected' ?> >
                                Bafoussam
                            </option>
                            <option value="maroua" <?php if ($lagence['ville'] === "maroua") echo 'selected' ?> >
                                Maroua
                            </option>
                            <option value="ebolowa" <?php if ($lagence['ville'] === "ebolowa") echo 'selected' ?> >
                                Ebolowa
                            </option>
                            <option value="limbe" <?php if ($lagence['ville'] === "limbe") echo 'selected' ?> >
                                Limbe
                            </option>
                            <option value="ngaoundere" <?php if ($lagence['ville'] === "ngaoundere") echo 'selected' ?> >
                                Ngaoundere
                            </option>
                            <option value="garoua" <?php if ($lagence['ville'] === "garoua") echo 'selected' ?> >
                                Garoua
                            </option>
                            <option value="bertoua" <?php if ($lagence['ville'] === "bertoua") echo 'selected' ?> >
                                Bertoua
                            </option>
                            <option value="bamenda" <?php if ($lagence['ville'] === "bamenda") echo 'selected' ?> >
                                Bamenda
                            </option>

                        </select>

                    </div>

                </div>
                <div class="row my-row">
                    <label for="adresse" class="control-label col-sm-2"> Adresse </label>
                    <div class="col-sm-4">
                        <input type="text" name="adresse" id="adresse" class="form-control"
                               value="<?php echo $lagence['adresse']; ?>">
                    </div>

                    <label for="telephone" class="control-label col-sm-2"> Telephone </label>
                    <div class="col-sm-4">
                        <input type="text" name="telephone" id="telephone" class="form-control"
                               value="<?php echo $lagence['telephone']; ?>">
                    </div>

                    <label for="email" class="control-label col-sm-2"> Email </label>
                    <div class="col-sm-4">
                        <input type="text" name="email" id="email" class="form-control"
                               value="<?php echo $lagence['email']; ?>">
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
