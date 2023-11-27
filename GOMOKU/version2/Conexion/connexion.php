<?php
session_start();
function conectarBD(){ 
    $conexion = mysqli_connect("localhost","root","","gomoku");
    return $conexion;
}
?>