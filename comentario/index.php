<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <?php include_once("../conexion_bd/conexion.php"); ?>
    <div class="w-100">
        <div class="w-100 bg-primary p-3 row">
            <div class="w-75">
            <h1 class ="text-center text-white">Listado de comentarios</h1>
            </div>
            <div class="w-25">
                <a class="mt-2 w-50 btn btn-success p-2" href="../index.php">Listado de productos</a>
            </div>
        </div>
        <div class="boxs">
        <?php
           
            $sql2 = "select * from producto";

            foreach($conn->query($sql2) as $producto){
                echo "<div class='border box'>";
                echo "<h1>Producto: $producto[1]</h1>";
                echo "<h2>Precio: $$producto[2]</h2>";
                echo "<h3>Stock: $producto[3]</h3>";
                echo "<h3>Descripción: $producto[4]</h3>";
                echo "<hr>";
                echo "<h1>Comentarios:</h1>";
             
                $sql = "select * from comentario c where c.prod_id = $producto[0]";
                foreach($conn -> query($sql) as $row){
                    echo "<li> $row[1]</li>";                   
                }
                echo "<form class='' action='recibe.php' method='get'>";
                echo "<label>Comentario: </label>";
                echo "<input class='none' type='text' name='id' value=$producto[0]>";
                echo "<input class='form-control' name='descripcion' required>";
                echo "<input class='mt-2 btn btn-primary'; type='submit' name='submit' value='Registrar'>";
                echo "</form>";
                echo "</div>";
            }

            

        ?>
        </div>
        
      

    </div>
</body>
</html>