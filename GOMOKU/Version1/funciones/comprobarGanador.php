<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >
</div>
</body>
</html>
<?php
function ComprobarGanador($fila,$columna,$Array,$iu){
    $TamañoArray = sizeof($Array);  
    if(ComprobarHorizontal($TamañoArray,$Array,$fila,$iu)) return true;
    else if(ComprobarVerticales($TamañoArray,$Array,$columna,$iu)) return true;
    else if(ComprobarDiDescendente($TamañoArray,$Array,$fila,$columna,$iu))return true;
    else if(ComprobarDiAscendente($fila,$columna,$Array,$TamañoArray,$iu))return true;
    else return false;
}
function ComprobarHorizontal($TamañoArray,$Array,$fila,$iu){
    $contador = 0;
    for($i = 0; $i<$TamañoArray;$i++){
        if($Array[$fila][$i] == $iu)$contador++;
        if($contador == 5){
            if(ComprobarUnaHorMas($fila,$i,$Array,$iu))return true;
        }
        else if($Array[$fila][$i] != $iu) $contador = 0;
    }
    return false;
}
function ComprobarUnaHorMas($FilaActual,$columnaActual,$Array,$iu){
    if($columnaActual+1<sizeof($Array)){
        if($Array[$FilaActual][$columnaActual+1] == $iu) return false; 
        else return true;
    }else return true;
}
function ComprobarVerticales($TamañoArray,$Array,$columna,$iu){
    $contador = 0;
    for($i = 0; $i<$TamañoArray;$i++){
        if($Array[$i][$columna] == $iu)$contador++;
        if($contador == 5){
            if(ComprobarUnaVerMas($i,$columna,$Array,$iu))return true;
        }
        else if($Array[$i][$columna] != $iu) $contador = 0;
    }
    return false;
}
function ComprobarUnaVerMas($FilaActual,$columnaActual,$Array,$iu){
    if($FilaActual+1<sizeof($Array)){
        if($Array[$FilaActual+1][$columnaActual] == $iu) return false;
        else return true;
    }else return true;
}
function ComprobarDiDescendente($TamañoArray,$Array,$fila,$columna,$iu){
    $contador = 0; 
    $d1 = $columna;
    $filaEmezar  = $fila-$d1;
    $columnzaEmpezar = 0;
    for($e = $filaEmezar; $e < $TamañoArray;$e++){
        if($Array[$e][$columnzaEmpezar] == $iu)$contador++;
        if($contador == 5){
            if(ComprobarDiagonal($e,$columnzaEmpezar,$Array,$TamañoArray,$iu)) return true;
        }
        else if($Array[$e][$columnzaEmpezar] != $iu) $contador = 0;
        $columnzaEmpezar++;
    }
    return false;
}
function ComprobarDiagonal($filaActual,$ColumnaActual,$Array,$TamañoArray,$iu){
    if($filaActual+1<$TamañoArray){
        if($Array[$filaActual+1][$ColumnaActual+1] == $iu) return false;
        else return true;
    }else return true; 
}
function ComprobarDiAscendente($filaActual,$ColumnaActual,$Array,$TamañoArray,$iu){
    $contador = 0;$ColumnaManager = $TamañoArray-1;
    $id1 = ($TamañoArray-1)-$ColumnaActual;
    $FilaFinal =  $filaActual-$id1;

    for($z = $FilaFinal;$z<$TamañoArray;$z++){
        if($Array[$z][$ColumnaManager] == $iu) $contador++;
        if($contador == 5){
            if(ComprobarDiagonal2($z,$ColumnaManager,$Array,$TamañoArray,$iu))return true;
        }else if($Array[$z][$ColumnaManager]!= $iu)$contador == 0;
        $ColumnaManager--;
    }
}
function ComprobarDiagonal2($filaActual,$ColumnaActual,$Array,$TamañoArray,$iu){
    if($filaActual+1<$TamañoArray && $ColumnaActual-1>0){
        if($Array[$filaActual+1][$ColumnaActual-1] == $iu)return false;
        else return true;
    }else return true;
}

function EstablecerGanador($con,$idGanador){
    $IdPartida = $_SESSION["Id_partida"];
    $NombreJug = $_SESSION["Nombre_Jugador"];
    mysqli_query($con,"UPDATE partida SET Ganador = '$NombreJug' WHERE id = '$IdPartida'");
}
function VerDatosGanador($con){ // checked
    $IdPartida = $_SESSION["Id_partida"];
    $Nombres = mysqli_query($con,"SELECT Ganador FROM partida WHERE id = '$IdPartida' ");
    $DatosSacados = mysqli_fetch_array($Nombres);
    
    if($DatosSacados["Ganador"] != '0') return $DatosSacados["Ganador"]; 
    else return false; 
}
function ObtenerIdPartida($con){
    if($_SESSION["Numero_Jugador"] == 1){
        $Idjugador = $_SESSION["ID_Jugador"];
        $Nombres = mysqli_query($con,"SELECT id FROM partida WHERE id_jugador1 ='$Idjugador'");
        $DatosSacados = mysqli_fetch_array($Nombres);
        return $DatosSacados["id"];
    }else{
        $Idjugador = $_SESSION["ID_Jugador"];
        $Nombres = mysqli_query($con,"SELECT id FROM partida WHERE id_jugador2 ='$Idjugador'");
        $DatosSacados = mysqli_fetch_array($Nombres);
        return $DatosSacados["id"];
    }
}
?>

