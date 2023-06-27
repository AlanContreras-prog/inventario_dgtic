<?php
    //Se incluye el archivo con la clase para actualizar la diplomado
    include(BD_UPDATE . 'update-diplomado.php');

    //Se instancia la diplomado
    $diplomado = new UpdateDiplomado();

    //Si se selecciono el boton de habilitar la diplomado
    if(isset($_POST['habilitar'])){
        //se recibe el id de la diplomado seleccionada
        $diplomadoId = $_POST['diplomadoId'];
        //Se llama al metodo para habilitar la diplomado
        if($diplomado -> habilitardiplomado($diplomadoId)){
            echo 'habilitado';
        }else{
            echo 'error';
        }
    }

    //Si se selecciona el boton de deshabilitar la diplomado
    if(isset($_POST['deshabilitar'])){
        //Se recibe el id de la diplomado seleccionada
        $diplomadoId = $_POST['diplomadoId'];
        //Se llama al metodo para deshabilitar la diplomado
        if($diplomado -> deshabilitardiplomado($diplomadoId)){
            echo 'dehabilitado';
        }else{
            echo 'error';
        }
    }

    //Si se selecciona el boton de eliminar la diplomado
    if(isset($_POST['eliminar'])){
        //Se recibe el id de la diplomado seleccionada
        $diplomadoId = $_POST['diplomadoId'];
        //Se llama al metodo para deshabilitar la diplomado
        if($diplomado -> eliminardiplomado($diplomadoId)){
            echo 'eliminado';
        }else{
            echo 'error';
        }
    }

    //Si se selecciona el boton de editar la diplomado
    if(isset($_POST['editar'])){
        //Se recibe el id de la diplomado seleccionada
        $diplomadoId = $_POST['diplomadoId'];
        //se redirecciona a la pantalla para editar la diplomado
        header('location: edit-diplomado.php?id='.$diplomadoId);
    }

    //Dentro de la ventana para editar la diplomado
    //si selecciona el boton de actualizar
    if(isset($_POST['actualizar'])){
        //recibiendo el id por el metodo GET
        $diplomadoId = $_GET['id'];
        //recibiendo los campos que se actualizaran
        $newdiplomado = $_POST['diplomadoNombre'];
        $newEmision = $_POST['diplomadoEmision'];
        //Guardando todos los datos en un array
        $datosdiplomado = array(
            'id' => $diplomadoId,
            'nombre' => $newdiplomado,
            'emision' => $newEmision
        );

        //llamando al metodo para actualizar informacion
        if($diplomado -> updatediplomado($datosdiplomado)){
            echo 'Actualizado';
            header('location: admin-manage-diplomado.php');
        }else{
            echo 'error';
        }
    }

    //Dentro de la ventana para editar la diplomado
    //si selecciona el boton de actualizar
    if(isset($_POST['cancelar'])){
        header('location: admin-manage-diplomado.php');
    }
    //Dentro de la ventana para editar la diplomado
    //si selecciona el boton de actualizar
    if(isset($_POST['actualizarEditor'])){
        //recibiendo el id por el metodo GET
        $diplomadoId = $_GET['id'];
        //recibiendo los campos que se actualizaran
        $newdiplomado = $_POST['diplomadoNombre'];
        $newEmision = $_POST['diplomadoEmision'];
        //Guardando todos los datos en un array
        $datosdiplomado = array(
            'id' => $diplomadoId,
            'nombre' => $newdiplomado,
            'emision' => $newEmision
        );

        //llamando al metodo para actualizar informacion
        if($diplomado -> updatediplomado($datosdiplomado)){
            echo 'Actualizado';
            header('location: editor-manage-diplomados.php');
        }else{
            echo 'error';
        }
    }

    //Dentro de la ventana para editar la diplomado
    //si selecciona el boton de actualizar
    if(isset($_POST['cancelarEditor'])){
        header('location: editor-manage-diplomados.php');
    }
?>