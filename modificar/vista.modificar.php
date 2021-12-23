<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
        <?php include_once("../conexion_bd/conexion.php"); 
        $id = "";
        if($_GET["id"]){
            $id = $_GET["id"];
        }
        ?>
    <div class="w-100">
        <!--HEADER-->
        <div class="w-100 bg-primary row p-3">
            <div>
                <h1 class="text-center text-white">Productos Vecinales</h1>
            </div>
            <div class="w-25">
                <a class="mt-2 w-75 btn btn-success p-2" href="../index.php">Volver a inicio</a>
            </div>
        </div>
        <h1 class="text-center">Formulario para modificar producto</h1>
        <form class="w-50 m-auto row border rounded p-4" action="modificar.php" method="post">
            
            <?php 
            
            $sql= "SELECT *FROM producto where prod_id=$id";
            $resultado = $conn->query($sql);
            
            foreach($resultado as $row){
            
            
            echo "<div class='col-4'>";
            echo    "<label for='producto_id'>Id Producto</label>";
            echo    "<input type='text' class='form-control' name='product_id' value='$id'>";
            echo "</div>";
            echo "<div class='col-5 '>";
            echo    "<label for='nombre'>Nombre</label>";
            echo    "<input class='form-control' type='text' name='nombre' value='$row[1]' required>";
            echo "</div>";
            echo "<div class='col-4 '>";
            echo    "<label for='precio'>Precio</label>";
            echo    "<input class='form-control' type='number' name='precio' value='$row[2]' required>";
            echo "</div>";
            echo "<div class='col-6 '>";
            echo    "<label for='descripcion'>Descripción</label>";
            echo    "<input class='form-control' type='text' name='descripcion' value='$row[4]' required>";
            echo "</div>";
            echo "<div class='col-4 mb-3'>";
            echo    "<label for='stock'>Stock</label>";
            echo    "<input class='form-control' type='number' name='stock' value='$row[3]' required>";
            echo "</div>";
            
            echo "<div class='text-center'>";
            echo    "<h6>PUBLICACIÓN: </h6>";
            echo    "<input type=radio name='estado' value='ACTIVA'>  Activa  ";
            echo    "<input type=radio name='estado' value='PAUSADA'>  Pausada  ";
            echo    "<input type=radio name='estado' value='ELIMINADA'>  Eliminada  ";
            echo "</div>";
             
            echo "<div class='col-6 '>";
            echo    "<label for='estado'>ESTADO: </label> <a>$row[6]</a>";
            echo "</div>";
            
            echo "<br /> <br /> <br /> <br /> ";

            echo "<div class='col-12 row justify-content-center align-items-center'>";
            echo    "<input class=' w-75 btn btn-primary' type='submit' name='submit' value='Actualizar Información'>";
            echo "</div>";
      
            }?>
        </form>
   
    </div>
</body>
</html>