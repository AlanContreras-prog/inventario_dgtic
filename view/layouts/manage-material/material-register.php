<?php

/********************************
 * pantalla: registrar material *
 * date: 09/03/2023             *
 * autor: Roan                  *
 ********************************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
?>

<!DOCTYPE html>
<html lang="es">
<?php include(LAYOUT . '/head.php'); ?>

<body>
    <?php include(LAYOUT . '/header.php'); ?>
    <?php include(LAYOUT . '/navbar.php'); ?>

    <h2 class="titulo">Registrar Material</h2>
    <form class="container col-md-12 col-sm-4 formulario" action="" method="post">
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="NombreMaterial">Nombre de material</label>
                <input name="NombreMaterial" class="form-control form-control-lg" type="text" placeholder="Nombre de material">
            </div>
            <div class="col p-3">
                <div class="form-check m-2">
                    <input class="form-check-input" type="radio" name="tipo" id="auditoria">
                    <label class="form-check-label" for="tipo">
                        Auditoría
                    </label>
                </div>
                <div class="form-check m-2">
                    <input class="form-check-input" type="radio" name="tipo" id="compilacion" checked>
                    <label class="form-check-label" for="tipo">
                        Compilación
                    </label>
                </div>
            </div>
            <div class="col">
                <label for="ISBN">ISBN</label>
                <input name="ISBN" class="form-control form-control-lg" type="text" placeholder="ISBN">
            </div>
            <div class="col">
                <label for="Tiraje">Tiraje</label>
                <input name="Tiraje" class="form-control form-control-lg" type="text" placeholder="Tiraje">
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="Autor">Autor</label>
                <input name="Autor" class="form-control form-control-lg" type="text" placeholder="Autor">
            </div>
            <div class="col">
                <label for="Versión">Versión</label>
                <input name="Versión" class="form-control form-control-lg" type="text" placeholder="Versión de material">
            </div>
            <div class="col">
                <label for="AñoEdicion">Año de edición</label>
                <input name="AñoEdicion" class="form-control form-control-lg" type="text" placeholder="Año de edición">
            </div>
            <div class="col">
                <label for="NoPaginas">Número de páginas</label>
                <input name="NoPaginas" class="form-control form-control-lg" type="text" placeholder="Número de páginas">
            </div>

        </div>
        <div class="row g-9 mb-3">
            <div class="col">
                <label for="seccion">Sección del material</label>
                <select name= "seccion" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected disabled default>Selecciona una opción</option>
                    <option value="Cursos de actualización">Cursos de actualización</option>
                    <option value="Diplomados">Diplomados</option>
                    <option value="Institucionales">Institucionales</option>
                </select>
            </div>
            <div class="col">
                <label for="area">Área del material</label>
                <select name="area" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected disabled default>Selecciona una opción</option>
                    <option value="1">Áreas temáticas</option>
                    <option value="2">Instituciones</option>
                    <option value="3">Emisiones</option>
                </select>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="subirMaterial" class="form-label">Subir material</label>
                <input class="form-control" type="file" id="subirMaterial">
            </div>
            <div class="col">
                <label for="subirIndice" class="form-label">Subir índice</label>
                <input class="form-control" type="file" id="subirIndice">
            </div>
            <div class="col-md-12">
                <label for="guardarMaterial"> </label>
                <input name="guardarMaterial" class="btn btn-primary botonCreateuser" type="submit" value="Guardar material">
            </div>
        </div>

    </form>

    <?php include(LAYOUT . '/footer.php'); ?>
</body>

</html>