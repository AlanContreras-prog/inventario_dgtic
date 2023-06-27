<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include(LAYOUT . "/head.php"); ?>
</head>

<body>
    <?php include(LAYOUT . "/header.php"); ?>
    <?php include(LAYOUT . "/navbar-users/navbarEditor.php"); ?>
    <?php
include(BD_SELECT . 'select-diplomados.php');
include(VALIDATION_PHP . '/validate-createDiplomado.php');
include(VALIDATION_PHP . '/validate-update-diplomado.php');
//instancia de la clase SelectDiplomados
$diplomado = new SelectDiplomados();
//Guardar el id del diplomado a editar
$diplomadoId = $_GET['id'];
//Guardar la información de los diplomados
$infoDiplomado = $diplomado->getDiplomadoById($diplomadoId);
?>
<h1 class="titulo">Editar Diplomado</h1>
<div class="container text-container sombra">
    <table class="table tabla-sede">
        <thead class="encabezado">
            <tr>
                <th>Diplomado</th>
                <th>Emisión</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($infoDiplomado as $infoDiplomado) {
            ?>
                <form action="" method="post">
                    <tr>
                        <th>
                            <input type="text" name="diplomadoNombre" class="form-control form-control-lg g-3" value="<?php echo $infoDiplomado['DiplomadoNombre']; ?>">
                        </th>
                        <td>
                            <input type="text" name="diplomadoEmision" class="form-control form-control-lg g-3" value="<?php echo $infoDiplomado['DiplomadoEmision']; ?>">
                        </td>
                        <td class="btn-tabla-container">
                            <button type="submit" name="actualizarEditor" class="btn btn-primary btn-tabla">Actualizar</button>
                            <button type="submit" name="cancelarEditor" class="btn btn-primary btn-tabla">Cancelar</button>
                        </td>
                    </tr>
                </form>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>

</html>