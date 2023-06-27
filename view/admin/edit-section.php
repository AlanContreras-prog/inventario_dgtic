<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include(LAYOUT . "/head.php"); ?>
</head>

<body>
    <?php include(LAYOUT . "/header.php"); ?>
    <?php include(LAYOUT . "/navbar-users/navbarAdmin.php"); ?>
    <?php
include(CONNECTION_BD);
include(BD_SELECT . 'select-section.php');
include(VALIDATION_PHP . '/validate-createSection.php');
include(VALIDATION_PHP . '/validate-update-section.php');
//Instancia de la clase SelectSection
$section = new SelectSection();
//Recibir el id de la seccion por medio de GET
$sectionId = $_GET['id'];
//Guardar información de secciones
$infoSection = $section->getSectionById($sectionId);

?>
<h1 class="titulo">Administrar Secciones</h1>
<div class="container text-container sombra">
    <table class="table tabla-sede">
        <thead class="encabezado">
            <tr>
                <th> </th>
                <th>Área</th>
                <th>Tipo</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($infoSection as $infoSection) {
                $tipo = $infoSection['TipoSeccion'];
            ?>
                <form action="" method="post">
                    <tr>
                        <th>
                            <input type="hidden" name="seccionId" value="<?php echo $infoSection['Seccion_Id']; ?>">
                        </th>
                        <th>
                            <input type="text" name="seccionNombre" class="form-control form-control-lg g-3" value="<?php echo $infoSection['SeccionNombre']; ?>">
                        </th>
                        <td>
                            <select class="form-select form-select-lg mb-3 form-control-lg" name="TipoSeccion" aria-label=".form-select-lg example" required>
                                <option <?php echo ($tipo == 'Cursos de actualización') ? "selected" : " "?> value="Cursos de actualización">Cursos de actualización</option>
                                <option <?php echo ($tipo == 'Institucionales') ? "selected" : " "?> value="Institucionales">Institucionales</option>
                            </select>
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
</body>

</html>