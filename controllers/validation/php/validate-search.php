<?php
   $search = trim($_POST['searchInput'],  ' \0\x0');
    //Primero se hace la busqueda por nombre
    //Si no hay registros en la busqueda por nombre realiza la busqueda por apellido paterno.
    $userInfo = $datosUser -> getUserName($search);
    //$busquedaApaterno = $datosUser -> getUserApaterno($search);
?>