<?php 
/*********************************
 * date: 06/05/2023              *
 * autor: Roan                   *
 *********************************/
    class SelectSedes{
        
        public $connection;

        public function __construct()
        {
            $this -> connection = new Conexion();
        }

        /*
        * Realiza el select de las sedes registradas en la BD
        */
        public function getSedes(){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "SELECT Sede_id, SedeNombre, SedeSiglas, SedeEstado FROM sedes";
                $queryP = $connect -> prepare($query);
                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            return $resultado;
        }
        /*
        * Realiza el select de las sedes registradas en la BD
        */
        public function getSedesById($sedeId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "SELECT Sede_id, SedeNombre, SedeSiglas, SedeEstado FROM sedes WHERE Sede_Id = :Sede_id";
                $queryP = $connect -> prepare($query);
                $queryP->bindValue(":Sede_id", $sedeId);
                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            return $resultado;
        }
    }
?>