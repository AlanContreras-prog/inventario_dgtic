<?php
/*********************************
 * date: 05/22/2023              *
 * autor: Roan                   *
 *********************************/

    class UpdateSection{

        public $connection;

        public function __construct()
        {   
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el UPDATE para habilitar una seccion en la tabla de secciones.
        * @param integer $sectionId contiene el id de la seccion que va a ser actualizada
        */
        public function habilitarSection($sectionId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE secciones SET EstadoSeccion = 1 WHERE Seccion_Id = :Seccion_Id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Seccion_Id", $sectionId);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
        /**
        * Realiza el UPDATE para deshabilitar una seccion en la tabla de secciones.
        * @param integer $sectionId contiene el id de la seccion que va a ser actualizada
        */
        public function deshabilitarSection($sectionId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE secciones SET EstadoSeccion = 0 WHERE Seccion_Id = :Seccion_Id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Seccion_Id", $sectionId);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
        /**
        * Realiza el UPDATE para eliminar una seccion en la tabla de secciones.
        * @param integer $sectionId contiene el id de la seccion que va a ser eliminada
        */
        public function eliminarSection($sectionId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "DELETE FROM secciones WHERE Seccion_Id = :Seccion_Id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Seccion_Id", $sectionId);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
        /**
        * Realiza el UPDATE para eliminar una seccion en la tabla de secciones.
        * @param integer $datosSection contiene los datos para actulizar una seccion.
        *                   ['id'], ['nombre'], ['tipo']
        */
        public function updateSection($datosSection){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE secciones SET SeccionNombre = :SeccionNombre, TipoSeccion = :TipoSeccion WHERE Seccion_Id = :Seccion_Id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Seccion_Id", $datosSection['id']);
                $queryP->bindValue(":SeccionNombre", $datosSection['nombre']);
                $queryP->bindValue(":TipoSeccion", $datosSection['tipo']);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
    }
?>