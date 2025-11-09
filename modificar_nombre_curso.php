<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "academia";

$nombre_nuevo = mb_strtolower($_POST['name_nuevo'], 'UTF-8');
$nombre_viejo = mb_strtolower($_POST['name_antiguo'], 'UTF-8');

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("No se pudo establecer la conexión: " . $conn->connect_error);
}

$sql = "UPDATE cursos 
        SET name_curso = '$nombre_nuevo' 
        WHERE name_curso = '$nombre_viejo'";

if ($conn->query($sql) === TRUE) {
    if ($conn->affected_rows > 0) {
        $mensaje = "El nombre del curso fue modificado sin problemas.";
    } else {
        $mensaje = "No se encontró ningún curso con ese nombre.";
    }
} else {
    $mensaje = "Ocurrió un error: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Modificar Curso</title>
<style>
  body {
    background-color: black;
    color: limegreen;
    font-family: Arial, sans-serif;
    text-align: center;
    padding-top: 50px;
  }

  a {
    color: limegreen;
    text-decoration: none;
    border: 1px solid limegreen;
    padding: 6px 12px;
    border-radius: 3px;
    display: inline-block;
    margin-top: 20px;
    cursor: pointer;
  }

  a:hover {
    background-color: limegreen;
    color: black;
  }
</style>
</head>
<body>
  <h2><?php echo $mensaje; ?></h2>
  <a href="formulario2502.html">Volver al menú</a>
</body>
</html>