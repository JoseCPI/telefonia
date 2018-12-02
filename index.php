<!DOCTYPE html>
<html lang="en">
<head>
  <title>Compañias Telefonicas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="ingresar_cliente.php"class="btn btn-success">Ingresar Cliente</a></p>
            <p><a href="ingresar_linea.php" class="btn btn-success">Ingresar Linea</a></p>
            <!-- <p><a href="index.php" class="btn btn-info">Lista de Clientes</a></p> -->
            <p><a href="mostrar_linea.php" class="btn btn-info">Lista de Linea</a></p>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Compañias Telefonicas</h1>
            <p>Ofrecemos comunicacion</p>
            <hr>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>NIF</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'conexion.php';
                        $tabla=$mysqli->query("select * from cliente");
                        mysqli_close($mysqli);

                        if ($tabla->num_rows == 0) {
                            echo '<p> No Registros </p>';
                        } else {
                            while($row = $tabla->fetch_assoc()) {
                                echo "<td>".$row['NIF'].
                                "</td><td>".$row['nombre'].
                                "</td><td>".$row['apellido'].
                                "</td><td>".$row['direccion'].
                                "</td><td><a href='I_lineaDeCliente.php?id=".$row['NIF'].
                                    "alt='edit'>Agregar Linea</a>
                                </td><td><a href='D_cliente.php?id=".$row['NIF'].
                                    "' alt='edit'>Eliminar</a></td></tr>";

                            // echo '<p> Registros </p>';
                            }
                        }
                    ?>
                </tbody>
            </table>

        </div>

        <div class="col-sm-2 sidenav">
            <div class="well">
            <p></p>
            </div>
            <div class="well">
            <p></p>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
  <p>Universidad de Sonora</p>
</footer>

</body>
</html>
