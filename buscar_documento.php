<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

// Datos de conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'documentos_db';

// Crear conexión
$conexion = new mysqli($host, $user, $password, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die(json_encode(["error" => true, "message" => "Error de conexión: " . $conexion->connect_error]));
}

// Obtener el valor de búsqueda desde el frontend
$searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

// Preparar la consulta para prevenir inyecciones SQL
$stmt = $conexion->prepare("SELECT * FROM documentos WHERE num_id = ?");
$stmt->bind_param("s", $searchValue);

// Ejecutar la consulta
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode(["success" => true, "data" => $data]);
} else {
    echo json_encode(["success" => false, "message" => "No se encontró ningún documento con ese número"]);
}

// Cerrar la conexión y el statement
$stmt->close();
$conexion->close();
?>