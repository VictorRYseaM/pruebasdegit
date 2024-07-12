<?php
session_start();
include("conexion.php");

if(isset($_POST["correo"]) && isset($_POST["password"])){

    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    $correo=validate($_POST["correo"]);
    $pass=validate($_POST["password"]);

    if(empty($correo)){
        header("El usuario es requerido");
        exit();
    }elseif(empty($pass)){
        header("La contrasena es requerida");
        exit();
    }

    $consulta = $conex->prepare("SELECT * FROM usuario WHERE correo=? AND clave=?");
    $consulta->bind_param("ss", $correo, $pass);
    $resultado = $consulta->execute();

    if ($resultado) {
        header("location: paginicial.html");
    } else {
        echo "<h3> Ha ocurrido un problema, intente de nuevo</h3>";
    }

    $consulta->close();


}

?>