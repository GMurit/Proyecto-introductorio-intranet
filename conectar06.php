<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "academia";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
  die("Error al intentar conectar con la base de datos: " . mysqli_connect_error());
}

echo "Proyecto para leer los registros de la tabla 'cursos' de la bdd 'academia'<br><br>";

$sql = "SELECT id_curso, name_curso, name_docente FROM cursos";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id_curso"] . " - curso: " . $row["name_curso"] . " - docente: " . $row["name_docente"] . "<br>";
    }
} else {
    echo "No se encontró ningún resultado.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Listado de Cursos</title>
<style>
  body {
    background-color: black;
    color: limegreen;
    font-family: Arial, sans-serif;
    text-align: center;
    margin-top: 50px;
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
  <br>
  <a href="formulario2502.html">Volver al menú</a>
</body>
</html>