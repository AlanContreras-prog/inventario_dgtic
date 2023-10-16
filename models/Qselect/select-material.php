<?php

 class SelectMaterial{
    public $connection;

    public function __construct()
    {
        $this -> connection = new Conexion();
    }

    /*
    *   Traer los registros de Materiales
    */
    public function getMaterial()
    {
        try {
            $connect = $this -> connection -> conectar(); //Llamamos el método conectar
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->beginTransaction();

            $query = "SELECT Material_Id, MaterialNombre, MaterialAuditoria,  MaterialISBN, MaterialTiraje, MaterialAutor, MaterialVersion, 
            MaterialEdicion, MaterialPaginas, MaterialSeccion, MaterialArea, MaterialPDF, MaterialIndice, EstadoMaterial FROM material";
            $queryP = $connect -> prepare($query);
            $queryP -> execute();
            $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo 'Error: ' .$ex->getMessage() . die();
        }
        return $resultado;
    }
    /*
    *   Traer los registros del material (MaterialNombre, MaterialAuditoria, MaterialISBN, MaterialTiraje, MaterialAutor, MaterialVersion, 
                                          MaterialEdicion, MaterialPaginas, MaterialArea, MaterialPDF, MaterialIndice, EstadoMaterial)
    */
    public function getMaterialById($materialId)
    {
        try {
            $connect = $this -> connection -> conectar(); //Llamamos el método conectar
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->beginTransaction();

            $query = "SELECT Material_Id, MaterialNombre, MaterialAuditoria,  MaterialISBN, MaterialTiraje, MaterialAutor, MaterialVersion, 
            MaterialEdicion, MaterialPaginas, MaterialSeccion, MaterialArea, MaterialPDF, MaterialIndice, EstadoMaterial FROM material WHERE Material_Id = :Material_Id";
            $queryP = $connect -> prepare($query);
            $queryP->bindValue(":Material_Id", $materialId);
            $queryP -> execute();
            $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo 'Error: ' .$ex->getMessage() . die();
        }
        return $resultado;
    }
 }
?>