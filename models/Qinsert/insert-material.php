<?php
    //Se importa el archivo para conectarse a la bd    
    class InsertMaterial{
        //Conexion
        public $connection;
        
        //Método constructor para instanciar la clase Conexion
        public function __construct()
        {
            $this -> connection = new Conexion();
        }

        /**
        * Realiza el INSERT en la tabla de material.
        * @param integer $datosMaterial arreglo que contiene los datos de los materiales
        *               
        */
        public function registrarMaterial($datosMaterial)
        {
            try {
                //Se realiza la conexión a la base de datos.
                $connect = $this->connection->conectar();

                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connect->beginTransaction();

                $query = 'INSERT INTO material (MaterialNombre, MaterialAuditoria, MaterialCompilacion, MaterialISBN, MaterialTiraje, MaterialAutor, MaterialVersion, 
                                        MaterialEdicion, MaterialPaginas, MaterialSeccion, MaterialArea, MaterialPDF, MaterialIndice)
                         VALUES (:MaterialNombre, :MaterialAuditoria, :MaterialCompilacion, :MaterialISBN, :MaterialTiraje, :MaterialAutor, :MaterialVersion, 
                                    :MaterialEdicion, :MaterialPaginas, :MaterialSeccion, :MaterialArea, :MaterialPDF, :MaterialIndice)';

                $queryP = $connect->prepare($query);

                $queryP->bindValue(":MaterialNombre", $datosMaterial['nameMaterial']);
                $queryP->bindValue(":MaterialAuditoria", $datosMaterial['auditoriaMaterial']);
                $queryP->bindValue(":MaterialCompilacion", $datosMaterial['compilacionMaterial']);
                $queryP->bindValue(":MaterialISBN", $datosMaterial['isbnMaterial']);
                $queryP->bindValue(":MaterialTiraje", $datosMaterial['tirajeMaterial']);
                $queryP->bindValue(":MaterialAutor", $datosMaterial['autorMaterial']);
                $queryP->bindValue(":MaterialVersion", $datosMaterial['versiónMaterial']);
                $queryP->bindValue(":MaterialEdicion", $datosMaterial['añoEdicionMaterial']);
                $queryP->bindValue(":MaterialPaginas", $datosMaterial['noPaginasMaterial']);
                $queryP->bindValue(":MaterialSeccion", $datosMaterial['seccionMaterial']);
                $queryP->bindValue(":MaterialArea", $datosMaterial['areaMaterial']);
                $queryP->bindValue(":MaterialPDF", $datosMaterial['pdfMaterial']);
                $queryP->bindValue(":MaterialIndice", $datosMaterial['pdfIndice']);
                
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