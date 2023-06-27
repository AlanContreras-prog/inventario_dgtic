<?php

include(CONNECTION_BD);
//include(BD_SELECT . 'select-material.php');
$sql="select * from materiales";
$result=mysqli_query($con, $sql);
while($row=$result->fetch_assoc()){
    $materialnombre=$row['nombre'];
    $MaterialEdicion=$row['edicion'];
    $MaterialAutor=$row['autor'];
    $MaterialVersion=$row['version'];


echo  '
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary  btn-tabla" data-bs-toggle="modal" data-bs-target="#detalles">
        Detalles
    </button>
    <!-- Modal -->
    <div class="modal fade" id="detalles'.$materialnombre.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detallesLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title titulo" id="staticBackdropLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                <form class="container col-md-12 col-sm-4 formulario" action="" method="post">
                <div class="row g-3 mb-3">
                    <div class="col">
                        <label for="NombreMaterial">Nombre de material</label>
                        <input name="NombreMaterial" class="form-control form-control-lg" type="text" placeholder="Nombre de material" value="'.MaterialNombre.'" disabled>
                        </div>
                        </div>
                </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-tabla" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
';
}
?>