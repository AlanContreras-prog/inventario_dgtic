<?php
/*********************************
 * date: 28/04/2023              *
 * autor: Roan                   *
 *********************************/

    class SelectUser{

        public $connection;

        public function __construct()
        {   
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el SELECT en la tabla de usuario.
        */
        public function getDatosUser(){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "SELECT u.Usuario_Id, u.UsuarioNombre, u.UsuarioApaterno, u.UsuarioAmaterno, u.UsuarioCorreo, u.UsuarioRol, u.UsuarioEstado, s.sedeNombre FROM usuario as u INNER JOIN sedes as s ON u.Sede_Id = s.Sede_Id WHERE u.UsuarioRol NOT LIKE 'administrador'";
                $queryP = $connect -> prepare($query);
                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            return $resultado;
        }
        /**
        * Realiza el SELECT en la tabla de usuario por id.
        */
        public function getDatosUserById($idUser){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "SELECT u.Usuario_Id, u.UsuarioNombre, u.UsuarioApaterno, u.UsuarioAmaterno, u.UsuarioCorreo, u.UsuarioRol, s.sedeNombre FROM usuario as u INNER JOIN sedes as s ON u.Sede_Id = s.Sede_Id WHERE u.Usuario_Id = :Usuario_id";

                $queryP = $connect -> prepare($query);
                $queryP->bindValue(":Usuario_id", $idUser);
                
                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            return $resultado;
        }
        /**
        * Realiza el SELECT en la tabla de usuario en base a una busqueda por nombre de usuario.
        */
        public function getUserName($busqueda){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "SELECT u.Usuario_Id, u.UsuarioNombre, u.UsuarioApaterno, u.UsuarioAmaterno, u.UsuarioCorreo, u.UsuarioRol, u.UsuarioEstado, s.sedeNombre
                FROM usuario as u INNER JOIN sedes as s ON u.Sede_Id = s.Sede_Id
                WHERE u.UsuarioRol NOT LIKE 'administrador' AND u.UsuarioNombre LIKE :busqueda";

                $queryP = $connect -> prepare($query);

                $queryP->bindValue(":busqueda", '%'. $busqueda .'%');

                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            if(sizeof($resultado) > 0){
                return $resultado;
            }elseif(sizeof($resultado) == 0){
                return FALSE;
            }
        }
        /**
        * Realiza el SELECT en la tabla de usuario en base a una busqueda por apellido paterno de usuario.
        */
        public function getUserApaterno($busqueda){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "SELECT u.Usuario_Id, u.UsuarioNombre, u.UsuarioApaterno, u.UsuarioAmaterno, u.UsuarioCorreo, u.UsuarioRol, u.UsuarioEstado, s.sedeNombre
                FROM usuario as u INNER JOIN sedes as s ON u.Sede_Id = s.Sede_Id
                WHERE u.UsuarioRol NOT LIKE 'administrador' AND u.UsuarioApaterno LIKE :busqueda";

                $queryP = $connect -> prepare($query);

                $queryP->bindValue(":busqueda", '%'. $busqueda .'%');

                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
            if(sizeof($resultado) > 0){
                return $resultado;
            }elseif(sizeof($resultado) == 0){
                return FALSE;
            }
        }
        /**
        * Realiza el SELECT en la tabla de usuario en base a una busqueda por apellido paterno de usuario.
        */
        public function getUserAmaterno($busqueda){
            try {
                $connect = $this->connection -> conectar();
                
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();
                
                $query = "SELECT u.Usuario_Id, u.UsuarioNombre, u.UsuarioApaterno, u.UsuarioAmaterno, u.UsuarioCorreo, u.UsuarioRol, u.UsuarioEstado, s.sedeNombre
                FROM usuario as u INNER JOIN sedes as s ON u.Sede_Id = s.Sede_Id
                WHERE u.UsuarioRol NOT LIKE 'administrador' AND u.UsuarioAmaterno LIKE :busqueda";

                $queryP = $connect -> prepare($query);

                $queryP->bindValue(":busqueda", '%'. $busqueda .'%');

                $queryP -> execute();
                $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $ex) {
                echo 'Error: ' .$ex->getMessage() . die();
            }
                return $resultado;
        }
    }
?>