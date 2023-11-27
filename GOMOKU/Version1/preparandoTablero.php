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
<body class="Preparando"></body>
<?php
    require("Conexion/connexion.php");
    require("funciones/funcionesBDGOMOKU.php");
    $con = conectarBD();

    $_SESSION["ID_partida"] = 0;// partida.php
    $_SESSION["Partida_Entrando"] = 0; //partida.php
    $_SESSION["VecesBotonJugador1"] = 0;//partida.php
    
    if($_SESSION["EntrarPorPrimeraVez"] == 0){
        $_SESSION["Nombre_Jugador"] = $_POST["Nombre"];
        insertarJugadorNuevo($con,$_SESSION["Nombre_Jugador"]);
        $_SESSION["ID_Jugador"] = obtenerIdJugador($con,$_SESSION["Nombre_Jugador"]);
        $_SESSION["EntrarPorPrimeraVez"] = 1;
        /*JS PARA RECARGAR PAGINA*/
        echo "<script>setTimeout(\"location.reload('preparandoTablero.php')\", 5000);</script>
        <h1 class=\"Cargando\">Bienvenido</h1>";

    }else {
        if(tengoOponente($_SESSION["ID_Jugador"],$con) == true){ //Jugador 2
            borrarJugador($con,$_SESSION["ID_Jugador"]);
            $_SESSION["Numero_Jugador"] = 2;
            echo "<script>setTimeout('window.open(\"partida.php\",\"_self\")', 3000);</script>
            <h1 class=\"Cargando\">Cargando Juego</h1>";
        }
        else { //Jugador 1
            $idOponente = ObtenerOponenteSinSerYo($con,$_SESSION["ID_Jugador"]);
            if($idOponente != -1){
                borrarJugador($con,$_SESSION["ID_Jugador"]);
                PongoJugadorJugando($con, $idOponente);
                $_SESSION["Nombre_Oponente"] = ObtenerNombreJugador($con,$idOponente);
                $_SESSION["ID_oponente"] = $idOponente;
                crearPartida($con,$_SESSION["ID_Jugador"],$_SESSION["ID_oponente"],$_SESSION["Nombre_Jugador"],$_SESSION["Nombre_Oponente"]);
                $_SESSION["Numero_Jugador"] = 1;
                echo "<script>setTimeout('window.open(\"partida.php\",\"_self\")', 3000);</script>
                <h1 class=\"Cargando\">Cargando Juego</h1>";
            }
            else echo
            "<script> setTimeout(\"location.reload('preparandoTablero.php')\", 5000); </script>
            <h1 class=\"Cargando\">Esperando Oponente</h1>";
        }
    }
?>
