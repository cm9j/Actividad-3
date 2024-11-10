<?php
header("Access-Control-Allow-Origin: http://localhost:8083");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");

$servername = "db";         
$username = "root";         
$password = "rootpassword"; 
$dbname = "appdb";          

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    die("Datos no recibidos correctamente.");
}

$email = $_POST['email'];
$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$stmt = $conn->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conn->error);
}
$stmt->bind_param("ss", $email, $hashed_password);

if ($stmt->execute()) {
    echo "Usuario registrado correctamente";
} else {
    echo "Error en la ejecución de la consulta: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
