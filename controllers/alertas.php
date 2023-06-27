<!-- Links para que funciones las alertas con sweetalert -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<?php
    class Alerta{
        public $titulo;
        public $txtBoton;

        public function __construct($titulo, $txtBoton){
            $this -> titulo = $titulo;
            // $this -> texto = $texto;
            $this -> txtBoton = $txtBoton;
        }

        public function success(){
            $success = "
                <script>
                    swal({
                        title: '".$this->titulo."',
                        icon: 'success',
                        button: '".$this->txtBoton."',
                    });
                </script>
            ";

            return $success;
        }

        public function error(){
            $error = "
            <script>
                swal({
                    title: '".$this->titulo."',
                    icon: 'error',
                    button: '".$this->txtBoton."',
                });
            </script>
        ";
        return $error;
        }

        public function warning(){
            $error = "
            <script>
                swal({
                    title: '".$this->titulo."',
                    icon: 'warning',
                    button: '".$this->txtBoton."',
                });
            </script>
        ";
        return $error;
        }

    }
?>