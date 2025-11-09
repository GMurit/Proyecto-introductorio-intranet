<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jefatura";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
  die("Error al intentar conectar con la base de datos: " . mysqli_connect_error());
}

echo "Registros de la tabla 'editores' de la bdd 'jefatura'<br><br>";

$sql = "SELECT id_editor, name_editor, pswd_editor FROM editores";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "Id: " . $row["id_editor"] . " - Nombre: " . $row["name_editor"] . " - Contraseña: " . $row["pswd_editor"] . "<br>";
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
<title>Listado de Editores</title>
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