<?php

try{

    //Credenciales para la conexion a phpmyadmin
    $host = "localhost";
    $dbname= "id17945216_datos5";
    $username= "id17945216_grupo5";
    $password = "T/wXDI73!3+o&S<4";
    //Creamos un nuevo objeto PDO para crear una conexion a mysql
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

}catch(PDOException $e){
    die("No se ha podido conectar la base de datos".$e->getMessage());
}

?>