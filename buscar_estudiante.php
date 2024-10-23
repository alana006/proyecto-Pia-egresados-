<?php
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'felix_informacion_prueba';
$username = 'root';
$password = '';

// Crear conexión a la base de datos
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

// Verificar si la conexión fue exitosa
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener el ID del estudiante desde la solicitud AJAX
$studentId = $_GET['id'];

// Consultar la base de datos para obtener la información del estudiante
$query = $conn->prepare("SELECT * FROM estudiantes WHERE id = :id");
$query->bindParam(':id', $studentId);
$query->execute();

$student = $query->fetch(PDO::FETCH_ASSOC);

if ($student) {
    echo json_encode($student);
} else {
    echo json_encode(["error" => "Este estudiante no está registrado."]);
}
?>
