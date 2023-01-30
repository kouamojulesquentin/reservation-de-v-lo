<?php
require('../utilisateurs/ma_session.php');
include("../fonctions.php");
require('../connexion.php');

$requete_velo = "SELECT * FROM velo";
$result_requete_velo = $pdo->query($requete_velo);
$tous_les_velos = $result_requete_velo->fetchAll();

$requete_agence = "SELECT * FROM agence";
$result_requete_agence = $pdo->query($requete_agence);
$tous_les_agences = $result_requete_agence->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> Nouvelle Reservation </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/jquery-ui-1.10.4.custom.css">
    <link rel="stylesheet" href="../css/monStyle.css">

    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/jquery-ui-1.10.4.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/school.js"></script>

    <script src="js/jquery-ui-i18n.min.js"></script>
    <SCRIPT LANGUAGE="JavaScript">
function printt() {
w=open("",'popup','width=400,height=200,toolbar=no,scrollbars=no,resizable=yes');
w.document.write("<BODY>");
w.document.write("Nom: "+document.forms[0].elements["nom"].value+"<BR><BR>");
w.document.write("Prénom: "+document.forms[0].elements["prenom"].value+"<BR><BR>");
w.document.write("Telephone: "+document.forms[0].elements["telephone"].value+"<BR><BR>");
w.document.write("Email: "+document.forms[0].elements["email"].value+"<BR><BR>");
w.document.write("Date d'emprunt: "+document.forms[0].elements["date_e"].value+"<BR><BR>");
w.document.write("Date de remise: "+document.forms[0].elements["date_f"].value+"<BR><BR>");
w.document.write("Velo emprunté: "+document.forms[0].elements["id_velo"].value+"<BR><BR>");
w.document.write("Agence: "+document.forms[0].elements["id_agence"].value+"<BR><BR>");
w.document.write("</BODY>");
w.document.close();
w.print();
}
</SCRIPT>
 


</head>

<body>
<?php include('../menu.php'); ?>
<br><br><br>
<div class="container">


    <div class="panel panel-primary">
        <div class="panel-heading" align="center"> Nouvelle Reservation</div>
        <div class="panel-body">
            <form method="post" action="insert_reservation.php" enctype="multipart/form-data">

                <div class="row my-row">
                    <label for="nom" class="control-label col-sm-2"> Nom </label>
                    <div class="col-sm-4">
                        <input required type="text" name="nom" id="nom" class="form-control">
                    </div>

                    <label for="prenom" class="control-label col-sm-2"> Prenom </label>
                    <div class="col-sm-4">
                        <input rtype="text" name="prenom" id="prenom" class="form-control">
                    </div>

                </div>


                <div class="row my-row">
                    <label for="telephone" class="control-label col-sm-2"> Telephone </label>
                    <div class="col-sm-4">
                        <input required type="text" name="telephone" id="telephone" class="form-control">
                    </div>

                    <label for="email" class="control-label col-sm-2">Email </label>
                    <div class="col-sm-4">
                        <input required type="email" name="email" id="email" class="form-control">
                    </div>

                </div>

                <div class="row my-row">
                    <label for="date_e" class="control-label col-sm-2"> Date de Reservation </label>
                    <div class="col-sm-4">
                        <input required type="text" name="date_e" id="date_e" class="form-control" placeholder="JJ/MM/AA">
                    </div>

                    <label for="date_f" class="control-label col-sm-2"> Date de remise </label>
                    <div class="col-sm-4">
                        <input required type="text" name="date_f" id="date_f" class="form-control" placeholder="JJ/MM/AA">
                    </div>

                </div>

                
                


                <div class="row my-row">

                    <label class="control-label col-sm-2"> Velos: </label>
                    <div class="col-sm-4">
                        <select class="form-control" name="id_velo">

                            <?php foreach ($tous_les_velos as $velo) { ?>
                                <option value="<?php echo $velo['id'] ?>">
                                    <?php echo $velo['nom'] ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>
                    <label class="control-label col-sm-2"> Agences: </label>
                    <div class="col-sm-4">
                        <select class="form-control" name="id_agence">

                            <?php foreach ($tous_les_agences as $agence) { ?>
                                <option value="<?php echo $agence['id'] ?>">
                                    <?php echo $agence['nom'] ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>

                    <br><br>
                </div>

            

                <button type='submit' onClick='printt()' class="btn btn-success"> Enregistrer la reservation</button></a>

            </form>
        </div>
    </div>
</div>
</body>
</html>
