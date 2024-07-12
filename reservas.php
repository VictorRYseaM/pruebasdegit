
<?php
require 'conexion2.php';

$estados=$mysqli->query("SELECT id_estado, nombre_estado FROM estados");
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>
        formulario registro
    </title>
    <link rel="stylesheet" href="/storage/emulated/0/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#estado").change(function(){
                var estadoId = $(this).val();
                $.ajax({
                    url: 'cargar_municipios.php',
                    type: 'post',
                    data: {estado_id: estadoId},
                    success: function(response){
                        $("#municipio").html(response);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            // Evento onchange para el select de municipios
            $("#municipio").change(function(){
                var municipioId = $(this).val();
                // Solicitud AJAX para cargar hoteles
                $.ajax({
                    url: 'cargar_hoteles.php',
                    type: 'post',
                    data: {municipio_id: municipioId},
                    success: function(response){
                        $("#hotel").html(response);
                    }
                });
            });
        });
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url("https://scontent.fmar3-1.fna.fbcdn.net/v/t1.15752-9/412917106_393836776365001_1759275654338138861_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=8cd0a2&_nc_ohc=LZmA8i9XaOMAX_wy9Lr&_nc_ht=scontent.fmar3-1.fna&oh=03_AdTBFZkjZ_cArIZ811UkzhxQ7dtOVfVRy3tjSrGByXrt5g&oe=65DE8017");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .form {
            width: 800px;
            background: #DDA0DD;
            padding: 30px;
            margin: auto;
            margin-top: 100px;
            border-radius: 4px;
            font-family: 'calibri';
            color: blue;
            box-shadow: 7px 13px 37px #000;
        }

        .form.register h4 {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .form.register h3 {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .controls {
            width: 100%;
            background: #DDA0DD;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 16px;
            border: 1px solid #1f53c5;
            font-family: 'calibri';
            font-size: 18px;
            color: blue;
        }

        .form.register p {
            height: 40px;
            text-align: center;
            font-size: 18px;
            line-height: 40px;
        }

        .form.register a {
            color: blue;
            text-decoration: none;
        }

        .form.register a:hover {
            color: blue;
            text-decoration: underline;
        }

        .form.register .botons {
            width: 100%;
            background: blue;
            border: none;
            padding: 12px;
            color: white;
            margin: 16px 0;
            font-size: 16px;
        }

        .bt {
            display: inline-block;
            width: 150px;
            padding: 10px;
            background: #DDA0DD;
            text-decoration: none;
            color: blue;
            border-radius: 5px;
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            margin: auto;
            font-family: "Baskerville Old Face";

        }

        .pa {
            font-family: "Baskerville Old Face";
            background: #CC66FF;
            color: blue;
            padding: 25px;
            text-align: center;
            border-style: dotted;
            border-color: blue;
        }
    </style>

</head>

<body>
    <form action="registrar_viaje.php" method="post">
    <section class="form">
        <h1 class="ya">
            <center>Localidad para tu viaje!</center>
        </h1><br>
        <p class="pa">Lugar de origen</p><br>
        <input class="controls" type="text" name="origen" id="origen"placeholder="Ingresa tu lugar de origen"><br>
        <p class="pa">Lugar destino</p><br>
        <select class="controls"type="text" name="estado" id="estado"placeholder="Ingresa tu siguiente estado">
        <option value="">Seleccionar</option>
        <?php
            while($row=$estados->fetch_assoc()){?>
                <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['nombre_estado']; ?></option>
          <?php  }
        ?>
        </select>
        <p class="pa">Localidad especifica</p><br>
        <select class="controls"type="text" name="municipio" id="municipio"placeholder="Ingresa tu siguiente municipio">
            <option value="">Seleccionar</option>
        </select>
        <p class="pa">Ingrese fecha de salida</p><br>
        <input class="controls" type="date" name="fecha_salida" id="fecha_salida"placeholder="Ingrese su fecha de salida">
        <br>
        <p class="pa">Ingrese fecha de retorno</p><br>
        <input class="controls"type="date" name="fecha_retorno" id="fecha_retorno"placeholder="Ingrese su fecha de retorno">
        <p class="pa">Seleccione el tipo de clase</p><br>
        <br>
        <input class="bt" type="checkbox"id="primera"name="primera">
        <label for="primera">Primera</label>
        <input class="bt" type="checkbox"id="segunda"name="segunda">
        <label for="Segunda">Segunda</label>
        <input class="bt" type="checkbox"id="tercera"name="tercera">
        <label for="tercera">Tercera</label>
        <br>
        <hr>
        <br>
        
        
        <h1 class="ya"><center>Detalles del hotel</center></h1><br>
        <p class="pa">Ingresa el hotel de tu prefetencia</p><br>
        
        <select class="controls" type="text" name="hotel" id="hotel"placeholder="Ingresa  hotel de tu preferencia">
            <option value="">Seleccionar</option>
        </select>
        <p class="pa">Por favor, ingrese la cantidad de personas en su viaje</p><br>
        
        <input class="controls" type="int" name="personas" id="personas" placeholder="Ingrese la cantidad de personas">
        
        
        <p class="pa">Por favor ingrese, la cantidad de adultos</p><br>
        
        <input class="controls" type="int" name="adultos" id="adultos" placeholder="Ingrese la cantidad de adultos">
        
        
        <p class="pa">Por favor, ingrese la cantidad de ninos</p><br>
        <input class="controls" type="int" name="ninos" id="ninos" placeholder="Ingrese la cantidad de niños">
        
        <h1><center>Habitaciones</center> </h1>
        <br>
        
        <p class="pa">Por favor,ingresar la cantidad de habitaciones de adultos</p><br>
        
         <input class="controls" type="int" name="habi_adultos" id="habi_adultos" placeholder="Ingrese la cantidad de adultos">
        
        
        
        <p class="pa">Por favor, ingresar la cantidad de habitaciones de ninos</p><br>
        
            <input class="controls" type="int" name="habi_ninos" id="habi_ninos" placeholder="Ingrese la cantidad de niños">
        
        <center>
        <p> Disfruta al máximo tu viaje y estadia!</p><br>
        <input class="bt" type="submit"value="Reservar">
        </center>
        
        
        </section>
        </form>
    <script src="js/peticiones.js"></script>

</body>

</html