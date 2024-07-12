<?php
include("conexion.php");

$conex = mysqli_connect("localhost", "root", "", "viajesbd");

if (isset($_POST["register"])) {
  $email = "";
  $password = "";
  $name="";
  $ape="";

  if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["correo"]) && isset($_POST["contrasena"]) ) {
    $name= trim($_POST["nombre"]);
    $ape= trim($_POST["apellido"]);
    $email = trim($_POST["correo"]);
    $password= trim($_POST["contrasena"]);
  }

  if (!empty($email) && !empty($password) && !empty($name) && !empty($ape)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

      // Validar la contraseña (longitud, caracteres especiales)

      $consulta = $conex->prepare("INSERT INTO usuario(correo, clave, nombre, apellido) VALUES (?, ?, ?, ?)");
      $consulta->bind_param("ssss", $email, $password, $name, $ape);
      $resultado = $consulta->execute();

      if ($resultado) {
        // Iniciar sesión con los datos del usuario
        session_start();
        $_SESSION['correo'] = $email;
        
        // Redirigir al formulario de inicio
        header("location: iniciosesion.html");
      } else {
        echo "<h3> Ha ocurrido un problema, intente de nuevo</h3>";
      }

      $consulta->close();
    } else {
      echo "<h3> Ingresa una dirección de correo electrónico válida</h3>";
    }
  } else {
    echo "<h3> Rellena todos los campos</h3>";
  }
}
?>
