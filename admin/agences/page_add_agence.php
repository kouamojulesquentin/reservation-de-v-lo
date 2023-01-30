<?php
require('../utilisateurs/ma_session.php');
require('../utilisateurs/mon_role.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> Nouvelle agence </title>
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
        <div class="panel-heading" align="center"> Nouvelle agence</div>
        <div class="panel-body">

            <form method="post" action="insert_agence.php">
           <center> 
            <div class="row my-row" >
                <div class="row my-row">
                    <label for="nom" class="control-label col-sm-2"> Nom </label>
                    <div class="col-sm-4">
                        <input type="text" name="nom" id="nom" class="form-control">
                    </div>
                </div>
                <div class="row my-row">
                    <label for="ville" class="control-label col-sm-2"> Ville </label>
                    <div class="col-sm-4">
                        <select name="ville" id="ville" class="form-control">
								<option value="yaounde"   >Yaounde</option>
								<option value="douala"     >Douala</option>
								<option value="bafoussam"  >Bafoussam</option>
								<option value="maroua"  >Maroua</option>
								<option value="ebolowa"  >Ebolowa</option>
								<option value="bertoua"  >Bertoua</option>
								<option value="ngaoundere"  >Ngaoundere</option>
								<option value="garoua"  >Garoua</option>
								<option value="limbe"  >Limbe</option>
								<option value="bamenda" >Bamenda</option>
                        </select>

                    </div>

                </div>

                <div class="row my-row">
                    <label for="adresse" class="control-label col-sm-2"> Adresse </label>
                    <div class="col-sm-4">
                        <input type="text" name="adresse" id="adresse" class="form-control">
                    </div>
 
                </div>
                <div class="row my-row">
                    <label for="telephone" class="control-label col-sm-2"> Telephone </label>
                    <div class="col-sm-4">
                        <input type="text" name="telephone" id="telephone" class="form-control">
                    </div>
 
                </div>
                <div class="row my-row">
                    <label for="text" class="control-label col-sm-2"> Email </label>
                    <div class="col-sm-4">
                        <input type="text" name="email" id="email" class="form-control">
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
