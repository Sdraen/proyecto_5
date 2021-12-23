<?php
include_once("../conexion_bd/conexion.php");
if($_GET['submit']){
    $id = $_GET['id'];
    $descripcion = $_GET["descripcion"];
    
    $sql = "insert into comentario values(null,'$descripcion',$id)";

    $conn -> query($sql);

    header("Location: ../comentario/index.php");
}
?>