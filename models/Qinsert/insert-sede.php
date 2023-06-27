<?php
    //Se importa el archivo para conectarse a la bd    
    class InsertSede{
        //Conexion
        public $connection;
        
        //Método constructor para instanciar la clase Conexion
        public function __construct()
        {
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el INSERT en la tabla de usuario.
        * @param integer $datosSede arreglo que contiene los datos de la sede
        *               $datosSede[SedeNombre], $datosSede[SedeSiglas]
        */
        public function registrarSede($datosSede)
        {
            try {
                //Se realiza la conexión a la base de datos.
                $connect = $this->connection->conectar();

                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();

                $query = 'INSERT INTO sedes (SedeNombre, SedeSiglas, SedeEstado) VALUES (:SedeNombre, :SedeSiglas, :SedeEstado)';

                $queryP = $connect->prepare($query);

                $queryP->bindValue(":SedeNombre", $datosSede['nombre']);
                $queryP->bindValue(":SedeSiglas", $datosSede['siglas']);
                $queryP->bindValue(":SedeEstado", $datosSede['estado']);

                $queryP->execute();
                $connect->commit();

                return TRUE;

            } catch (PDOException $ex) {
                print "Error:" . $ex->getMessage() . die();
                $connect->rollback();
                return FALSE;
            }
        }

    }

?>