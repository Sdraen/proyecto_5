<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
    <?php  include_once("conexion_bd/conexion.php");  ?>
    <div class="w-80 row">
        <div class="w-100 row bg-primary text-center text-white p-2">
            <div class="w-140">
                 <h1>Productos Vecinales</h1>
            </div>
            
            <div class="buscar">
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                    <p>
                        <input type="search" placeholder="Ingrese su búsqueda" name="keyword" id="search"required/>
                        <button class="fa-search icon p-2" type="submit" name="Submit" >Limpiar busqueda</button>
                    </p>
                </form> 
			</div>
		</div>

        <br /> <br /> <br /> <br /> <br />
        
		
        <div class="comentario w-25">
		    <a class="w-50 btn btn-success p-2" href="../comentario/index.php">Comentarios</a>
		</div>

    </div>
    
    
    <!-- Button to Open the Modal -->
    <div class="btnn w-25">
        <button type="button" class="w-50 btn btn-success w-25 m-auto mt-4 p-2" data-bs-toggle="modal" data-bs-target="#myModal">Agregar Producto</button>
    </div>
    
    	<br /> <br />
        
    
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Producto</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="w-100 row m-auto" action="recibir_datos/recibe.php" method="POST">
                        <div class="col-10 mb-3">
                            <label for="nombre">Nombre Producto</label>
                            <input class="form-control" type="text" name="nombre" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="precio">Precio</label>
                            <input class="form-control" type="number" name="precio" required>
                        </div>
                        <div class="col-10 mb-3">
                            <label for="descripcion">Descripción</label>
                            <input class="form-control" type="text" name="descripcion" required>
                        </div>
                        <div class="col-7 mb-3">
                            <label for="stock">Stock</label>
                            <input class="form-control" type="number" name="stock" required>
                        </div>
                       
                        <input class="btn btn-primary w-50 m-auto" type="submit" name="submit" value="Subir Producto">
            
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>
    
    <h1 class="text-center mt-3">Listado de productos</h1>
    <br /> <br />
    <table class="w-75 m-auto table table-hover table-bordered table pull-right" id="mytable" cellspacing="0" style="width: 100%;">
        <thead>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Acciones</th>
        </thead>
        
        <tbody>
        <?php
        $sql = "select * from producto";
        foreach($conn-> query($sql) as $producto){
            echo "<tr>";
            echo "<td> $producto[1] </td>";
            echo "<td> $$producto[2] </td>";
            echo "<td> $producto[4] </td>";
            echo "<td> $producto[3] </td>";
            
            echo "<td> <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter'>
  Subir foto
</button> <a class='btn btn-danger' href='modificar/vista.modificar.php?id=$producto[0]'>Modificar</a>
            <a class='btn btn-danger' href='eliminar/eliminar.php?id=$producto[0]'>Eliminar articulo</a>";
            echo " ";
            echo "<a class=' w-25 btn btn-success p-2' href='/Resenar/index.php?id=$producto[0]'>Reseñar</a>";
            echo "<td><img src='../imagenes/$producto[5]' width=200px alt=''></td>";
            echo "<tr>";
        }
        ?>  
        </tbody>
        
    </table>
    
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Subir las fotos</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
           <form action="../recibir_datos/subir_archivo.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <input type="file" name="imagen" class="form-control-file" id="exampleFormControlFile1">
    <input type="hidden" name="id" id="modal_id"/>
    <input type="submit" class="btn btn-success"/>
  </div>
    </form>
    
  </div>
        </div>
    </div>
  </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            
    <script>
    // Write on keyup event of keyword input element
    $(document).ready(function(){
        $('.boton_imagen').click(function(){
            var id = $(this).attr('rel');
            $('#modal_id').val(id);
    });
        $("#btn1").click(function(){ 
     alert("xd");
    });

        $("#search").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#mytable tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                $(this).hide();
                else
                $(this).show();
            });
        });
        
    });
            </script>   
</body>
</html>