<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $carpeta_destino = 'public\pdf'; //  ruta de carpeta destino

    // Manejar el archivo de material
    if (isset($_FILES['PDFMaterial'])) {
        $material_subido = $carpeta_destino . basename($_FILES['PDFMaterial']['name']);

        if (move_uploaded_file($_FILES['PDFMaterial']['tmp_name'], $material_subido)) {
            echo "El archivo de material se ha subido correctamente.";
        } else {
            echo "Hubo un error al subir el archivo de material.";
        }
    }

    // Manejar el archivo de índice
    if (isset($_FILES['PDFIndice'])) {
        $indice_subido = $carpeta_destino . basename($_FILES['PDFIndice']['name']);

        if (move_uploaded_file($_FILES['PDFIndice']['tmp_name'], $indice_subido)) {
            echo "El archivo de índice se ha subido correctamente.";
        } else {
            echo "Hubo un error al subir el archivo de índice.";
        }
    }
} else {
    echo "Por favor, selecciona los archivos PDF para subir.";
}
?>
