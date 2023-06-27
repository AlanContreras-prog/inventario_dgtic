<?php
    //Se incluye el archivo con la clase para actualizar la seccion
    include(BD_UPDATE . 'update-section.php');

    //Se instancia la seccion
    $section = new UpdateSection();

    //Si se selecciono el boton de habilitar la seccion
    if(isset($_POST['habilitar'])){
        //se recibe el id de la seccion seleccionada
        $seccionId = $_POST['seccionId'];
        //Se llama al metodo para habilitar la seccion
        if($section -> habilitarSection($seccionId)){
            echo 'habilitado';
        }else{
            echo 'error';
        }
    }

    //Si se selecciona el boton de deshabilitar la seccion
    if(isset($_POST['deshabilitar'])){
        //Se recibe el id de la seccion seleccionada
        $seccionId = $_POST['seccionId'];
        //Se llama al metodo para deshabilitar la seccion
        if($section -> deshabilitarSection($seccionId)){
            echo 'dehabilitado';
        }else{
            echo 'error';
        }
    }

    //Si se selecciona el boton de eliminar la seccion
    if(isset($_POST['eliminar'])){
        //Se recibe el id de la seccion seleccionada
        $seccionId = $_POST['seccionId'];
        //Se llama al metodo para deshabilitar la seccion
        if($section -> eliminarSection($seccionId)){
            echo 'eliminado';
        }else{
            echo 'error';
        }
    }

    //Si se selecciona el boton de editar la seccion
    if(isset($_POST['editar'])){
        //Se recibe el id de la seccion seleccionada
        $seccionId = $_POST['seccionId'];
        //se redirecciona a la pantalla para editar la seccion
        header('location: edit-section.php?id='.$seccionId);
    }

    //Dentro de la ventana para editar la seccion
    //si selecciona el boton de actualizar
    if(isset($_POST['actualizar'])){
        //recibiendo el id por el metodo GET
        $seccionId = $_GET['id'];
        //recibiendo los campos que se actualizaran
        $newsection = $_POST['seccionNombre'];
        $newTipo = $_POST['TipoSeccion'];
        //Guardando todos los datos en un array
        $datosSection = array(
            'id' => $seccionId,
            'nombre' => $newsection,
            'tipo' => $newTipo
        );

        //llamando al metodo para actualizar informacion
        if($section -> updateSection($datosSection)){
            echo 'Actualizado';
            header('location: admin-manage-section.php');
        }else{
            echo 'error';
        }
    }

    //Dentro de la ventana para editar la seccion
    //si selecciona el boton de actualizar
    if(isset($_POST['cancelar'])){
        header('location: admin-manage-section.php');
    }
    //Dentro de la ventana para editar la seccion
    //si selecciona el boton de actualizar
    if(isset($_POST['actualizarEditor'])){
        //recibiendo el id por el metodo GET
        $seccionId = $_GET['id'];
        //recibiendo los campos que se actualizaran
        $newsection = $_POST['seccionNombre'];
        $newTipo = $_POST['TipoSeccion'];
        //Guardando todos los datos en un array
        $datosSection = array(
            'id' => $seccionId,
            'nombre' => $newsection,
            'tipo' => $newTipo
        );

        //llamando al metodo para actualizar informacion
        if($section -> updateSection($datosSection)){
            echo 'Actualizado';
            header('location: editor-manage-section.php');
        }else{
            echo 'error';
        }
    }

    //Dentro de la ventana para editar la seccion
    //si selecciona el boton de actualizar
    if(isset($_POST['cancelarEditor'])){
        header('location: editor-manage-section.php');
    }
?>