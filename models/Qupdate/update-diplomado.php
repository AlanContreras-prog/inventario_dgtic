<?php
/*********************************
 * date: 05/22/2023              *
 * autor: Roan                   *
 *********************************/

    class UpdateDiplomado{

        public $connection;

        public function __construct()
        {   
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el UPDATE para habilitar un diplomado en la tabla de diplomado.
        * @param integer $sectionId contiene el id del diplomado que va a ser actualizado
        */
        public function habilitardiplomado($diplomadoId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE diplomado SET DiplomadoEstado = 1 WHERE Diplomado_Id = :Diplomado_Id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Diplomado_Id", $diplomadoId);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
        /**
        * Realiza el UPDATE para deshabilitar un diplomado en la tabla de diplomado.
        * @param integer $diplomadoId contiene el id del diplomado que va a ser actualizado
        */
        public function deshabilitardiplomado($diplomadoId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE diplomado SET DiplomadoEstado = 0 WHERE Diplomado_Id = :Diplomado_Id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Diplomado_Id", $diplomadoId);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
        /**
        * Realiza el UPDATE para eliminar una diplomado en la tabla de diplomado.
        * @param integer $diplomadoId contiene el id del diplomado que va a ser eliminado
        */
        public function eliminardiplomado($diplomadoId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "DELETE FROM diplomado WHERE Diplomado_Id = :Diplomado_Id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Diplomado_Id", $diplomadoId);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
        /**
        * Realiza el UPDATE para actualizar la informacion de un diplomado en la tabla de diplomado.
        * @param integer $datosDiplomado contiene los datos para actulizar un diplomado. 
        *                   ['id'], ['nombre'], ['emision']
        */
        public function updatediplomado($datosDiplomado){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE diplomado SET DiplomadoNombre = :DiplomadoNombre, DiplomadoEmision = :DiplomadoEmision WHERE Diplomado_Id = :Diplomado_Id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Diplomado_Id", $datosDiplomado['id']);
                $queryP->bindValue(":DiplomadoNombre", $datosDiplomado['nombre']);
                $queryP->bindValue(":DiplomadoEmision", $datosDiplomado['emision']);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
    }
?>