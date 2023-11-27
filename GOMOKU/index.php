<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>¿Que version quieres?</h1>
    <form action="index.php" method="post">
        <input type="submit" value="Modo_Normal" name ="Empezar">
        <input type="submit" value="Modo_Rapido" name ="Empezar">
    </form>
</body>
</html>

<?php
if(isset($_POST["Empezar"])){
    if($_POST["Empezar"]== "Modo_Normal"){
        echo "<script>window.open(\"./Version1/index.php\",\"_self\") </script>";
    }else{
        echo "<script>window.open(\"./version2/index.php\",\"_self\") </script>";
    }
}

?>