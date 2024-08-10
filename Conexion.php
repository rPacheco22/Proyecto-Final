<?php
$servidor = "sql111.infinityfree.com";
$usuario = "if0_37034119";
$contrasena = "RaPm22";
$base_datos = "if0_37034119_mermaid";

$conn = new mysqli($servidor, $usuario, $contrasena, $base_datos);

if ($conn->connect_error) {
    die ("Error de conexión: " . $conn->connect_error);
}

$nombre = htmlspecialchars(trim($_POST['name']));
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$mensaje = htmlspecialchars(trim($_POST['message']));

if (empty($nombre) || empty($email) || empty($mensaje)) {
    echo "Todos los campos son obligatorios.";
    exit;
}

$sql = "INSERT INTO formulario (nombre, email, mensaje) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $email, $mensaje);

 
if ($stmt->execute()) {
    
   ;
} else {
    echo "Error: " . $stmt->error;
}

header('location:index.html#contact');


$stmt->close();
$conn->close();


?>