<?php
$host="localhost";
$port=33065;
$socket="";
$user="root";
$password="";
$dbname="res";
 
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//Instrucciones para el select de la consulta de toda la tabla

$tabla="Platillos";
$query = "SELECT * FROM platillos";


 $stmt = mysqli_query($con,$query);
 $resultado = array();
    while ($fila=mysqli_fetch_array($stmt)) {
        $resultado[]=$fila;
    }
    $n=$stmt->num_rows;
    $stmt->close();



?>



<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="Datatables/datatables.min.css">
    <link rel="stylesheet" href="Datatables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="main.css">
    <title>DataTable</title>
  </head>

  
  <!------------------ cuerpo de la página -------------->
  <body>
    
    <header>
        <h1 class="text-center text-white">Bienvenidos </h1>
        <h2 class="text-center text-white">Tabla de empleados de la base de datos de nomina </h2>
    
    </header>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-hover table-primary" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre del platillo</th>
                                <th>Precio</th>
                                <th>Disponibilidad</th>
                                <th>Categoría</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              
                              for($i = 0; $i < $n; $i++){
                            ?>
                            <tr>

                                <td><?php echo $resultado[$i]['id']?></td>
                                <td><?php echo $resultado[$i]['nombre']?></td>
                                <td><?php echo $resultado[$i]['precio']?></td>
                                <td><?php echo $resultado[$i]['disponible']?></td>
                                <td><?php echo $resultado[$i]['categoriaId']?></td>
                                
                            </tr>
                              <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- librerías de javascrip -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="jquery/jquery-3.6.0.min.js"></script>
    <script src="Datatables/datatables.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>