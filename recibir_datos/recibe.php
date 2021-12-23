<?php
    include_once("../conexion_bd/conexion.php");
    
    if($_POST["submit"]){
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $stock = $_POST["stock"];
        $descripcion = $_POST["descripcion"];

        $sql = "insert into producto values(null,'$nombre',$precio,$stock,'$descripcion','80e44e215f8cda362b7bb63c807dffa4.png',8)";
        $conn -> query($sql);
        header("Location: /../index.php");
    }
?>