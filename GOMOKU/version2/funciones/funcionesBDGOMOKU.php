<?php
function insertarJugadorNuevo($con,$Nombre){
    if(isset($_POST["Jugar"])){
            mysqli_query($con,"INSERT INTO jugadores values(NULL,'$Nombre','0')");
    }else{
         echo "<h1> No has elegido Nombre </h1>";
    }
}
function ObtenerOponenteSinSerYo($con,$id){
    $IDencontrado = mysqli_query($con,"SELECT id FROM jugadores WHERE jugando = '0' AND id <>'$id'");
    $row = mysqli_fetch_array($IDencontrado);
    if($row == null) return -1;
    else {
        $dato = $row["id"];
        return $dato;
    } 
}
function tengoOponente($id,$con){
    $jugando = mysqli_query($con,"SELECT jugando FROM jugadores WHERE id = '$id'");
    $row = mysqli_fetch_array($jugando);
    if($row == null)return false; 
    else if($row["jugando"] == 1)return true;
}
function ObtenerNombreJugador($con,$id){
    $Datos = mysqli_query($con,"SELECT Nombre FROM jugadores WHERE id='$id'");
    $row = mysqli_fetch_array($Datos);
    return $row['Nombre'];
}
function obtenerIdJugador($con,$Nombre){
    $Datos = mysqli_query($con,"SELECT id FROM jugadores WHERE Nombre='$Nombre'");
    $row1 = mysqli_fetch_array($Datos);
    return $row1['id'];
}
function borrarJugador($con,$id){
    mysqli_query($con,"DELETE FROM jugadores WHERE id = '$id'");
}
function PongoJugadorJugando($con,$id){
    mysqli_query($con,"UPDATE jugadores SET jugando = '1' WHERE id = '$id'");
}
function crearPartida($con,$mi_id, $id_oponente, $mi_nombre,$nombre_oponente){
    mysqli_query($con,"INSERT INTO partida values(NULL,'$mi_id','$id_oponente','$mi_nombre','$nombre_oponente',
    '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000','0')");
}
/*Funciones de el fichero partida.php*/
function DescargarTablero($con){
    $id =  $_SESSION["ID_Jugador"];$row = 0;
    if($_SESSION["Numero_Jugador"] == 1){
        $row = mysqli_fetch_array(mysqli_query($con,"SELECT tablero FROM partida WHERE id_jugador1 = $id"));
    }else{
        $row = mysqli_fetch_array(mysqli_query($con,"SELECT tablero FROM partida WHERE id_jugador2 = $id"));
    }
    return $row["tablero"];
}
function colocarPieza($tablero,$i,$j,$pieza){
    $tablero[$i][$j] = $pieza;
    $_SESSION["TableroFichas"][$i][$j] = $pieza;
}
function mostrarTablero($tablero){
    $Mostrador = "<br><canvas id=\"TableroDibuja\" width = \"500px\" height=\"500px\"></canvas>";
    for($i = 0; $i<sizeof($tablero);$i++){
        for($a = 0; $a<sizeof($tablero);$a++){
            if($tablero[$i][$a] != '0'){
                if($tablero[$i][$a] == '1')$Mostrador.="<p id=X_".($a+1)."_".($i+1)." hidden> </p>";
                else $Mostrador.="<p id=O_".($a+1)."_".($i+1)." hidden> </p>";
            }   
        }
    }
    return $Mostrador; 
}
function ActualizarDatos($nuevaFrase,$con){
    $id = $_SESSION["ID_Jugador"];
    if($_SESSION["Numero_Jugador"] == 1){
        mysqli_query($con,"UPDATE partida SET tablero ='$nuevaFrase' WHERE id_jugador1 = $id");
    }else{
        mysqli_query($con,"UPDATE partida SET tablero ='$nuevaFrase' WHERE id_jugador2 = $id");
    }
}
function TableroToString($tablero){
    $frase ="";
    for($i = 0 ; $i <sizeof($tablero);$i++){
        for($a = 0 ; $a <sizeof($tablero);$a++){
            $frase.=$tablero[$a][$i];
        }
    }
    return $frase;
}
function stringToTablero($tablero){
    $array[] = array(array());
    $contador = 0;
    for($a = 0; $a<15;$a++){
        for($i = 0; $i<15;$i++){
            $array[$i][$a] = substr($tablero,$contador,1);
            $contador++;
        }
    }
    return $array;
}
function comprobarCasillasVacias($tablero,$i,$j){
    if($tablero[$i][$j] == '0') return true;
    else return false;
}
function MostrarBoton(){
    echo "<br>
    <input type=\"submit\" value=\"Poner Ficha\" id=\"BotonPonerFicha\">
    </form>";
}
?>