<?php

/**********************************
 * pantalla: Configurar password  *
 * date: 28/03/2023               *
 * autor: Roan                    *
 **********************************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(LAYOUT."/head.php");?>
</head>
<body>
    <?php include(LAYOUT."/header.php");?>
    <?php include(LAYOUT."/navbar-users/navbarConsultor.php");?>

    <?php include(LAYOUT."/templates/manage-password.php"); ?>
    
    <?php include(LAYOUT."/footer.php");?>
</body>
</html>