<?php
// Establece la conexión a la base de datos (reemplaza con tus propios datos de conexión)
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

$query = "SELECT DiplomadoNombre FROM Diplomado";

$results = $conn->query($query);

$options = '';

if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        $options .= '<option value="' . $row['DiplomadoNombre'] . '">' . $row['DiplomadoNombre'] . '</option>';
    }
}

echo $options;
?>
