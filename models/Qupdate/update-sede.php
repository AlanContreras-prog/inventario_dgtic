<?php
/*********************************
 * date: 05/22/2023              *
 * autor: Roan                   *
 *********************************/

    class UpdateSede{

        public $connection;

        public function __construct()
        {   
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el UPDATE para habilitar una sede en la tabla de sede.
        * @param integer $sedeId contiene el id de la sede que va a ser actualizada
        */
        public function habilitarSede($sedeId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE sedes SET SedeEstado = 1 WHERE Sede_Id = :Sede_id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Sede_id", $sedeId);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }

        /**
        * Realiza el UPDATE para deshabilitar una sede en la tabla de sede.
        * @param integer $sedeId contiene el id de la sede que va a ser actualizada
        */
        public function deshabilitarSede($sedeId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE sedes SET SedeEstado = 0 WHERE Sede_Id = :Sede_id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Sede_id", $sedeId);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }

        /**
        * Realiza el UPDATE para actualizar datos de una sede en la tabla de sede.
        * @param integer $datosSede sede es un arreglo que contiene:
        *                ['idSede'], ['nombre'], ['siglas']
        */
        public function actualizarSede($datosSede){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "UPDATE sedes SET SedeNombre = :SedeNombre, SedeSiglas = :SedeSiglas WHERE Sede_Id = :Sede_id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Sede_id", $datosSede['idSede']);
                $queryP->bindValue(":SedeNombre", $datosSede['nombre']);
                $queryP->bindValue(":SedeSiglas", $datosSede['siglas']);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }

        /**
        * Realiza el Delete para eliminar una sede en la tabla de sede.
        * @param integer $sedeId contiene el id de la sede que va a ser actualizada
        */
        public function eliminarSede($sedeId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "DELETE FROM sedes WHERE Sede_Id = :Sede_id";
    
                $queryP = $connect -> prepare($query);
    
                $queryP->bindValue(":Sede_id", $sedeId);
                
                $queryP -> execute();
                
                return $connect->commit();
    
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
                return FALSE;
            }
        }
    }
?>