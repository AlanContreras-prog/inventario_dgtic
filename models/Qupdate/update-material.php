<?php

    class UpdateMaterial{

        public $connection;

        public function __construct()
        {   
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el UPDATE para habilitar un Material en la tabla de Materiales.
        * @param integer $materialId contiene el id del material que va a ser actualizada
        */
        public function habilitarMaterial($materialId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE material SET EstadoMaterial = 1 WHERE Material_Id = :Material_Id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Material_Id", $materialId);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
        /**
        * Realiza el UPDATE para deshabilitar un Material en la tabla de MAteriales.
        * @param integer $materialId contiene el id del material que va a ser actualizado
        */
        public function deshabilitarMaterial($materialId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE material SET EstadoMaterial = 0 WHERE Material_Id = :Material_Id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Material_Id", $materialId);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
        /**
        * Realiza el UPDATE para eliminar un Material en la tabla de Materiales.
        * @param integer $materialId contiene el id del material que va a ser eliminado
        */
        
        public function eliminarMaterial($materialId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "DELETE FROM material WHERE Material_Id = :Material_Id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Material_Id", $materialId);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
        
        /**
        * Realiza el UPDATE para eliminar un material en la tabla de materiales.
        * @param integer $datosMaterial contiene los datos para actulizar un Material.
        *                   ['id'], ['nombre']...
        */
        
        public function updateMaterial($datosMaterial){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE material SET (MaterialNombre, MaterialAuditoria, MaterialISBN, MaterialTiraje, MaterialAutor, MaterialVersion, 
                    MaterialEdicion, MaterialPaginas, MaterialSeccion, MaterialArea, MaterialPDF, MaterialIndice, EstadoMaterial)
                    VALUES (:MaterialNombre, :MaterialAuditoria, :MaterialISBN, :MaterialTiraje, :MaterialAutor, :MaterialVersion, 
                    :MaterialEdicion, :MaterialPaginas, :MaterialSeccion, :MaterialArea, :MaterialPDF, :MaterialIndice, :EstadoMaterial) WHERE Materal_Id = :Material_Id";

                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Material_Id", $datosMaterial['id']);
                $queryP->bindValue(":MaterialNombre", $datosMaterial['nombre']);
                $queryP->bindValue(":MaterialAuditoria", $datosMaterial['auditoria']);
                $queryP->bindValue(":MaterialISBN", $datosMaterial['isbn']);
                $queryP->bindValue(":MaterialTiraje", $datosMaterial['tiraje']);
                $queryP->bindValue(":MaterialAutor", $datosMaterial['autor']);
                $queryP->bindValue(":MaterialVersion", $datosMaterial['version']);
                $queryP->bindValue(":MaterialEdicion", $datosMaterial['edicion']);
                $queryP->bindValue(":MaterialPaginas", $datosMaterial['paginas']);
                $queryP->bindValue(":MaterialSeccion", $datosMaterial['seccion']);
                $queryP->bindValue(":MaterialArea", $datosMaterial['area']);
                $queryP->bindValue(":MaterialPDF", $datosMaterial['pdf']);
                $queryP->bindValue(":MaterialIndice", $datosMaterial['indice']);
                $queryP->bindValue(":EstadoMaterial", $datosMaterial['estado']);
                
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
    }
?>