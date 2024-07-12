<?php
require 'conexion2.php';

if(isset($_POST['municipio_id'])){
    $municipioId = $_POST['municipio_id'];

    // Realiza la consulta para obtener los hoteles relacionados con el municipio seleccionado
    $hoteles = $mysqli->query("SELECT id_hotel, nombre FROM hoteles WHERE id_municipio = $municipioId");

    // Construye las opciones del select de hoteles
    $options = '<option value="">Seleccionar</option>';
    while($row = $hoteles->fetch_assoc()){
        $options .= '<option value="'.$row['id_hotel'].'">'.$row['nombre'].'</option>';
    }

    echo $options;
}
?>
