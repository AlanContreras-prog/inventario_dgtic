<?php
/*********************************
 * date: 28/04/2023              *
 * autor: Roan                   *
 *********************************/
 class SelectSection{
    public $connection;

    public function __construct()
    {
        $this -> connection = new Conexion();
    }

    /*
    *   Traer los registros de secciones (SeccionNombre, TipoSeccion)
    */
    public function getSection()
    {
        try {
            $connect = $this -> connection -> conectar(); //Llamamos el método conectar
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->beginTransaction();

            $query = "SELECT Seccion_Id, SeccionNombre, TipoSeccion, EstadoSeccion FROM secciones";
            $queryP = $connect -> prepare($query);
            $queryP -> execute();
            $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo 'Error: ' .$ex->getMessage() . die();
        }
        return $resultado;
    }
    /*
    *   Traer los registros de secciones (SeccionNombre, TipoSeccion)
    */
    public function getSectionById($sectionId)
    {
        try {
            $connect = $this -> connection -> conectar(); //Llamamos el método conectar
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->beginTransaction();

            $query = "SELECT Seccion_Id, SeccionNombre, TipoSeccion, EstadoSeccion FROM secciones WHERE Seccion_Id = :Seccion_Id";
            $queryP = $connect -> prepare($query);
            $queryP->bindValue(":Seccion_Id", $sectionId);
            $queryP -> execute();
            $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo 'Error: ' .$ex->getMessage() . die();
        }
        return $resultado;
    }
 }
?>