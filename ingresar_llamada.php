<!DOCTYPE html>
<?php
  $num_salida = $_GET['id'];
 ?>
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
                <p><a href="index.php" class="btn btn-info">Lista de Clientes</a></p>
                <p><a href="mostrar_linea.php" class="btn btn-info">Lista de Linea</a></p>
            </div>
            <!--  Centro -->
            <div class="col-sm-8 text-left">
              <form action='agregar_llamadaBD.php' method='post'>
                <div class="form-group">
                  <input type="hidden" class="form-control" name="num_salida" value="<?php echo $num_salida ?>">
                </div>
								<div class="form-group">
                  <label for="IngreseNumD">Ingrese Numero de Destino</label>
                  <input type="text" class="form-control" name="tel_destino" id="IngreseNumD" placeholder="Ej. 6622123456">
                </div>
                <div class="form-group">
                  <label for="IngreseCos">Ingrese Costo de la llamada</label>
                  <input type="text" class="form-control" name="costo" id="IngreseCos" placeholder="0.00">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
    </div>

    <footer class="container-fluid text-center">
        <p>Universidad de Sonora</p>
    </footer>

</body>
</html>
