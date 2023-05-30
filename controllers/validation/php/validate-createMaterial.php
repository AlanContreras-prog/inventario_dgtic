<?php 
    /******************************************************
     * Archivo: Validar formulario para "Subir Material"  *
     * Author:                                            *
     * Date: 06/05/23                                     *
    *******************************************************/
    include(BD_INSERT . 'insert-material.php');
    if(isset($_POST['guardarMaterial'])){
        //QUITAR ESPACIOS EN BLANCO U OTRO TIPO DE CARÁCTERES AL INICIO Y AL FINAL DE LA CADENA
        //DESPUÉS SE ALMACENA EN UNA VARIABLE   
        $nameMaterial = trim($_POST['NombreMaterial'], ' \t\n\r\0\x0');
        $auditoriaMaterial = trim($_POST['tipo'], ' \t\r\0\x0');
        $compilacionMaterial= trim($_POST['tipo'], ' \t\n\r\0\x0');
        $isbnMaterial= trim($_POST['ISBN'], ' \t\n\r\0\x0');
        $tirajeMaterial= trim($_POST['Tiraje'], ' \t\n\r\0\x0');
        $autorMaterial= trim($_POST['Autor'], ' \t\n\r\0\x0');
        $versiónMaterial= trim($_POST['Versión'], ' \t\n\r\0\x0');
        $añoEdicionMaterial= trim($_POST['AñoEdicion'], ' \t\n\r\0\x0');
        $noPaginasMaterial= trim($_POST['NoPaginas'], ' \t\n\r\0\x0');
        $seccionMaterial= trim($_POST['seccion'], ' \t\n\r\0\x0');
        $areaMaterial= trim($_POST['area'], ' \t\n\r\0\x0');
        $pdfMaterial= trim($_POST['PDFMaterial'], ' \t\n\r\0\x0');
        $pdfIndice= trim($_POST['PDFIndice'], ' \t\n\r\0\x0');

        // almacenar en un array todos los valores ya limpios.
        $material = array(
            'nameMaterial' => $nameMaterial,
            'auditoriaMaterial' => $auditoriaMaterial,
            'compilacionMaterial' => $compilacionMaterial,
            'isbnMaterial' => $isbnMaterial,
            'tirajeMaterial' => $tirajeMaterial,
            'autorMaterial' => $autorMaterial,
            'versiónMaterial' => $versiónMaterial,
            'añoEdicionMaterial' => $añoEdicionMaterial,
            'noPaginasMaterial' => $noPaginasMaterial,
            'seccionMaterial' => $seccionMaterial,
            'areaMaterial' => $areaMaterial,
            'pdfMaterial' => $pdfMaterial,
            'pdfIndice' => $pdfIndice
        );

        //Instancia de la clase InsertMaterial para realizar el registro.
        $materialRegistro = new InsertMaterial();
        if($materialRegistro -> registrarMaterial($material)){
            echo 'Registro realizado';
        }else{
            echo 'Registro fallido';
        }
    }
?>

