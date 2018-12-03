<!DOCTYPE html>
<html lang="en">
<head>
    <title>Compañia Telefonica</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <!--  barra  -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Compañia Telefonica</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid text-center">
        <div class="row content">
            <!-- Derecha -->
            <div class="col-sm-2 sidenav">
                <p><a href="ingresar_cliente.php"class="btn btn-success">Ingresar Cliente</a></p>
                <p><a href="ingresar_linea.php" class="btn btn-success">Ingresar Linea</a></p>
                <!-- <p><a href="index.php" class="btn btn-info">Lista de Clientes</a></p> -->
                <p><a href="mostrar_linea.php" class="btn btn-info">Lista de Linea</a></p>
            </div>
            <!--  Centro -->
            <div class="col-sm-8 text-left">
                <h1>Lista de Llamadas</h1>
                <?php
                   $num_salida = $_GET["id"];
                   echo "<p>Llamadas salientes de: ".$num_salida."</p>";
                ?>
                <!-- <p>Subtitle</p> -->
                <hr>
                <!-- TABLA de DATOS -->
                <table border='1' id='tablaUS' class="table table-hover">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Costo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--  -->
                        <?php
                           include 'conexion.php';

                           // $tabla=$mysqli->query("select num_destino, costo from llamada where num_saliente='".$num_salida."';");
                           $tabla=$mysqli->query("select num_destino from llamada ");

                           mysqli_close($mysqli);

                            if ($tabla->num_rows == 0) {
                                echo '<p> No Registros </p>';
                            } else {
                               while($row = $tabla->fetch_assoc()) {
                                 echo "<tr>
                                   <td>".$row['num_destino'].
                                   "</td><td>".$row['costo'].
                                   "</td></tr>";
                               }
                            }
                        ?>
                        <!--  -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="container-fluid text-center">
        <p>Universidad de Sonora</p>
    </footer>

</body>
</html>
