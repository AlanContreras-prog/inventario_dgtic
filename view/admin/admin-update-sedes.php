<?php

/**************************************************
 * pantalla: archivo para editar/actualizar sede  *
 * date: 17/06/2023                               *
 * autor: Roan                                    *
 **************************************************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include(CONNECTION_BD);

include(BD_SELECT . 'select-sedes.php');
include(VALIDATION_PHP. '/validate-updateSede.php');

/* INSTANCIA PARA LA CLASE "SelectSedes"*/
$sedes = new SelectSedes();
//Llamás al método sedes y guardar los datos en la variable "infoSedes"
$infoSedes = $sedes -> getSedesById($_GET['id']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(LAYOUT."/head.php");?>
</head>
<body>
    <?php include(LAYOUT."/header.php");?>
    <?php include(LAYOUT."/navbar-users/navbarAdmin.php");?>

    <h2 class="titulo">Editar Sede</h2>
    
    <div class="container text-container sombra">
        <table class="table tabla-sede">
            <thead class="encabezado">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Sede</th>
                    <th scope="col">Siglas</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>                                           
                <?php
                    foreach ($infoSedes as $infoSedes){
                ?>
                <form action="" method="post">
                <tr>
                    <th>
                        <input type="hidden" name="IdSede" value="<?php echo $infoSedes['Sede_id']; ?>">
                    </th>
                    <th scope="row">
                        <input type="text" class="form-control form-control-lg g-3" name="NombreSede" value="<?php echo $infoSedes['SedeNombre'];?>">
                    </th>
                    <td>
                        <input type="text" class="form-control form-control-lg g-3" name="SedeSiglas" value="<?php echo $infoSedes['SedeSiglas'];?>">
                    </td>
                    <td class="btn-tabla-container">
                        <button type="submit" name="actualizar" class="btn btn-primary btn-tabla">Actualizar</button>
                        <button type="submit" name="cancelar" class="btn btn-primary btn-tabla">Cancelar</button>
                    </td>
                </tr>
                </form>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="/inventario_dgtic/view/js/dynamic_inputs/addSede.js"></script>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>
    <?php include(LAYOUT."/footer.php");?>
</body>
</html>