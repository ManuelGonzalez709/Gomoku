<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/style.css">
    <link rel="stylesheet" href="./estilos/responsive.css">
    <title>Jugando</title>
</head>
<body class="clasePartida">
    <div class="CuerpoPartida">
    <form action="partida.php" method="post" class="FormularioJugando">
        <?php require("Conexion/connexion.php");
        require("funciones/funcionesBDGOMOKU.php");
        $con = conectarBD();
        echo "<label for=\"Jugador\"><h1 class=\"Jugador_Name\">Jugador ".$_SESSION["Numero_Jugador"]."</h1></label><br>";?>
        <label for="Fila">Fila</label> <input type="number" name="Fila" min="1" max="15">
        <label for="Columna">Columna</label><select name="Columna" >
            <option value="0">A</option>
            <option value="1">B</option>
            <option value="2">C</option>
            <option value="3">D</option>
            <option value="4">E</option>
            <option value="5">F</option>
            <option value="6">G</option>
            <option value="7">H</option>
            <option value="8">I</option>
            <option value="9">J</option>
            <option value="10">K</option>
            <option value="11">L</option>
            <option value="12">M</option>
            <option value="13">N</option>
            <option value="14">Ñ</option>
        </select>
    </div>
</body>
</html>
<?php
require("funciones/comprobarGanador.php");
error_reporting(0);
/*Guardamos el tablero en un array y lo guardamos en la sesion TableroFichas*/
$_SESSION["TableroFichas"] = stringToTablero(DescargarTablero($con));
echo mostrarTablero($_SESSION["TableroFichas"]);

if($_SESSION["Numero_Jugador"] == 1 && $_SESSION["VecesBotonJugador1"] == 0 )MostrarBoton();   

if($_SESSION["Partida_Entrando"] == 0){// Para la primera vez que entro
    $_SESSION["CopiaDatos"] = DescargarTablero($con);
    $_SESSION["Id_partida"] = ObtenerIdPartida($con);

    $_SESSION["Partida_Entrando"] = 1;

    if($_SESSION["Numero_Jugador"] == 2){
        echo "<script>window.open(\"partida.php\",\"_self\") </script>";
    }
}
else{ 
    $GanadorOno = VerDatosGanador($con);
    if($GanadorOno != false){
        $_SESSION["Ganador"] = $GanadorOno;
        echo "<script>window.open(\"Ganador.php\",\"_self\")</script>";
    }
    else if($_SESSION["CopiaDatos"]!= DescargarTablero($con))MostrarBoton();  // muestro el boton
    else echo "<script>setTimeout('window.open(\"partida.php\",\"_self\")', 1000);</script>"; // recargo
}

if(isset($_POST["Fila"]) && isset($_POST["Columna"])){ // si he puesto casilla el procedimiento de actualizar los datos 
    
    $Fila = intval($_POST["Fila"])-1;$Columna = intval($_POST["Columna"]);

    if(comprobarCasillasVacias($_SESSION["TableroFichas"],$Fila,$Columna)){

        colocarPieza($_SESSION["TableroFichas"], $Fila, $Columna, $_SESSION["Numero_Jugador"]);
        ActualizarDatos(TableroToString($_SESSION["TableroFichas"]),$con); 
        
        //Aqui tengo que comprobar si han ganado
        if(ComprobarGanador($Fila,$Columna,$_SESSION["TableroFichas"],$_SESSION["Numero_Jugador"])){
            EstablecerGanador($con,$_SESSION["Numero_Jugador"]); // establecer ganador
        }
        unset($_SESSION["TableroFichas"]);
        unset($_SESSION["CopiaDatos"]);
        $_SESSION["CopiaDatos"] = DescargarTablero($con);
        $_SESSION["VecesBotonJugador1"]++;

        echo "<script>window.open(\"partida.php\",\"_self\");</script>";

    }else echo "<br><h3 id=\"CasillaLlena\">Casilla llena<h3>";
} 
?>
<script src="tablero/tablero.js"></script>
<script src="./estilos/canciones.js"></script>