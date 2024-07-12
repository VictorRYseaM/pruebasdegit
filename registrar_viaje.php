<?php
// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $origen = $_POST["origen"];
    $fecha_salida = $_POST["fecha_salida"];
    $fecha_retorno = $_POST["fecha_retorno"];
    $clase_primera = isset($_POST["primera"]) ? 1 : 0;
    $clase_segunda = isset($_POST["segunda"]) ? 1 : 0;
    $clase_tercera = isset($_POST["tercera"]) ? 1 : 0;
    $hotel = $_POST["hotel"];
    $cantidad_personas = $_POST["personas"];
    $cantidad_adultos = $_POST["adultos"];
    $cantidad_ninos = $_POST["ninos"];
    $cantidad_habitaciones_adultos = $_POST["habi_adultos"];
    $cantidad_habitaciones_ninos = $_POST["habi_ninos"];

    // Realiza la conexión a la base de datos (Asegúrate de tener tu archivo de conexión)
    require 'conexion2.php';
    
    // Consulta preparada para prevenir inyecciones SQL
    $sql = $mysqli->prepare("INSERT INTO reservas (origen, fecha_salida, fecha_retorno, clase_primera, clase_segunda, clase_tercera, id_hotel, cantidad_personas, cantidad_adultos, cantidad_ninos, cantidad_habitaciones_adultos, cantidad_habitaciones_ninos) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Vincula los parámetros
    $sql->bind_param("sssiisiiiiii", $origen, $fecha_salida, $fecha_retorno, $clase_primera, $clase_segunda, $clase_tercera, $hotel, $cantidad_personas, $cantidad_adultos, $cantidad_ninos, $cantidad_habitaciones_adultos, $cantidad_habitaciones_ninos);

    // Ejecuta la consulta
    $result = $sql->execute();

    // Verifica si la inserción fue exitosa
    if ($result) {
        echo "¡Viaje registrado exitosamente!";
    } else {
        echo "Error al registrar el viaje: " . $mysqli->error;
    }

    // Cierra la conexión
    $sql->close();
    $mysqli->close();
}
?>
