<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php 
    include(CONNECTION_BD);
    include(BD_SELECT . 'select-material.php');
    include(VALIDATION_PHP . '/validate-createMaterial.php');   
    include(VALIDATION_PHP . '/validate-update-material.php');
    

    //Instancia de la clase SelectMaterial
    $material = new SelectMaterial();
    //Guardar información de secciones
    $infoMaterial = $material -> getMaterial();
    
?>
<div class="container sombra gestionar-material">
    <table class="table">
        <thead class="encabezado">
            <tr>
            <th scope="col"></th>
                <th scope="col">Nombre de material</th>
                <th scope="col">Año</th>
                <th scope="col">Autor</th>
                <th scope="col">Versión</th>
                <th scope="col">Estado</th>
                <th scope="col"></th>
            </tr>
        </thead>
            <tbody>
                <?php 
                    foreach($infoMaterial as $infoMaterial){
                ?>
                    <tr>   
                    <form action="" method="post">
                        <th> <input type="hidden" name="materialId" value="<?php echo  $infoMaterial['Material_Id']; ?>"> </th>
                        <th><?php echo $infoMaterial['MaterialNombre']; ?></th>
                        <td><?php echo $infoMaterial['MaterialEdicion']; ?></td>
                        <td><?php echo $infoMaterial['MaterialAutor']; ?></td>
                        <td><?php echo $infoMaterial['MaterialVersion']; ?></td>
                        <td><?php echo ($infoMaterial['EstadoMaterial'] == 1) ? "Activo" : "Inactivo"; ?></td>
                        <td class="btn-tabla-container">
                            <button type="submit" name="habilitar" class="btn btn-primary btn-tabla">Habilitar</button>
                            <button type="submit" name="deshabilitar" class="btn btn-primary btn-tabla">Deshabilitar</button>
                            <button type="submit" name="editar" class="btn btn-primary btn-tabla">Editar</button>
                            <button type="submit" class="btn btn-primary btn-tabla">Descargar</button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-tabla" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Detalles
                            </button>
                            <!-- Modal -->
                            <div class="modal">
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title titulo" id="staticBackdropLabel"><?php echo $infoMaterial['MaterialNombre']; ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php include(LAYOUT."/manage-material/detalle-material.php"); ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-tabla" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="/inventario_dgtic/public/pdf/DocumentoPrueba.pdf">
                                <button type="button" class="btn btn-primary btn-tabla">Índice</button>
                            </a>
                        </td>  
                         
                    </form>
                    </tr>
                <?php } ?>
            </tbody>
    </table>
</div>