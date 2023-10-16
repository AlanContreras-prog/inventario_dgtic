<?php
// Tu lógica para conectar a la base de datos
$servername = "localhost:3310";
$username = "root";
$password = "";
$database = "sistemainventario";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtén el tipo de sección seleccionado desde la solicitud AJAX
$tipoSeccion = $_GET['tipoSeccion'];

// Consulta SQL para obtener las secciones basadas en el tipo de sección seleccionado
$query = "SELECT DISTINCT SeccionNombre FROM secciones WHERE TipoSeccion = '$tipoSeccion'"; // Cambia la consulta según tu estructura de base de datos
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['SeccionNombre'] . '">' . $row['SeccionNombre'] . '</option>';
    }
} else {
    echo '<option selected disabled default value="">No se encontraron secciones</option>';
}

// Cierra la conexión a la base de datos
$conn->close();
?>
