<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <title>Reseña</title>
  </head>
  <body>
       <!--<?php include_once("../conexion_bd/conexion.php");
       // $id = "";
        //if($_GET["id"]){
          //  $id = $_GET["id"];
        //}
       ?>--> 
      <div class="container"><br><br>
        <div class="card">
            <div class="card-header">
              <h2>Reseñar</h2>
            </div>
            <div class="card-body">
              <h5 class="card-title">Reseñar Producto</h5>
              <span class="fa fa-star" onclick="reseñar(this)" style="cursor:pointer;" id="1estrella"></span>

              <span class="fa fa-star" onclick="reseñar(this)" style="cursor:pointer;" id="2estrella"></span>   

              <span class="fa fa-star" onclick="reseñar(this)" style="cursor:pointer;" id="3estrella"></span>

              <span class="fa fa-star" onclick="reseñar(this) "style="cursor:pointer;" id="4estrella"></span>

              <span class="fa fa-star" onclick="reseñar(this) "style="cursor:pointer;" id="5estrella"></span><br><br>
              <button name="submit" type="submit" class="btn btn-primary border-0" onclick="mensaje()" style="background-color: green;">Reseñar</button>
            </div>
          </div>
      </div>
      
  <!--?php
        // igualar el valor de la variable JavaScript a PHP 
    include_once("../conexion_bd/conexion.php");
    if(isset($_POST['submit'])){
         
        $id = "";
        if($_GET["id"]){
            $id = $_GET["id"];
        }
        $var_PHP = "<script> document.writeln(contador); </script>";
        echo "<h2>$var_PHP</h2>";
        
        $sql="insert into reseña values (NULL, $var_PHP, $id)";
    $conn->query($sql);
    //header('Location:../index.php');
    } -->

    <!-- ?> -->
  </body>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        var contador;
        console.long(item);
        function reseñar(item){
            contador=item.id[0];
            let nombre = item.id.substring(1);
            for(let i=0;i<5;i++)
            {
                if(i<contador){
                    document.getElementById((i+1)+nombre).style.color="yellow";
                }else{
                    document.getElementById((i+1)+nombre).style.color="black";
                }
            }
             $.post('recibir.php',{resenia:contador},function( data){
              if(data!=null){
                alert("Los datos estan");
              }else{
                alert("Los datos no estan");
              }
            });
        }

        function mensaje(){
            alert("Reseña Guardada: " + contador +" estrellas");
        }
 
    </script>
    
</html>