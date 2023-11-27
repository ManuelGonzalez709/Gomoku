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
<body>
<div>
    <?php
        session_start();
        if($_SESSION["Ganador"]!= $_SESSION["Nombre_Jugador"]) echo "<h1 id=\"2\">Has perdido</h1>";
        else echo "<h1 id=\"1\">Has ganado ". $_SESSION["Nombre_Jugador"]."!!!!!!!</h1>";
    ?>
</div>
</body>
</html>
<script>
    if(document.getElementsByTagName("h1")[0].getAttribute("id") == '1'){
        sonido = new Audio("./estilos/ganar.mp3");
        sonido.play()
        document.getElementsByTagName("body")[0].setAttribute("id","Ganador1");
    }else{
        sonido = new Audio("./estilos/perder.mp3");
        sonido.play()
        document.getElementsByTagName("body")[0].setAttribute("id","Perdedor2");
    }
</script>
