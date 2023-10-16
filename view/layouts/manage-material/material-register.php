<?php 
include(CONNECTION_BD);
include(VALIDATION_PHP . '/validate-createMaterial.php');
?>

<h2 class="titulo">Registrar Material</h2>
    <form class="container col-md-12 col-sm-4 formulario needs-validation" method="post" novalidate>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="NombreMaterial">Nombre de material</label>
                <input name="NombreMaterial" class="form-control form-control-lg" type="text" placeholder="Nombre de material" required>
                <div class="invalid-feedback">
                    Es necesario colocar un nombre.
                </div>
            </div>
            <div class="col p-3">
                <div class="form-check m-2">
                    
                    <input class="form-check-input" onclick="showISBN();" type="radio" name="tipo" id="autoria" value="autoria" checked>
                    <label class="form-check-label" for="tipo">
                        Autoría
                    </label>
                </div>
                <div class="form-check m-2">
                
                    <input class="form-check-input" onclick="showTiraje();" type="radio" name="tipo" id="compilacion" value="compilacion" checked>
                    <label class="form-check-label" for="tipo">
                        Compilación
                    </label>
                </div>
            </div>
            <div class="col" id="ISBN">
                <label for="ISBN">ISBN</label>
                <input name="ISBN" class="form-control form-control-lg" type="text" placeholder="ISBN" >
                <div class="invalid-feedback">
                    Es necesario colocar un ISBN
                </div>
            </div>
            <div class="col" id="Tiraje">
                <label for="Tiraje">Tiraje</label>
                <input name="Tiraje" class="form-control form-control-lg" type="text" placeholder="Tiraje" >
                <div class="invalid-feedback">
                    Es necesario colocar un Tiraje.
                </div>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col">
                <label for="Autor">Autor</label>
                <input name="Autor" class="form-control form-control-lg" type="text" placeholder="Autor" required>
                <div class="invalid-feedback">
                    Es necesario colocar un Autor.
                </div>
            </div>
            <div class="col">
                <label for="Versión">Versión</label>
                <input name="Versión" class="form-control form-control-lg" type="text" placeholder="Versión de material" required>
                <div class="invalid-feedback">
                    Es necesario colocar una versión.
                </div>
            </div>
            <div class="col">
                <label for="AñoEdicion">Año de edición</label>
                <input name="AñoEdicion" class="form-control form-control-lg" type="text" placeholder="Año de edición" required>
                <div class="invalid-feedback">
                    Es necesario colocar un año de edición.
                </div>
            </div>
            <div class="col">
                <label for="NoPaginas">Número de páginas</label>
                <input name="NoPaginas" class="form-control form-control-lg" type="text" placeholder="Número de páginas" required>
                <div class="invalid-feedback">
                    Es necesario colocar un número de páginas.
                </div>
            </div>
        </div>
        
       <div class="col">
    <label for="tipoSeccion">Tipo de Sección</label>
    <select name="tipoSeccion" id="tipoSeccion" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
        <!-- La leyenda "Selecciona un tipo de sección" aparecerá una sola vez -->
        <option selected disabled value="">Selecciona un tipo de sección</option>
        <!-- Las opciones de tipo de sección se cargarán dinámicamente -->
        <option value="Diplomados">Diplomados</option> <!-- Opción para Diplomados -->
    </select>
    <div class="invalid-feedback">
        Es necesario seleccionar un tipo de sección
    </div>
</div>

<div class="col">
    <label for="seccion">Sección del material</label>
    <select name="seccion" id="seccion" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
        <option selected disabled value="">Selecciona una sección</option>
        <!-- Las opciones de sección se cargarán dinámicamente -->
    </select>
    <div class="invalid-feedback">
        Es necesario seleccionar una sección
    </div>
</div>






<script>
// Obtén los elementos select
const tipoSeccionSelect = document.getElementById('tipoSeccion');
const seccionSelect = document.getElementById('seccion');

// Realizar una solicitud AJAX para obtener los tipos de sección desde el servidor
fetch('http://localhost/inventario_dgtic/models/Qselect/obtener_tipos_seccion.php')
.then(response => response.text()) // Obtener el texto en lugar de JSON
.then(tiposSeccion => {
    // Limpiar las opciones actuales del select de "Tipo de Sección"
    tipoSeccionSelect.innerHTML = '<option selected disabled default value="">Selecciona un tipo de sección</option>';
    
    // Agregar las nuevas opciones al select de "Tipo de Sección"
    tipoSeccionSelect.innerHTML += tiposSeccion;

    // Agregar la opción "Diplomados" al tipo de sección
    tipoSeccionSelect.innerHTML += '<option value="Diplomados">Diplomados</option>';
})
.catch(error => console.error('Error:', error));

// Agregar un evento change al select de "Tipo de Sección" para cargar las opciones de "Sección" desde el servidor
tipoSeccionSelect.addEventListener('change', () => {
    const tipoSeccionSeleccionado = tipoSeccionSelect.value;

    if (tipoSeccionSeleccionado === 'Diplomados') {
        // Si se selecciona "Diplomados," realizar una solicitud AJAX para cargar nombres de diplomados
        fetch('http://localhost/inventario_dgtic/models/Qselect/obtener_diplomados.php')
        .then(response => response.text()) // Obtener el texto en lugar de JSON
        .then(diplomados => {
            // Limpiar las opciones actuales del select de "Sección"
            seccionSelect.innerHTML = '<option selected disabled default value="">Selecciona una sección</option>';
            // Agregar las nuevas opciones de diplomados al select de "Sección"
            seccionSelect.innerHTML += diplomados;
        })
        .catch(error => console.error('Error:', error));
    } else {
        // Si se selecciona otra opción, realiza la solicitud AJAX normal para cargar secciones
        fetch(`http://localhost/inventario_dgtic/models/Qselect/obtener_secciones.php?tipoSeccion=${tipoSeccionSeleccionado}`)
        .then(response => response.text()) // Obtener el texto en lugar de JSON
        .then(secciones => {
            // Limpiar las opciones actuales del select de "Sección"
            seccionSelect.innerHTML = '<option selected disabled default value="">Selecciona una sección</option>';
            // Agregar las nuevas opciones al select de "Sección"
            seccionSelect.innerHTML += secciones;
        })
        .catch(error => console.error('Error:', error));
    }
});
</script>


        <div class="row g-3 mb-3">
        <form action="subir_archivos.php" method="post" enctype="multipart/form-data">
        <div class="col">
            <label for="subirMaterial" class="form-label">Subir material</label>
            <input class="form-control" type="file" name="PDFMaterial" id="subirMaterial" required>
            <div class="invalid-feedback">
                Es necesario subir un archivo.
            </div>
        </div>
        <div class="col">
            <label for="subirIndice" class="form-label">Subir índice</label>
            <input class="form-control" type="file" name="PDFIndice" id="subirIndice" required>
            <div class="invalid-feedback">
                Es necesario subir un archivo.
            </div>
        </div>
    </form>
            <div class="col-md-12">
                <label for="guardarMaterial"> </label>
                <input name="guardarMaterial" class="btn btn-primary botonCreateuser" type="submit" value="Guardar material">
            </div>
        </div>
    </form>
    <script src="/inventario_dgtic/view/js/dynamic_inputs/showHideInputs.js"></script>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>