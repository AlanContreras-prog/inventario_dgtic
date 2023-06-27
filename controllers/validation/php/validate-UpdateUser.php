<?php
    /********************************************************
     * Archivo: realiza la configuracion para deshabilitrar *
     *          a un usuario                                *
     * Author: Roan                                         *
     * Date: 05/22/23                                       *  
     *******************************************************/

     //DESHABILITAR A UN USUARIO\
    if(isset($_POST['deshabilitar'])){
        //Recibiendo en ID del usuario a deshabilitar
        $id = $_POST['idUser'];
        
        //Instancia de la clase DeshabilitarUser para realizar el registro.
        $UpdateUser = new UpdateUser();
        if($UpdateUser->deshabilitarUser($id)){
            echo 'Usuario Deshabilitado';
        }else{
            echo 'Error al deshabilitar';
        }
    }

    //HABILITAR A UN USUARIO
    if(isset($_POST['habilitar'])){
        //Recibiendo el id del usuario que se va a habilitar
        $id = $_POST['idUser'];
        //Instancia de la clase DeshabilitarUser para realizar el registro.
        $UpdateUser = new UpdateUser();
        if($UpdateUser->habilitarUser($id)){
            echo 'Usuario habilitado';
        }else{
            echo 'error';
        }
    }

    //ELIMINAR A UN USUARIO
    if(isset($_POST['eliminar'])){
        //Recibiendo el id del usuario que se va a eliminar
        $id = $_POST['idUser'];
        //Instancia de la clase DeshabilitarUser para realizar el registro.
        $UpdateUser = new UpdateUser();
        if($UpdateUser->eliminarUser($id)){
            echo 'Usuario eliminado';
        }else{
            echo 'error';
        }
    }

    //ACTUALIZAR A UN USUARIO
    if(isset($_POST['editar'])){
        //url de la pestaña admin update user
        $adminUpdateUser = 'admin-update-user.php';

        $userId = $_POST['idUser'];
        //Redireccionando a la página con el id del usuario que se va a editar.
        header("location: $adminUpdateUser?id=$userId");
        die();
    }

    //Actualizar datos de usuario
    if (isset($_POST['actualizar'])) {
        //Obtener datos que se van a actualizar.
        $idUser = $_POST['idUser'];
        $nombre = $_POST['nombreUser'];
        $apaterno = $_POST['apaternoUser'];
        $amaterno = $_POST['amaternoUser'];
        $correo = $_POST['correoUser'];
        $rol = $_POST['rolUser'];
        $sede = $_POST['sedeUser'];

        //Crear array para los datos
        $datosUser = array(
            'UserId' => $idUser,
            'NombreUser' => $nombre,
            'ApaternoUser' => $apaterno,
            'AmaternoUser' => $amaterno,
            'CorreoUser' => $correo,
            'RolUser' => $rol,
            'SedeUser' => $sede
        );

        //Llamar al metodo para actualizar datos
        $UpdateUser = new UpdateUser();
        if($UpdateUser -> actualizarUsuario($datosUser)){
            header("location: $manageAccount");
            die();
        }else{
            echo 'error al acutalizar datos';
        }
    } elseif (isset($_POST['cancelar'])) {
        header("location: $manageAccount");
        die();
    }
    
?>