<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/style.css">
    <link rel="stylesheet" href="./estilos/responsive.css">
    <title>Document</title>
</head>
<body class="Pagina_Principal">
    <div class="Contenedor_Principal">
    <h1 class="Titulo_juego">GOMOKU</h1>
    <form action="preparandoTablero.php" method="post" class="Fomulario_1">
        <input type="text" name="Nombre" id="Nombre" placeholder="NOMBRE JUGADOR">
        <input type="submit" value="Quiero Jugar"  name ="Jugar" id="Jugar" disabled>
    </form>
</div>
</body>
</html>
<script> // script para el boton de introducir nombre
    document.getElementById("Nombre").oninput = function ComprobarNombre(){
        if((document.getElementById("Nombre").value).length > 2)
        document.getElementById("Jugar").disabled = false
        else document.getElementById("Jugar").disabled = true
    }
</script>
<script src="./estilos/canciones.js"></script> 
<?php
session_start();
$_SESSION["EntrarPorPrimeraVez"] = 0;
?>