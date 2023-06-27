<?php
/*********************************
 * date: 06/05/2023              *
 * autor: Roan                   *
 *********************************/

    include(CONNECTION_BD);

    class SelectDiplomados{

        public $connection;

        public function __construct()
        {   
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el SELECT en la tabla de usuario.
        */
        public function getDiplomado(){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "SELECT Diplomado_Id, DiplomadoNombre, DiplomadoEmision, DiplomadoEstado FROM diplomado";
                $queryP = $connect -> prepare($query);
                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            return $resultado;
        }
        /**
        * Realiza el SELECT en la tabla de usuario.
        */
        public function getDiplomadoById($diplomadoId){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "SELECT DiplomadoNombre, DiplomadoEmision, DiplomadoEstado FROM diplomado WHERE Diplomado_Id = :Diplomado_Id";
                $queryP = $connect -> prepare($query);
                $queryP->bindValue(":Diplomado_Id", $diplomadoId);
                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            return $resultado;
        }
    }
?>