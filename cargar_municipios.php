<?php
require 'conexion2.php';

if(isset($_POST['estado_id'])){
    $estadoId = $_POST['estado_id'];

    // Realiza la consulta para obtener los municipios relacionados con el estado seleccionado
    $municipios = $mysqli->query("SELECT id_municipio, nombre_municipio FROM municipios WHERE id_estado = $estadoId");

    // Construye las opciones del select de municipios
    $options = '<option value="">Seleccionar</option>';
    while($row = $municipios->fetch_assoc()){
        $options .= '<option value="'.$row['id_municipio'].'">'.$row['nombre_municipio'].'</option>';
    }

    echo $options;
}
?>