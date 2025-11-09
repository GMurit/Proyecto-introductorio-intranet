<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Bienvenida a la Intranet</title>
<style>
  body {
    background-color: black;
    color: limegreen;
    font-family: Arial, sans-serif;
    text-align: center;
    padding: 50px;
    margin: 0;
  }

  h2 {
    margin-bottom: 20px;
  }

  button {
    color: limegreen;
    background-color: black;
    border: 1px solid limegreen;
    padding: 6px 12px;
    border-radius: 3px;
    cursor: pointer;
    margin-top: 20px;
    font-size: 16px;
  }

  button:hover {
    background-color: limegreen;
    color: black;
  }

  p {
    margin: 10px 0;
  }
</style>
</head>
<body>

<h2>Bienvenida a la Intranet del Centro</h2>

<?php
$login = $_POST['name_log']; 
$logpswd = $_POST['pswd_log'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jefatura";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT name_editor, pswd_editor FROM editores
        WHERE name_editor = '$login' AND pswd_editor = '$logpswd'";

$result = mysqli_query($conn, $sql);

$autorzdo = 0;

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<p>Usuario: " . $row["name_editor"]. " - Password: " . $row["pswd_editor"]. "</p>";
        echo "<p>¡Encontrado!</p>";
        $autorzdo = 3;
    }
} else {
    echo "<p>No se encuentra autorizado. Vuelva a introducir sus datos.</p>";
}

$prosigue = ["index.html","conectar13.php","conectar14.php","formulario2502.html"]; 
mysqli_close($conn);

if ($autorzdo == 0){
    echo "<p>Deberá volver al menú de inicio de sesión para autenticarse correctamente.</p>";
    echo "<p>Su usuario o contraseña no son correctos o usted no es un usuario registrado.</p>";
    $p = 0;
} else {
    $p = 3;
}
?>

<button onclick="window.location.href='<?php echo $prosigue[$p]; ?>';">Ir al menú</button>

</body>
</html>