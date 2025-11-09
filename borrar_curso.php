<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "academia";

$nombre_curso = mb_strtolower($_POST["name_curso"], 'UTF-8');

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

$sql = "DELETE FROM cursos WHERE LOWER(name_curso) = '".$nombre_curso."'";

if ($conn->query($sql) === TRUE) {
    if ($conn->affected_rows > 0) {
        $mensaje = "El curso fue borrado sin problemas.";
    } else {
        $mensaje = "No se encontró ningún curso con ese nombre.";
    }
} else {
    $mensaje = "Ocurrió un error y no se pudo borrar el curso: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Resultado</title>
<style>
  body {
    background-color: black;
    color: limegreen;
    font-family: Arial, sans-serif;
    text-align: center;
    margin-top: 100px;
  }

  a {
    color: limegreen;
    text-decoration: none;
    border: 1px solid limegreen;
    padding: 6px 12px;
    border-radius: 3px;
    display: inline-block;
    margin-top: 20px;
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