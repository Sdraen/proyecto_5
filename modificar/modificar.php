<?php
include_once("../conexion_bd/conexion.php");
if($_POST["submit"]){
    $product_id = $_POST["product_id"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $descripcion = $_POST["descripcion"];
    $estado= $_POST["estado"];

    $sql = "UPDATE producto SET nombre='$nombre', precio='$precio', stock='$stock', descripcion='$descripcion', estado_prod='$estado' WHERE prod_id='$product_id'";
    
    $conn -> query($sql);
    
   header("Location: ../index.php");
}
?>