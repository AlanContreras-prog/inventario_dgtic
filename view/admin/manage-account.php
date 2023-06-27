<?php

/*********************************
 * pantalla: administrar cuentas *
 * date: 30/02/2023              *
 * autor: Roan                   *
 *********************************/
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');

//CLASES
include(CONNECTION_BD);
//DOCUMENTOS
include(BD_SELECT . 'select-users.php');
include(BD_UPDATE . 'update-user.php');
include(VALIDATION_PHP . '/validate-UpdateUser.php');

//Instancia para la consulta de datos de usuario
$datosUser = new SelectUser();

//Trae todos los usuarios registrados en la base de datos.
$userInfo = $datosUser->getDatosUser();
?>

<!DOCTYPE html>
<html lang="es">
<?php include(LAYOUT . '/head.php'); ?>

<body>
    <?php
    include(LAYOUT . '/header.php');
    include(LAYOUT . "/navbar-users/navbarAdmin.php");
    ?>

    <h2 class="titulo">Gestionar Cuentas</h2>

    <!-- <div class="container">
        <form class="d-flex col-md-2 form-search needs-validation text-container" role="search" method="post" novalidate>
            <input name="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" required>
            <div class="input-group mb-3">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
                <input type="text" class="form-control" aria-label="Text input with dropdown button">
            </div>

            <div class="invalid-feedback">
                Es necesario colocar un filtro.
            </div>
            <button name="search" class="btn btn-primary" type="submit">Buscar</button>
        </form>
    </div> -->

    <div class="container sombra">
        <table class="table tabla-cuenta text-container">
            <thead class="encabezado">
                <tr>
                    <th scope="col" class="encabezado-col">

                    </th>
                    <th scope="col" class="encabezado-col">
                        Nombre
                    </th>
                    <th scope="col" class="encabezado-col">
                        Correo
                    </th>
                    <th scope="col" class="encabezado-col">
                        Rol
                    </th>
                    <th scope="col" class="encabezado-col">
                        Sede
                    </th>
                    <th scope="col" class="encabezado-col">
                        Estado
                    </th>
                    <th scope="col" class="encabezado-col">

                    </th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($userInfo as $userInfo) :
                ?>
                    <form action="" method="post">
                        <tr>
                            <th>
                                <input type="hidden" name="idUser" value="<?php echo $userInfo['Usuario_Id']; ?>">
                            </th>
                            <th scope="col">
                                <?php echo $userInfo['UsuarioNombre'] . ' ' . $userInfo['UsuarioApaterno'] . ' ' . $userInfo['UsuarioAmaterno']; ?>
                            </th>
                            <td>
                                <?php echo $userInfo['UsuarioCorreo']; ?>
                            </td>
                            <td>
                                <?php echo $userInfo['UsuarioRol']; ?>
                            </td>
                            <td>
                                <?php echo $userInfo['sedeNombre']; ?>
                            </td>
                            <td>
                                <?php echo ($userInfo['UsuarioEstado'] == 1) ? "Activo" : "Inactivo"; ?>
                            </td>
                            <td class="btn-tabla-container">
                                <button name="habilitar" type="submit" class="btn btn-primary btn-tabla">Habilitar</button>
                                <button name="deshabilitar" type="submit" class="btn btn-primary btn-tabla">Deshabilitar</button>
                                <button name="editar" type="submit" class="btn btn-primary btn-tabla">Editar</button>
                                <button name="eliminar" type="submit" class="btn btn-primary btn-tabla">Eliminar</button>
                            </td>
                        </tr>
                    </form>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>
    <?php include(LAYOUT . '/footer.php'); ?>
</body>

</html>