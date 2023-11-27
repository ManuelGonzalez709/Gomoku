<?php
session_start();
function conectarBD(){ 
    $conexion = mysqli_connect("192.168.3.243","root","","gomoku");
    return $conexion;
}
?>