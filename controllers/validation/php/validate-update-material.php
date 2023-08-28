<?php
    //Se incluye el archivo con la clase para actualizar la seccion
    include(BD_UPDATE . 'update-material.php');

    //Se instancia la seccion
    $material = new UpdateMaterial();
    print_r ($_POST¨["btnupdate"]);
    //Si se selecciono el boton de habilitar la secion
    if(isset($_POST['btnupdate']) == "habilitar"){
        //se recibe el id de la seccion seleccionada
echo "hola";
        $MaterialId = $_POST['materialId'];
        //Se llama al metodo para habilitar la seccion
        if($material -> habilitarMaterial($MaterialId)){
            echo 'habilitado';
        }else{
            echo 'error';
        }
    }

    //Si se selecciona el boton de deshabilitar la seccion
    if(isset($_POST['btnupdate'])== "deshabilitar"){
        //Se recibe el id de la seccion seleccionada
        $MaterialId = $_POST['materialId'];
        //Se llama al metodo para deshabilitar la seccion
        if($material -> deshabilitarMaterial($MaterialId)){
            echo 'dehabilitado';
        }else{
            echo 'error';
        }
    }

    
    //Si se selecciona el boton de eliminar la seccion
    if(isset($_POST['eliminar'])){
        //Se recibe el id de la seccion seleccionada
        $materialId = $_POST['materialId'];
        //Se llama al metodo para deshabilitar la seccion
        if($material -> eliminarMaterial($materialId)){
            echo 'eliminado';
        }else{
            echo 'error';
        }
    }

    //Si se selecciona el boton de editar la seccion
    if(isset($_POST['editar'])){
        //Se recibe el id de la seccion seleccionada
        $materialId = $_POST['materialId'];
        //se redirecciona a la pantalla para editar la seccion
        header('location: edit-material.php?id='.$materialId);
    }

    //Dentro de la ventana para editar la seccion
    //si selecciona el boton de actualizar
    if(isset($_POST['actualizar'])){
        //recibiendo el id por el metodo GET
        $materialId = $_GET['id'];
        //recibiendo los campos que se actualizaran
        $newNombre = $_POST['MaterialNombre'];
        $newAuditoria = $_POST['MaterialAuditoria'];
        $newISBN = $_POST['MaterialISBN'];
        $newTiraje = $_POST['MaterialTiraje'];
        $newAutor = $_POST['MaterialAutor'];
        $newVersion = $_POST['MaterialVersion'];
        $newEdicion = $_POST['MaterialEdicion'];
        $newPaginas = $_POST['MaterialPaginas'];
        $newsection = $_POST['MaterialSection'];
        $newArea = $_POST['MaterialArea'];
        $newPDF = $_POST['MaterialPDF'];
        $newIndice = $_POST['MaterialIndice'];
        $newEstado = $_POST['EstadoMaterial'];

        //Guardando todos los datos en un array
        $datosMaterial = array(
            'id' => $materialId,
            'nombre' => $newNombre,
            'auditoria' => $newAuditoria,
            'isbn' => $newISBN,
            'tiraje' => $newTiraje,
            'autor' => $newAutor,
            'version' => $newVersion,
            'edicion' => $newEdicion,
            'paginas' => $newPaginas,
            'section' => $newsection,
            'area' => $newArea,
            'pdf' => $newPDF,
            'indice' => $newIndice,
            'estado' => $newEstado
        );

        //llamando al metodo para actualizar informacion
        if($material -> updateMaterial($datosMaterial)){
            echo 'Actualizado';
            header('location: admin-material-register.php');
        }else{
            echo 'error';
        }
    }

    //Dentro de la ventana para editar la seccion
    //si selecciona el boton de actualizar
    if(isset($_POST['cancelar'])){
        header('location: admin-material-register.php');
    }
    //Dentro de la ventana para editar la seccion
    //si selecciona el boton de actualizar
    if(isset($_POST['actualizarEditor'])){
        //recibiendo el id por el metodo GET
        $materialId = $_GET['id'];
        //recibiendo los campos que se actualizaran
        $newNombre = $_POST['MaterialNombre'];
        $newAuditoria = $_POST['MaterialAuditoria'];
        $newISBN = $_POST['MaterialISBN'];
        $newTiraje = $_POST['MaterialTiraje'];
        $newAutor = $_POST['MaterialAutor'];
        $newVersion = $_POST['MaterialVersion'];
        $newEdicion = $_POST['MaterialEdicion'];
        $newPaginas = $_POST['MaterialPaginas'];
        $newsection = $_POST['MaterialSection'];
        $newArea = $_POST['MaterialArea'];
        $newPDF = $_POST['MaterialPDF'];
        $newIndice = $_POST['MaterialIndice'];
        $newEstado = $_POST['EstadoMaterial'];

        //Guardando todos los datos en un array
        $datosMaterial = array(
            'id' => $materialId,
            'nombre' => $newNombre,
            'auditoria' => $newAuditoria,
            'isbn' => $newISBN,
            'tiraje' => $newTiraje,
            'autor' => $newAutor,
            'version' => $newVersion,
            'edicion' => $newEdicion,
            'paginas' => $newPaginas,
            'section' => $newsection,
            'area' => $newArea,
            'pdf' => $newPDF,
            'indice' => $newIndice,
            'estado' => $newEstado
        );

        //llamando al metodo para actualizar informacion
        if($material -> updateMaterial($datosMaterial)){
            echo 'Actualizado';
            header('location: editor-manage-material.php');
        }else{
            echo 'error';
        }
    }

    //Dentro de la ventana para editar la seccion
    //si selecciona el boton de actualizar
    if(isset($_POST['cancelarEditor'])){
        header('location: editor-manage-material.php');
    }
    
?>