<!DOCTYPE html>
<html lang="fr">

<?php $html = ""; ?>

<head>
    <link rel="stylesheet" href="front/assets/css/panelAdmin.css">
    <link rel="stylesheet" href="front/assets/css/main.css"/>
</head>

<body>
<br><br><br><br>
<h1 style="text-align: center">Sélectionner la table</h1>
<br>

<form id="tableForm" action="" method="POST">

    <input class="btn btn-outline-dark mb-2" name="buttonTableGestion" type="submit" id="RubriqueButton"
           class="buttonTableGestion" value="Rubrique"/>

    <input class="btn btn-outline-dark mb-2" name="buttonTableGestion" type="submit" id="ElementButton"
           class="buttonTableGestion" value="Element"/>

</form>
</body>

</html>