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

// Consulta SQL para obtener los tipos de sección únicos
$query = "SELECT TipoSeccion FROM secciones GROUP BY TipoSeccion"; // Nueva consulta para obtener valores únicos
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['TipoSeccion'] . '">' . $row['TipoSeccion'] . '</option>';
    }
} else {
    echo '<option selected disabled default value="">No se encontraron tipos de sección</option>';
}

// Cierra la conexión a la base de datos
$conn->close();
?>
