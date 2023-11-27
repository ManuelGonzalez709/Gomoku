<?php
$numeros = "100000000000000000000000000000000000000000000000000000000000000000000000000000000000010000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000001";

echo "<br>2..De frase a Array : ";
$numerosCambiados = stringToTablero($numeros);
for($a = 0; $a<15;$a++){
    for($i = 0; $i<15;$i++){
        echo $numerosCambiados[$i][$a];
    }
}

echo"<br>3..De array a frase :  ";
TableroToString($numerosCambiados);
function TableroToString($numerosCambiados){
    $frase ='';
    for($a = 0 ; $a <sizeof($numerosCambiados);$a++){
        for($i = 0 ;$i <sizeof($numerosCambiados);$i++){
            echo $numerosCambiados[$i][$a];
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
?>
