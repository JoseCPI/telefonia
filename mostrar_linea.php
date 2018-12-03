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
            <h1>Lista de Lineas</h1>
            <!-- <p> Cliente ID</p> -->
            <hr>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Tipo de Linea</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'conexion.php';
                        $tabla=$mysqli->query("select c.apellido ,c.nombre, l.num_telefono, l.tipo_linea
                                                from cliente c join linea l");
                        mysqli_close($mysqli);

                        if ($tabla->num_rows == 0) {
                            echo '<p> No Registros </p>';
                        } else {
                            while($row = $tabla->fetch_assoc()) {
                                echo "</td><td>".$row['apellido'].
                                    "</td><td>".$row['nombre'].
                                    "</td><td>".$row['num_telefono'].
                                    "</td><td>".$row['tipo_linea'].

                                    "</td><td><a href='Ingresar_llamada.php?id=".$row['num_telefono'].
                                    "' alt='edit' class='btn btn-primary'>Agregar Llamada</a>

                                    </td><td><a href='mostrar_llamada.php?id=".$row['num_telefono'].
                                    "' alt='edit' class='btn btn-info'>Ver Llamadas</a>

                                    </td><td><a href='D_Linea.php?id=".$row['num_telefono'].
                                    "' alt='edit' class='btn btn-danger'>Eliminar</a></td>
                                    </tr>";

                            // echo '<p> Registros </p>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<footer class="container-fluid text-center">
  <p>Universidad de Sonora</p>
</footer>

</body>
</html>
