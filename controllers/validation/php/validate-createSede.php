<?php 
    /**************************************************
     * Archivo: Validar formulario para "Crear sedes" *
     * Author: Roan                                   *
     * Date: 06/05/23                                 *
    ***************************************************/
    include(BD_INSERT . 'insert-sede.php');
    
    if(isset($_POST['addSede'])){
        //QUITAR ESPACIOS EN BLANCO U OTRO TIPO DE CARÁCTERES AL INICIO Y AL FINAL DE LA CADENA
        //DESPUÉS SE ALMACENA EN UNA VARIABLE   
        $nombreSede = trim($_POST['sede'], ' \t\n\r\0\x0');
        $siglasSede = trim($_POST['siglas'], ' \t\n\r\0\x0');
        $estadoSede = trim($_POST['sedeEstado'], ' \t\n\r');

        // almacenar en un array todos los valores ya limpios.
        $sede = array(
            'nombre' => $nombreSede,
            'siglas' => $siglasSede,
            'estado' => $estadoSede
        );

        //Instancia de la clase InsertSede para realizar el registro.
        $sedeRegistro = new InsertSede();
        if($sedeRegistro -> registrarSede($sede)){
            echo 'Registro realizado';
        }else{
            echo 'Registro fallido';
        }
    }
?>