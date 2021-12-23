<?php 
    include_once("../conexion_bd/conexion.php");

    if($_GET["id"]){
        $id = $_GET["id"];
        $sql = "delete from producto where prod_id=$id";
        $conn -> query($sql);
        $sql2 = "delete from comentario where prod_id=$id";
        $conn -> query($sql2);
        header("Location: /../index.php");
    }
?>