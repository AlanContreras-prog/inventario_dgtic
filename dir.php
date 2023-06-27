<?php
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/inventario_dgtic/');
    define('LAYOUT', ROOT_PATH.'view/layouts/');
    define('VALIDATION_PHP', ROOT_PATH . 'controllers/validation/php');
    define('CONNECTION_BD', ROOT_PATH . 'models/Connection.php');
    define('BD_INSERT', ROOT_PATH . 'models/Qinsert/');
    define('BD_SELECT', ROOT_PATH . 'models/Qselect/');
    define('BD_UPDATE', ROOT_PATH . 'models/Qupdate/');
    define('BD_UPDATE_USER', ROOT_PATH . 'view/admin/admin-update-user.php');
    define('MANAGE-ACCOUNT', ROOT_PATH . 'view/admin/manage-account.php');
    define('ALERT', ROOT_PATH . 'controllers/alertas.php');
?>